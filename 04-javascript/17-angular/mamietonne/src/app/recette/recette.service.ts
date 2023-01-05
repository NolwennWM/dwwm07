import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { catchError, Observable, of, tap } from 'rxjs';
import { Recette, Types } from './Recette';

@Injectable()
export class RecetteService {

  constructor( private http: HttpClient) { }
  getRecetteList():Observable<Recette[]>
  {
    return this.http.get<Recette[]>("api/recettes").pipe(
      tap(this.log),
      catchError(err=>this.handleError(err, []))
    );
  }
  getRecetteById(recetteId: number):Observable<Recette|undefined>
  {
    return this.http.get<Recette>(`api/recettes/${recetteId}`).pipe(
      tap(this.log),
      catchError(err=>this.handleError(err, undefined))
    )
  }
  private log(response:any)
  {
    console.table(response);
  }
  private handleError(error:Error, response:any)
  {
    console.log(error);
    return of(response);
  }
  getRecetteTypeList():string[]
  {
    return Object.values(Types);
  }
  
  updateRecette(recette:Recette): Observable<null>
  {
    const options = 
    {
      headers: new HttpHeaders({"Content-type": "application/json"})
    }
    return this.http.put("api/recettes", recette, options).pipe(
      tap(this.log),
      catchError(err=>this.handleError(err, undefined))
    );
  }
  deleteRecetteById(recetteId?: number): Observable<null>
  {
    return this.http.delete(`api/recettes/${recetteId}`).pipe(
      tap(this.log),
      catchError(err=>this.handleError(err, undefined))
    )
  }
  createRecette(recette:Recette):Observable<Recette>
  {
    const options = 
    {
      headers: new HttpHeaders({"Content-type": "application/json"})
    }
    return this.http.post<Recette>("api/recettes", recette, options).pipe(
      tap(this.log),
      catchError(err=>this.handleError(err, undefined))
    );
  }
}
