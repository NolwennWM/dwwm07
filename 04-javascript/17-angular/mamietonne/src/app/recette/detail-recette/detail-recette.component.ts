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
    this.recetteList = this.recetteService.getRecetteList();
    const recetteId: number = parseInt(this.route.snapshot.paramMap.get("id")??"");
    console.log(recetteId);
    this.recette = this.recetteService.getRecetteById(recetteId);
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
}
