# CheatSheet #

Remplacez les "**cheminVers...**" par le chemin / le nom de ce que vous voulez créer.

## Depuis n'importe où ##

Permet l'*installation d'Angular CLI*:

```shell
npm install -g @angular/cli
```

Permet de *connaître la version d'Angular CLI*:

```shell
ng version
```

Permet de *créer un nouveau projet*:

```shell
ng new cheminVersProjet
```

## Depuis un dossier de projet Angular ##

Permet de *lancer le serveur local d'Angular*:

```shell
ng serve
```

Permet de *créer le build final de votre projet*:

```shell
ng build
```

### Generate ###

Ajouter l'option **--dry-run** à une des commandes suivantes permet de la simuler. Angular testera si cela est possible sans rien créer réellement.

Permet de *créer des fichiers d'environnement*:

```shell
ng generate environments
```

Permet de *générer un nouveau component*:

```shell
ng generate component cheminVersComposant
```

Permet de *générer une nouvelle Directive*:

```shell
ng generate directive cheminVersDirective
```

Permet de *générer un nouveau Pipe*:

```shell
ng generate pipe cheminVersPipe
```

Permet de *générer un nouveau module*:

```shell
ng generate module cheminVersModule
```

Permet de *générer un nouveau service*:

```shell
ng generate service cheminVersService
```
