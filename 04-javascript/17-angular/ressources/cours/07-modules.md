# Les modules #

Jusqu'ici nous ne possèdeons qu'un seul module, celui par défaut, "**app.module.ts**".
C'est suffisant pour une petite application mais si vous souhaitez voir plus grand, vous allez finir par vous perdre dans tous vos fichiers.

Une bonne application Angular est modulaire, on parle souvent de module de fonctionnalités, car on va créer un module pour chaque fonctionnalité de notre application.

un module est une classe avec un décorateur "**@ngModule**", ce décorateur contient les propriétés :

- imports qui permet d'importer d'autres modules.
- exports qui permet d'exporter des classes du modules.
- declarations qui contient tous les components, directive et pipe du module
- bootstrap qui ne concerne que le module racine.

Attention les modules qui sont importé et exporté d'Angular ne sont pas les mêmes que les modules JS, bien que les deux soits complémentaires.

Maintenant créons un nouveau module :

```shell
ng generate module recette
```

Angular/cli nous a bien créé un nouveau dossier contenant "**recette.module.ts**".

Et bien on va profiter de ce nouveau dossier pour faire du rangement et venir déplacer tout ce qui concerne nos recettes dedans :

- detail-recette/
- liste-recette/
- Recette.ts
- RecetteList.ts
- border-card.directive.ts
- type-color.pipe.ts

Et les possibles fichiers "**.specs.ts**".

Avec tout ces déplacements on va se retrouver avec beaucoup d'imports qui peuvent ne plus être bon.
Corrigeons cela de ce pas.

Ouvrons maintenant "**recette.module.ts**"
On trouvera par défaut "**ngModule**" évidement puisque c'est un module,mais aussi "**commonModule**" qui sera utile dans n'importe quel module puisque dedans se trouve par exemple les "**directives structurels**" que sont "**ngFor**" et "**ngIf**".

Je vais ajouter à mes déclarations :

- ListeRecetteComponent,
- DetailRecetteComponent,
- BorderCardDirective,
- TypeColorPipe

et faire les imports qui correspondent :

```typescript
import { ListeRecetteComponent } from './liste-recette/liste-recette.component';
import { DetailRecetteComponent } from './detail-recette/detail-recette.component';
import { BorderCardDirective } from './border-card.directive';
import { TypeColorPipe } from './type-color.pipe';
```

Je vais ensuite venir ajouter les routes qui correspondent dans mon module :

```typescript
import { RouterModule, Routes } from '@angular/router';
/* ... */
const recetteRoutes: Routes = [
        {path: "recettes", component: ListeRecetteComponent},
        {path: "recette/:id", component: DetailRecetteComponent}
    ];
// Puis dans les imports de ngModule :
RouterModule.forChild(recetteRoutes)
/* 
    On notera l'appel de la méthode "forChild" qui permet d'indiquer que ce sont des routes enfants.
    alors que dans "app.module.ts", c'est "forRoot" qui est utilisé.
*/
```

On pensera bien à supprimer les routes que l'on a mit ici dans "**app-routing.module.ts**"
Puis on ira supprimer tout ce qui concerne les recettes dans "**app-module.ts**"

Il ne nous reste plus qu'à importer notre module "**recette**" dans notre module "**racine**":

Une fois tout corrigé, relancer ng serve peut être utile pour être sûr qu'il a bien prit en compte les changements.

Problème, on ne se retrouve plus qu'avec des "**404**".
Cela vient de là :

```typescript
imports: [
    BrowserModule,
    AppRoutingModule,
    RecetteModule
],
```

Angular charge d'abbord "**AppRoutingModule**" puis après "**RecetteModule**". Il va donc lire la 404 avant de lire nos autres routes, il suffit pour cela d'échanger leurs places :

```typescript
imports: [
    BrowserModule,
    RecetteModule,
    AppRoutingModule
], 
```

Nos routes recette seront donc lues avant nos routes par défaut.

Bien sûr dans le cas d'une application classique, on refléchi avant de coder à la structure et aux modules que comportera notre application. Nous n'aurons pas besoin de tout déplacer comme cela.
