import { Injectable } from '@angular/core';
import { Camera, CameraResultType, CameraSource } from '@capacitor/camera';
import { GalleryPhoto } from '../interfaces/gallery-photo.interface';

@Injectable({
  providedIn: 'root',
})
export class PhotoService {
  public photos: GalleryPhoto[] = [];

  constructor() {}

  public async addGalleryPhoto() {
    const photo = await Camera.getPhoto({
      resultType: CameraResultType.Uri,
      source: CameraSource.Camera,
      quality: 80,
    });

    this.photos.unshift({
      filepath: 'pending...',
      webviewPath: photo.webPath,
    });
  }
}
