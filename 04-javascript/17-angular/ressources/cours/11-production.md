# Production #

Angular c'est du "**typescript**", possiblement du "**scss**", tout un tas d'outils utile au développement mais inutile pour la mise en production.

De plus déplacer tout ces 40 000 fichiers sur un serveur serait bien trop long.

Mais Angular a bien évidement tout prévus. Une fois notre projet terminer, on va lancer la commande suivante :

```shell
ng build
```

Le build va peut être prendre un peu de temps mais va nous donner un dossier "**dist**" qui va contenir une dizaine de fichiers. Et c'est absolument tout ce dont vous avez besoin pour faire tourner votre application.

On est passé de 400mo à 400ko.
et de 40 000 fichiers à 10.

Par défaut, un projet Angular est fait pour fonctionner à la racine d'un serveur.
Si votre projet n'est pas à la racine, vous pouvez vous rendre dans le fichier "**index.html**" et changer la balise `<base href="/">` pour indiquer le chemin vers la racine du projet angular.
