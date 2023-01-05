import { Component, OnInit } from '@angular/core';
import { Recette } from '../Recette';

@Component({
  selector: 'app-create-recette',
  templateUrl: './create-recette.component.html',
  styleUrls: ['./create-recette.component.scss']
})
export class CreateRecetteComponent implements OnInit {
  recette?: Recette;
  ngOnInit():void
  {
    this.recette = this.newRecette();
  }
  newRecette(): Recette
  {
    return {
      id: 0,
      name: "",
      type: "Plat",
      image: "",
      description: "",
      duration: 0,
      steps: [],
      ingredients: [],
      createdAt: new Date()
    }
  }
}
