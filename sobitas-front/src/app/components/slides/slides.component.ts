import { isPlatformBrowser } from '@angular/common';
import { Component, Input, OnInit,Inject , PLATFORM_ID, HostListener } from '@angular/core';
import { storage } from 'src/app/apis/config';

declare var $ : any
@Component({
  selector: 'app-slides',
  templateUrl: './slides.component.html',
  styleUrls: ['./slides.component.css']
})
export class SlidesComponent implements OnInit{


  @Input() slides : any

  storage = storage

  constructor(@Inject(PLATFORM_ID) private platformId: Object){}
  data : any = [];
  screenwidth = 1000
  viewInit = false

  @HostListener('window:resize', ['$event'])
  getScreenSize(event? : any) {
    if(isPlatformBrowser(this.platformId)){
      this.viewInit = true
      this.screenwidth = window.innerWidth

    }

  }
  ngOnInit(): void {
    if(isPlatformBrowser(this.platformId)) {
      this.getScreenSize()
    }

    if(this.screenwidth > 700){
      this.data = this.slides.filter((s: any)=> s.type == 'web')
    }else{
      this.data = this.slides.filter((s: any)=> s.type == 'mobile')

    }
    if(isPlatformBrowser(this.platformId)) {
this.getScreenSize()
    setTimeout(() => {
      $('.slider_carousel').owlCarousel({
        lazy:true,
        animateOut: 'fadeOut',
        loop: false,
        nav: false,
        autoplay: true,
        autoplayTimeout: 3000,
        items: 1,
        dots: true,
      });
    }, 0);
  }
  }

}
