import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import {
  Camera,
  CameraResultType,
  CameraSource,
  Photo,
} from '@capacitor/camera';
import { Directory, Filesystem } from '@capacitor/filesystem';
import { Storage } from '@capacitor/storage';
import { v4 as uuid } from 'uuid';
import { GalleryPhoto } from '../interfaces/gallery-photo.interface';

@Injectable({
  providedIn: 'root',
})
export class PhotoService {
  public photos: GalleryPhoto[] = [];
  private keyPhotoStore = 'gallery';

  constructor(private http: HttpClient) {}

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

  public async loadGalleryPhotos() {
    const gallery = await Storage.get({ key: this.keyPhotoStore });
    this.photos = JSON.parse(gallery.value) || [];

    for (const photo of this.photos) {
      const readFile = await Filesystem.readFile({
        path: photo.filepath,
        directory: Directory.Data,
      });

      photo.webviewPath = `data:image/jpeg;base64,${readFile.data}`;
    }
  }

  private async saveGalleryPhoto(photo: Photo): Promise<GalleryPhoto> {
    const filename = `${uuid()}.jpg`;
    const image = await this.http
      .get(photo.webPath, { responseType: 'blob' })
      .toPromise();

    const reader = new FileReader();
    reader.readAsDataURL(image);
    reader.onload = () => {
      Filesystem.writeFile({
        path: filename,
        data: reader.result.toString(),
        directory: Directory.Data,
      });
    };

    return {
      filepath: filename,
      webviewPath: photo.webPath,
    };
  }
}
