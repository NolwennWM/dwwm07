# La POO via des objets #

Vous allez devoir construire plusieurs projets contenu dans des objets.
Chacun de ces objets doivent être dans un fichier différent.
Dans leurs fichiers, aucun code autre que l'export ou des commentaires ne doit se trouver hors de l'objet.

Tout le HTML des différents projets doit être généré par les fichiers JS.
Chaque projet devra contenir une méthode "**create**" qui permettra de créer les éléments HTML et retournera le projet.

Tous doivent être importé dans un fichier script principal grâce aux modules.
Utilisez les méthodes "**créate**" de vos projets pour récupérer leurs éléments HTML.

L'index.html doit contenir au moins ce code :

```html
<select id="appli" size="3">
    <option value="justePrix">Juste prix</option>
    <option value="paint">Paint</option>
    <option value="slider">Slider</option>
</select>
<div class="appli"></div>
```

Selon l'élément selectionné dans le select, vous devez afficher dans la div "appli" le projet correspondant.

Veuillez documenter toute vos méthodes et propriétés telle que :

```javascript
/** Un objet super utile */
const monObjet = {
    /** string très utile */
    myProperty : "hello world",
    /**
     * Retourne la multiplication des nombres données en argument
     * @param {number} a un nombre
     * @param {number} b un autre nombre
     * @returns {number} le résultat de a*b
     */
    myMethod(a,b)
    {
        return a*b
    }
}
```

## 1. Juste Prix ##

Faites un petit juste prix qui doit contenir au moins un "input" et un "p".
L'input servira à prendre la réponse de l'utilisateur.
Le p à afficher les messages du jeu.

Faites simple pour commencer, on se contentera de :

- Un nombre aléatoire.
- Trois messages, "plus grand", "plus petit" ou "gagné".

## 2. Slider ##

Adaptez le code du slider que l'on a construit ensemble en un objet.

Vous pouvez utiliser votre version ou celle du cours.

La taille du slider doit s'adapter à la taille de son parent.

## 3. Paint ##

Adaptez le code de l'application de dessin à un objet unique.

L'application doit s'adapter à la taille de son parent.

## 4. Bonus ##

Adaptez la version du juste prix avec la carte qui se retourne.

Permettre en ajoutant un paramètre "true" à la méthode "**create**" du slider d'ajouter un style par défaut à notre slider sans passer par un fichier css.
