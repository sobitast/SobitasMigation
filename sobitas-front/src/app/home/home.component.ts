import { DOCUMENT, isPlatformBrowser } from '@angular/common';
import { Component, Inject, OnInit, PLATFORM_ID } from '@angular/core';
import { storage } from 'src/app/apis/config';
import { GeneralService } from 'src/app/apis/general.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styles: [],
})
export class HomeComponent implements OnInit {
  constructor(
    @Inject(PLATFORM_ID) private platform_id: Object,
    private general: GeneralService,
    @Inject(DOCUMENT) private _document: Document

  ) { }

  marques: any;
  storage = storage;


  slides: any = [
    {
        "cover": "assets/img/slides/1.jpg",
        "designation_fr": null,
        "description_fr": null,
        "btn_text_fr": "Liste des produits",
        "btn_link": null,
        "position": "center",
        "text_color": "#080808",
        "text_weight": "100",
        "type": "web"
    },
    {
        "cover": "assets/img/slides/2.webp",
        "designation_fr": null,
        "description_fr": null,
        "btn_text_fr": null,
        "btn_link": null,
        "position": "right",
        "text_color": "#07e921",
        "text_weight": "600",
        "type": "web"
    },
    {
        "cover": "assets/img/slides/3.webp",
        "designation_fr": null,
        "description_fr": null,
        "btn_text_fr": null,
        "btn_link": null,
        "position": "right",
        "text_color": "#000000",
        "text_weight": "100",
        "type": "web"
    },
    {
        "cover": "assets/img/slides/4.webp",
        "designation_fr": null,
        "description_fr": null,
        "btn_text_fr": null,
        "btn_link": null,
        "position": "right",
        "text_color": "#000000",
        "text_weight": "100",
        "type": "web"
    },
    {
      "cover": "assets/img/slides/1m.webp",
        "designation_fr": null,
        "description_fr": null,
        "btn_text_fr": null,
        "btn_link": null,
        "position": "right",
        "text_color": "#000000",
        "text_weight": "100",
        "type": "mobile"
    },
    {
        "cover": "assets/img/slides/2m.webp",
        "designation_fr": null,
        "description_fr": null,
        "btn_text_fr": null,
        "btn_link": null,
        "position": "right",
        "text_color": "#ff0000",
        "text_weight": "100",
        "type": "mobile"
    },
    {
        "cover": "assets/img/slides/3m.webp",
        "designation_fr": null,
        "description_fr": null,
        "btn_text_fr": null,
        "btn_link": null,
        "position": "right",
        "text_color": "#000000",
        "text_weight": "100",
        "type": "mobile"
    },
    {
        "cover": "assets/img/slides/4m.webp",
        "designation_fr": null,
        "description_fr": null,
        "btn_text_fr": null,
        "btn_link": null,
        "position": "right",
        "text_color": "#000000",
        "text_weight": "100",
        "type": "mobile"
    }
]
  articles: any[] = [];
  best_sellers: any = [];
  packs: any = [];
  new_products: any = [];
  brands: any = [];
  media: any;
  //from here you can add more categories and category images to the list
  categories = [
    {
        "cover": "https://i.imgur.com/CVFd8hV.png",
        "slug": "acides-amines",
        "designation_fr": "ACIDES AMINES"
    },
    {
        "cover": "https://i.imgur.com/YcR1O0I.png",
        "slug": "perte-de-poids",
        "designation_fr": "PERTE DE POIDS"
    },
    {
        "cover": "https://i.imgur.com/6hllFw7.png",
        "slug": "prise-de-masse",
        "designation_fr": "PRISE DE MASSE"
    },
    {
        "cover": "https://i.imgur.com/LFH4dGf.png",
        "slug": "proteines",
        "designation_fr": "PROTEINES"
    },
    {
        "cover": "https://i.imgur.com/5jN4Y3p.png",
        "slug": "pre-intra-and-post-workout",
        "designation_fr": "PRE, INTRA & POST WORKOUT"
    },
    {
        "cover": "https://i.imgur.com/Lj0ymUa.png",
        "slug": "vetements-et-accessoires",
        "designation_fr": "VETEMENTS ET ACCESSOIRES"
    }
]
  ngOnInit() {
    // this.general.slides().subscribe((data: any) => {
    //   this.slides = data;
    //   console.log(this.slides)
    // });
    // this.general.categories().subscribe((data: any) => {
    //   this.categories = data;
    // });


    this.general.latest_products().subscribe((data: any) => {
      this.new_products = data.new_product;
      this.best_sellers = data.best_sellers;
      this.packs = data.packs



    });
    this.createCanonicalURL()
    setTimeout(() => {
    }, 100);
    if (isPlatformBrowser(this.platform_id)) {
      setTimeout(() => {
        this.general.media()
          .subscribe((data: any) => {
            this.media = data;
          })


        this.general.lastArticles().subscribe((d: any) => {
          this.articles = d;
        });
      }, 0);
    }


  }
  createCanonicalURL() {
    let link: HTMLLinkElement = this._document.createElement('link');
    link.setAttribute('rel', 'canonical');
    this._document.head.appendChild(link);
    let url = this._document.URL
    url = url.replace('http://', 'https://')
    link.setAttribute('href', url);
  }
}
