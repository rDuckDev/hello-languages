import { Component, OnInit } from '@angular/core';
import {
  debounceTime,
  distinctUntilChanged,
  Observable,
  Subject,
  switchMap
} from 'rxjs';
import { Hero } from '../interfaces/hero';
import { HeroService } from '../services/hero.service';

@Component({
  selector: 'app-hero-search',
  templateUrl: './hero-search.component.html',
  styleUrls: ['./hero-search.component.css'],
})
export class HeroSearchComponent implements OnInit {
  heroes$!: Observable<Hero[]>;
  private searchTerms = new Subject<string>();

  constructor(private heroService: HeroService) {}

  ngOnInit(): void {
    this.heroes$ = this.searchTerms.pipe(
      // wait 300 ms in case the user is still typing
      debounceTime(300),
      // ignore the term if unchanged
      distinctUntilChanged(),
      // cancel the current search and subscribe to a
      // new observable when the search term changes
      switchMap((term: string) => this.heroService.searchHeroes(term))
    );
  }

  search(term: string): void {
    this.searchTerms.next(term);
  }
}
