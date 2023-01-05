import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Recette } from '../Recette';
import { RecetteService } from '../recette.service';

@Component({
  selector: 'app-detail-recette',
  templateUrl: './detail-recette.component.html',
  styleUrls: ['./detail-recette.component.scss']
})
export class DetailRecetteComponent implements OnInit{

  recetteList: Recette[]= [];
  recette?: Recette;

  constructor(
    private route: ActivatedRoute,
    private router: Router,
    private recetteService: RecetteService
    ){}
  ngOnInit()
  {
    this.recetteService.getRecetteList().subscribe(
      liste=>this.recetteList = liste
    );
    const recetteId: number = parseInt(this.route.snapshot.paramMap.get("id")??"");
    console.log(recetteId);
    this.recetteService.getRecetteById(recetteId).subscribe(
      recette=>this.recette = recette
    );
    // this.recette = this.recetteList.find(rec=>rec.id === recetteId);
  }
  goToRecetteList()
  {
    this.router.navigate(["/recettes"]);
  }
  goToEditRecette()
  {
    this.router.navigate(["/edit/recette", this.recette?.id]);
  }
  deleteRecette()
  {
    if(!this.recette)return;
    if(confirm("Êtes vous sûr de vouloir supprimer cette recette ?"))
      this.recetteService.deleteRecetteById(this.recette.id).subscribe(
        ()=>this.goToRecetteList()
      )
  }
}
