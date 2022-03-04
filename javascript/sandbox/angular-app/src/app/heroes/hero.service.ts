import { Injectable } from '@angular/core';
import { HEROES } from '../data/mock-heroes';
import { Hero } from '../interfaces/hero';

@Injectable({
  providedIn: 'root',
})
export class HeroService {
  getHeroes(): Hero[] {
    return HEROES;
  }
}
