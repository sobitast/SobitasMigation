import { AsyncPipe, CommonModule, NgFor, NgIf, NgOptimizedImage } from '@angular/common';
import { Component, Input } from '@angular/core';
import { RouterLink } from '@angular/router';
import { storage } from 'src/app/apis/config';

@Component({
  selector: 'app-article',
  standalone : true,
  imports : [CommonModule , NgOptimizedImage , NgFor, NgIf, AsyncPipe, RouterLink],
  templateUrl: './article.component.html',
  styleUrls: ['./article.component.css']
})
export class ArticleComponent {

storage  = storage
  @Input() article : any
}
