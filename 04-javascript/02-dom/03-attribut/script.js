"use strict";
const h1 = document.querySelector('#mainTitle');
// ------------------ l'attribut style -----------------------
/* 
    Nos éléments html possèdent énormément d'attribut et de propriété
    L'un d'eux est la propriété "style" elle permet de venir ajouter sur notre élément html, l'attribut style.
    et donc de faire du CSS inline.
    Cela lui donne donc une grande priorité.
    Pour modifier une propriété CSS, on va faire suivre la propriété style du nom de la propriété css à changer.

    !Attention, les propriétés s'écrivant avec un "-" sont remplacé par une version camelcase 
    * exemple : background-color devient backgroundColor
    Vous ne pouvez pas récupérer ainsi, le style du fichier css, seulement celui inline.
*/
h1.style.backgroundColor = "rgb(123, 45, 98)";
h1.style.fontStyle = "italic";
h1.style.textShadow = "5px 5px rgba(0,0,0,0.3)";
h1.style.fontSize = "5rem";

// ! Attention, certaines erreurs ne provoquerons rien du tout.
h1.style.couleur = "red";
h1.style.color = "rgbaa(255, 255, 255, 0.8)"
// si il y a une erreur sur le nom de la propriété ou sur sa valeur, JS ne provoque pas d'erreur. il ne se passe juste rien.
console.log(h1.style.backgroundColor);
// le fichier css n'est pas vérifier, donc ici border est vide.
console.log(h1.style.border);

//------------------- les classes -------------------------
// l'attribut classList permet de récupérer un tableau contenant toute les classes de l'élément.
console.log(h1.classList);
// classList.add permet d'ajouter une classe.
h1.classList.add("banane");
// .remove d'en retirer une.
h1.classList.remove("banane");
// .toggle ajoute si elle n'est pas présente, ou retire si elle existe.
h1.classList.toggle("banane");
// .contains permet de vérifier la présence ou non d'une classe.
console.log(h1.classList.contains("banane"));
h1.classList.add("cerise");
//className retourne un string contenant toute les classes.
console.log(h1.className);

// -------------------- autres attributs ---------------------
// Tous les attributs existant sur un élément html sont accessible via JS.
// La plupart d'entre eux peuvent être accessible en tapant seulement .nomAttribut
console.log(h1.id);
h1.id += "2";

// Mais on peut aussi y accéder avec getAttribute et setAttribute
console.log(h1.getAttribute("id"));

const a = document.querySelector('footer ul li a');
// setAttribute prend en premier paramètre l'attribut que je souhaite modifier, et en second la valeur que je veux lui donner.
a.setAttribute("target", "_blank");

console.log(a.href, a.target);
// Le cas des data-attribut sont particulier puisqu'on peut les nommer comme on le souhaite.

a.dataset.color = " pink";
a.dataset.bidule = "Nouveau data-attribute";
// On utilise dataset pour accèder aux data-attributes suivi du nom de ce data-attr (pour en créer un nouveau il suffit de mettre un nom qui n'existe pas)