# Module Slider #

Le but de cet exercice va être de créer un slider adaptable qui pourra être importé en module.

## 1. Fonctions exportées ##

Ce slider aura au moins deux fonctions :

- La première prenant en paramètre un tableau de string contenant les chemins vers les images.
  Elle retournera l'élément HTML contenant le slider.
- La seconde lancera le slider. Affichant la première image et ajoutant les écouteurs d'évènement.

Le slider doit pouvoir s'adapter au nombre d'images que contient le tableau.
Le slider doit être créé entièrement en JS, aucun HTML.
Par contre vous pouvez utiliser un fichier CSS.

Exportez les deux fonctions, dont l'une par défaut.

## 2. Evènements et boutons ##

Ce slider devra contenir au moins un bouton précédent et un bouton suivant.  
Quand on est arrivé à la dernière image, l'appui du bouton suivant doit renvoyer à la première et inversement.

Il contiendra aussi un bouton par image qui au clique affichera l'image en question.  
Le bouton correspondant à l'image changera de couleur quand celle ci est affiché.

## 3. import ##

Importez le slider seulement lors d'un clique sur la fenêtre (ou un bouton).

Donnez un tableau de chemin vers des images à sa fonction de création et ajoutez le à votre page.

Démarrez les évènements du slider.

Supprimez l'évènement au clique qui a ajouté le slider.

## 4. Bonus ##

1. Animez le défilement des images.
2. Votre slider doit être responsive.
3. Ajoutez un défilement automatique.
4. Mettre en pause le défilement lorsque l'on selectionne une image.
5. Reprendre le défilement lorsque l'on clique sur suivant ou précédent.
6. Permettre de choisir la vitesse du défilement lors de la création du slider.
