# Exercice 5 #

Créer un formulaire qui permettra de modifier les propriétés suivantes de notre recette :

- name (required et pattern="^\[a-zA-Z\sàéèç]{1,50}$")
- duration (required pattern="^\[1-9][0-9]*$")
- description (required pattern=".{5,}(\n|.)*")
- type (ne faisont qu'un seul radio) (required )
- ingredients (required pattern=".{3,}(\n|.)*")
- steps (required pattern=".{5,}(\n|.)*")

chacun sauf le type sera suivi d'une div affichant un message correspondant aux erreurs possible.
Je voudrais aussi que le formulaire ne s'affiche que si on a une recette.
