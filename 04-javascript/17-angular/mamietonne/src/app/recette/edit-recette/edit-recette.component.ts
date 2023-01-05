import { HttpHeaders } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Observable } from 'rxjs';
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
    this.recetteService.getRecetteList().subscribe(
      liste=>this.recetteList = liste
    );
    const recetteId: number = parseInt(this.route.snapshot.paramMap.get("id")??"");
    console.log(recetteId);
    this.recetteService.getRecetteById(recetteId).subscribe(
      recette=>this.recette = recette
    );
  }
}
