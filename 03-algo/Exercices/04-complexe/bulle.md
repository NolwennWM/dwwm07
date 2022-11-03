# Tri à bulle #

Il existe plusieurs algorithme de tri classique qui servent d'exercice pour apprendre à créer des algorithmes.
L'un d'eux, le tri à bulle, consiste à vérifier la liste à plusieurs reprise en déplaçant à chaque fois la paire de nombre si elle n'est pas bien trié.

## 1 Liste ##

Créer une liste de 20 chiffres aléatoire et l'afficher.

## 2.1 Parcourir la liste ##

Il vous faudra parcourir la liste et vérifier si l'élément suivant de la liste est plus grand, si il est plus petit alors il faudra échanger la place de l'élément actuel et du suivant.

## 2.2 Parcourrir à nouveau ##

Déplacer les éléments juste une fois n'est pas suffisant, il vous faudra les déplacer autant de fois qu'il y a d'élément dans notre liste.

Pour cela on va devoir faire une boucle dans notre boucle.

Ce qui nous donnera comme résultat que pour une liste de 5 élément, la liste va être parcouru 5*5 fois donc 25 fois.

## 3. Afficher le résultat ##

Il nous faudra parcourir une dernière fois notre liste pour afficher sa version trié.

## 4. Améliorons l'algorithme ##

On peut réduire la durée de notre algorithme en changeant un peu une des boucles.

Effectivement, si on peut détecter le fait qu'il y ai eu un changement, On pourra savoir si cela vaut le coup de continuer.

Si on parcour une fois notre liste sans faire aucun changement, c'est qu'elle est trié, et donc pas besoin de parcourir les prochaines fois.
