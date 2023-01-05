import { Component, Input, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { Recette } from '../Recette';
import { RecetteService } from '../recette.service';

@Component({
  selector: 'app-recette-form',
  templateUrl: './recette-form.component.html',
  styleUrls: ['./recette-form.component.scss']
})
export class RecetteFormComponent implements OnInit {

  @Input() recette?: Recette;

  types: string[] = [];
  ingredientsList: string = "";
  stepsList: string = "";
  isCreateForm: boolean = false;

  constructor(
    private recetteService: RecetteService,
    private router: Router
    ){}

  ngOnInit(): void 
  {
    this.types = this.recetteService.getRecetteTypeList();
    if(!this.recette)return;
    this.ingredientsList = this.recette.ingredients.join("\n");
    this.stepsList = this.recette.steps.join("\n");
    this.isCreateForm = this.router.url.includes("create");
  }
  hasType(type: string): boolean
  {
    if(!this.recette)return false;
    return this.recette.type.includes(type);
  }
  selectType($event: Event, type: string):void
  {
    if(!this.recette)return;
    const isChecked: boolean = ($event.target as HTMLInputElement).checked;
    this.recette.type = isChecked?type:"";
  }
  onSubmit(): void
  {
    if(this.recette)
    {
      this.recette.ingredients = this.ingredientsList.split("\n");
      this.recette.steps = this.stepsList.split("\n");
      
      if(this.isCreateForm)
        this.recetteService.createRecette(this.recette).subscribe(
          (recette)=>this.router.navigate(["/recette", recette.id])
        )
      else
        this.recetteService.updateRecette(this.recette).subscribe(
          ()=>this.router.navigate(["/recette", this.recette?.id])
        )
    }
  }
}
