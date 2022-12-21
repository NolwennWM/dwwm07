# Pierre Feuille Ciseau #

Vous allez devoir créer un jeu de pierre feuille ciseau contre une IA.

## 1. Version 1 ##

Cette première version se concentre sur le fonctionnement du jeu.

### 1. Interface ###

- Ajoutez 3 boutons représentant les 3 options de jeu. (Pierre, Feuille et Ciseaux)
- Ajoutez une zone qui affichera ce qu'a joué l'IA.
- Ajoutez une zone qui affichera si vous avez gagné ou perdu.
- Ajoutez une zone qui affichera le score.

### 2. Script ###

Lors du clique sur un bouton, vous devez faire choisir aléatoirement votre IA entre les 3 choix possibles.

Affichez le choix de l'IA.

Puis comparez le choix de l'IA avec celui de l'utilisateur.

Indiquez qui a gagné, puis augmentez le score.

## 2. Version 2 ##

Cet affichage est un peu austère. améliorons cela:

### 1. Interface Avancé ###

remplacez les boutons par des cartes face caché qui se retournerons lors du clique sur celles ci.

Faites de même pour la zone de jeu de l'IA, ci ce n'est qu'elles se retourneront lors du choix de l'IA.

Pour le confort de l'utilisateur, montrez sur les cartes de l'utilisateur leurs signification.

### 2. Script Avancé ###

Lorsque l'utilisateur selectionne sa carte, il faut la retourner.

De même pour l'IA.

Empêchez l'utilisateur de cliquer trop rapidement sur les cartes, avec par exemple 1 seconde entre chaque coups.

Une fois le temps écoulé, retournez à nouveau les cartes face caché.

## 3. Bonus ##

Faites que l'IA s'adapte, plus l'utilisateur utilisera le même coup, plus l'IA jouera le coup gagnant.
