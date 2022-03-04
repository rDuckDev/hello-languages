import { Injectable } from '@angular/core';
import { HEROES } from '../data/mock-heroes';

@Injectable({
  providedIn: 'root',
})
export class HeroService {
  getHeroes() {
    return HEROES;
  }
}
