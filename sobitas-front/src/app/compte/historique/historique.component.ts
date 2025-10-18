import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { AuthService } from 'src/app/apis/auth.service';
import { CommandeService } from 'src/app/apis/commande.service';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-historique',
  templateUrl: './historique.component.html',
  styleUrls: ['./historique.component.css']
})
export class HistoriqueComponent implements OnInit {


  constructor(private api : AuthService , private router : Router){}

  commandes : any[] = []
  ngOnInit(): void {
    this.api.commandes().subscribe((res: any) => this.commandes = res)

  }
  /* annuler(id : number){
    Swal.fire({
      title: 'Etes vous sûr?',
      text: "Votre commande sera annuler",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Annuler Commande'
    }).then((result) => {
      if (result.isConfirmed) {
        this.api.annuler_commande(id)
        .subscribe(()=>{
          Swal.fire(
            'Commande annulée!',
            '',
            'success'
          )
          this.ngOnInit()
        })

      }
    })
  } */
}
