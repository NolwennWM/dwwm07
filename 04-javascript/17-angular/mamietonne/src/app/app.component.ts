import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent implements OnInit {
  title = 'mamietonne';
  recetteList = ["Carbonade", "Okonomiyaki", "Cannelé"];
  ngOnInit():void
  {
    console.log(this.recetteList);
    this.selectRecette(this.recetteList[0]);
  }
  selectRecette(nom:string):void
  {
    console.log(`Vous avez selectioné ${nom}`);
  }
}
