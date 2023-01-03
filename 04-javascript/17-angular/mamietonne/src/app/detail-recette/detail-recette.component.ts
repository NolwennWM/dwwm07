import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Recette } from '../Recette';
import { RECETTES } from '../RecetteList';

@Component({
  selector: 'app-detail-recette',
  templateUrl: './detail-recette.component.html',
  styleUrls: ['./detail-recette.component.scss']
})
export class DetailRecetteComponent implements OnInit{

  recetteList: Recette[]= RECETTES;
  recette?: Recette;

  constructor(private route: ActivatedRoute){}
  ngOnInit()
  {
    const recetteId: number = parseInt(this.route.snapshot.paramMap.get("id")??"");
    console.log(recetteId);
    this.recette = this.recetteList.find(rec=>rec.id === recetteId);
  }
}
