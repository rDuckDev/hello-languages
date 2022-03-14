import { Component, OnInit } from '@angular/core';
import { Photo } from '@capacitor/camera';
import { ActionSheetController } from '@ionic/angular';
import { GalleryPhoto } from '../interfaces/gallery-photo.interface';
import { PhotoService } from '../services/photo.service';

@Component({
  selector: 'app-tab2',
  templateUrl: 'tab2.page.html',
  styleUrls: ['tab2.page.scss'],
})
export class Tab2Page implements OnInit {
  constructor(
    public photoService: PhotoService,
    public actionSheetController: ActionSheetController
  ) {}

  ngOnInit(): void {
    this.photoService.loadGalleryPhotos();
  }

  public addGalleryPhoto(): void {
    this.photoService.addGalleryPhoto();
  }

  public async presentActionSheet(photo: GalleryPhoto, position: number) {
    const modal = await this.actionSheetController.create({
      header: 'Photos',
      buttons: [
        {
          text: 'Delete',
          role: 'destructive',
          icon: 'trash',
          handler: () => this.photoService.removeGalleryPhoto(photo, position),
        },
        {
          text: 'Cancel',
          icon: 'close',
          role: 'cancel',
          handler: () => {},
        },
      ],
    });
    await modal.present();
  }
}
