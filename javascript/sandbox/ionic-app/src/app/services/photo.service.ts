import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import {
  Camera,
  CameraResultType,
  CameraSource,
  Photo,
} from '@capacitor/camera';
import { Capacitor } from '@capacitor/core';
import { Directory, Filesystem } from '@capacitor/filesystem';
import { Storage } from '@capacitor/storage';
import { Platform } from '@ionic/angular';
import { v4 as uuid } from 'uuid';
import { GalleryPhoto } from '../interfaces/gallery-photo.interface';

@Injectable({
  providedIn: 'root',
})
export class PhotoService {
  public photos: GalleryPhoto[] = [];
  private keyPhotoStore = 'ImageGallery';
  private platform: Platform;

  constructor(private http: HttpClient, platform: Platform) {
    this.platform = platform;
  }

  public async loadGalleryPhotos() {
    const gallery = await Storage.get({ key: this.keyPhotoStore });
    this.photos = JSON.parse(gallery.value) || [];

    if (!this.platform.is('hybrid')) {
      //* WEB
      // use base64 for <ion-img> source
      for (const photo of this.photos) {
        const file = await Filesystem.readFile({
          path: photo.filepath,
          directory: Directory.Data,
        });
        photo.webviewPath = `data:image/jpeg;base64,${file.data}`;
      }
    }
  }

  public async addGalleryPhoto() {
    const photo = await Camera.getPhoto({
      resultType: CameraResultType.Uri,
      source: CameraSource.Camera,
      quality: 100,
    });

    const image: GalleryPhoto = await this.saveGalleryPhoto(photo);
    this.photos.unshift(image);

    Storage.set({
      key: this.keyPhotoStore,
      value: JSON.stringify(this.photos),
    });
  }

  public async removeGalleryPhoto(photo: GalleryPhoto, position: number) {
    // remove the photo from the image gallery
    this.photos.splice(position, 1);
    Storage.set({
      key: this.keyPhotoStore,
      value: JSON.stringify(this.photos),
    });

    // delete the photo
    await Filesystem.deleteFile({
      path: photo.filepath.substring(photo.filepath.lastIndexOf('/') + 1),
      directory: Directory.Data,
    });
  }

  private async saveGalleryPhoto(photo: Photo): Promise<GalleryPhoto> {
    // write the photo to the data directory
    const filename = `${uuid()}.jpg`;
    const file = await Filesystem.writeFile({
      path: filename,
      data: await this.photoToBase64(photo),
      directory: Directory.Data,
    });

    const image: GalleryPhoto = {
      filepath: '',
      webviewPath: '',
    };

    if (this.platform.is('hybrid')) {
      //* MOBILE
      // HT: https://ionicframework.com/docs/core-concepts/webview#file-protocol
      // rewrite the "file://" path to a "http://" path
      image.webviewPath = Capacitor.convertFileSrc(file.uri);
      image.filepath = file.uri;
    } else {
      //* WEB
      // display the image from its web path since that's already in memory
      image.webviewPath = photo.webPath;
      image.filepath = filename;
    }

    return image;
  }

  private async photoToBase64(photo: Photo): Promise<string> {
    let base64Photo: string;

    if (this.platform.is('hybrid')) {
      //* MOBILE
      // read the photo from the filesystem
      const pPhoto = await Filesystem.readFile({ path: photo.path });
      base64Photo = pPhoto.data;
    } else {
      //* WEB
      // fetch the photo (as a blob) from its web path
      const image = await this.http
        .get(photo.webPath, { responseType: 'blob' })
        .toPromise();
      // then, convert the blob into base64
      const pPhoto = await new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.onerror = reject;
        reader.onload = () => resolve(reader.result);
        reader.readAsDataURL(image);
      });
      base64Photo = pPhoto as string;
    }

    return base64Photo;
  }
}
