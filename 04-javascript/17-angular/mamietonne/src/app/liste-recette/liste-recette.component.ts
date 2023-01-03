import { Component, OnInit } from '@angular/core';
import { Recette } from '../Recette';
import { RECETTES } from '../RecetteList';

@Component({
  selector: 'app-liste-recette',
  templateUrl: './liste-recette.component.html',
  styleUrls: ['./liste-recette.component.scss']
})
export class ListeRecetteComponent implements OnInit{

  recetteList: Recette[] = RECETTES;
  recetteSelected: Recette|undefined;
  ngOnInit():void
  {
    console.log(this.recetteList);
    // this.selectRecette(this.recetteList[0]);
  }
  selectRecette(recetteId: string):void
  {
    const index: number = parseInt(recetteId);
    const recette: Recette|undefined = 
      this.recetteList.find(rec=>rec.id === index);
    if(recette)
      console.log(`Vous avez selectioné ${recette.name}`);
    else
      console.log("Aucune recette correspondante.")
    this.recetteSelected = recette;
  }
}
