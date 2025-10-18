import { isPlatformBrowser } from '@angular/common';
import { AfterViewInit, Component, Inject, Input, OnInit, PLATFORM_ID } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { DomSanitizer } from '@angular/platform-browser';
import { OwlOptions } from 'ngx-owl-carousel-o';
import { storage } from 'src/app/apis/config';
import { GeneralService } from 'src/app/apis/general.service';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
  styles: [],
})
export class FooterComponent implements OnInit, AfterViewInit {
  //coordonnees: any = JSON.parse(localStorage.getItem('coordonnees') || '{}');
  @Input() coordonnees : any = {}
  services: any = [];
  pages: any = [];
  constructor(
    @Inject(PLATFORM_ID) private platformId: Object,
    private general: GeneralService,
    private sanitizer: DomSanitizer
  ) {}

  form: FormGroup = new FormGroup({
    email: new FormControl('', Validators.required),
  });

  today = new Date();
  storage = storage;
  show_map = false;
  map: any;
  brands1: any[] = [];
  show_brands = false;
  ngOnInit(): void {
    this.map = this.sanitizer.bypassSecurityTrustHtml(
      this.coordonnees.gelocalisation
    );



    if(isPlatformBrowser(this.platformId)) {
      setTimeout(() => {
        this.general.services().subscribe((data) => {
          this.services = data;
        });
        this.general.brands().subscribe((data: any) => {
          this.brands1 = data;

          setTimeout(() => {
            this.customOptions  = {
              lazy:true,
              loop: false,
              mouseDrag: true,
              touchDrag: true,
              pullDrag: false,
              autoplay:true,
              autoplayTimeout:1000,
              autoplayHoverPause:true,
              dots: false,
              navSpeed: 200,
              navText: ['', ''],
              responsive: {
                0: {
                  items: 3
                },
                400: {
                  items: 4
                },
                740: {
                  items: 5
                },
                940: {
                  items: 6
                },
                1500:{
                  items : 6
                },
                1900:{
                  items : 6
                }, 2200:{
                  items : 6
                }
              },
              nav: true
            }

            this.show_brands = true

          }, 10);


        });
        this.general.pages().subscribe((data) => {
          this.pages = data;
        });
      }, 5000);

  }

  }
  customOptions: any
  ngAfterViewInit(): void {

  }

  email: any;

  send() {}

  sendNewsletter() {
    if (this.form.valid) {
      this.general.newsletter(this.form.value).subscribe(
        (data: any) => {
          Swal.fire({
            title: data.success,
            icon: 'success',
            toast: true,
            timer: 5000,
            showConfirmButton: false,
            position: 'top-end',
          });

          this.form.reset();
        },
        (err: any) => {
          Swal.fire({
            title: err.error.error,
            icon: 'info',
            toast: true,
            timer: 5000,
            showConfirmButton: false,
            position: 'top-end',
          });

          this.form.reset();
        }
      );
    }
  }
}
