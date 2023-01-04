import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Recette } from '../Recette';
import { RecetteService } from '../recette.service';

@Component({
  selector: 'app-edit-recette',
  templateUrl: './edit-recette.component.html',
  styleUrls: ['./edit-recette.component.scss']
})
export class EditRecetteComponent implements OnInit {
  recetteList: Recette[] = [];
  recette?: Recette;
  constructor(
    private route: ActivatedRoute,
    private recetteService: RecetteService
    ){}
    
  ngOnInit()
  {
    this.recetteList = this.recetteService.getRecetteList();
    const recetteId: number = parseInt(this.route.snapshot.paramMap.get("id")??"");
    this.recette = this.recetteService.getRecetteById(recetteId);
  }
}
