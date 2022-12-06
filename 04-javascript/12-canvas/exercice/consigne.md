# Application de dessin #

Créons une application de dessin en canvas (microsoft paint).

## 1. Résumé ##

Faire que le canvas prenne la taille de la fenêtre.

Lors du déplacement de la souris sur le canvas, dessiner à la position de la souris.
Une fois cela fonctionnel, ajouter la condition suivante :

il faut que le clique de la souris soit enfoncé pour que le dessin se fasse.

Si vous souhaitez un peu plus d'information, voir les chapitres suivants.
Si vous avez terminé, des bonus vous attendent au dernier chapitre.

## 2. Création de l'application ##

Déclarer une variable "**painting**" à false.
Déclarer une fonction "start position" qui prendra un event en argument.
    Faites passer "**painting**" à true,
    Appellez une fonction "**draw**" en lui donnant en argument l'évènement.
Déclarer une fonction  "**finishedPosition**":
    Faites passer "**painting**" à false,
    Puis appelle un "**beginpath()**";
Déclarer une fonction "**draw**" qui prend un event en argument.
    si "**painting**" est faux alors on met fin à la fonction
    sinon on donne une largeur de trait de 10,
    on donne une couleur noir,
    on met un "**linecap**" à round.
    on fait un "**lineTo**" sur la position x et y de la souris
        On pourra récupérer la position de la souris grâce à l'évènement donné en argument.
    on fait un "**stroke**"
    On fait un "**beginpath**"
    On fait un "**moveTo**" à la position x et y de la souris.
Ajoutons 3 évènements sur notre canvas,
    "**mousedown**" on appelle "**startPosition**"
    "**mouseup**" on appelle "**finishedPosition**"
    "**mousemove**" on appelle "**draw**"

## 3. bonus ##

- Permettre de changer la couleur,
- Permettre de changer la taille,
- Permettre le retour en arrière (annuler)
- Permettre le retour en avant (refaire)
- Permettre de sauvegarder :
    L'utilisation de "**.toDataURL("image/png")**" pourra s'avérer utile
- Permettre le chargement d'une image,
    L'utilisation de "**new FileReader()**" et de "**readAsDataURL**" pourra s'avérer utile.
