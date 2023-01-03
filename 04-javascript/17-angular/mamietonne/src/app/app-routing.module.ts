import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { DetailRecetteComponent } from './detail-recette/detail-recette.component';
import { ListeRecetteComponent } from './liste-recette/liste-recette.component';

const routes: Routes = [
  {path: "recettes", component: ListeRecetteComponent},
  {path: "recette/:id", component: DetailRecetteComponent},
  {path: "", redirectTo: "recettes", pathMatch: "full"}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
