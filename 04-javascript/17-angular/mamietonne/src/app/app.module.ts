import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { BorderCardDirective } from './border-card.directive';
import { TypeColorPipe } from './type-color.pipe';
import { ListeRecetteComponent } from './liste-recette/liste-recette.component';
import { DetailRecetteComponent } from './detail-recette/detail-recette.component';

@NgModule({
  declarations: [
    AppComponent,
    BorderCardDirective,
    TypeColorPipe,
    ListeRecetteComponent,
    DetailRecetteComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
