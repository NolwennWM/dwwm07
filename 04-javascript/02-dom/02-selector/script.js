"use strict";
// getElementsByTagName retourne une collection (tableau) d'éléments html correspondant au nom de balise donné en argument.
const li = document.getElementsByTagName("li");
console.log(li);
// Etant une collection, si je souhaite modifier un élément, il faut que j'y accède directement, impossible de modifier directement la collection en entier.
li[0].textContent = "Marbre";

// Récupère des éléments selon le nom de leur classe.
const p = document.getElementsByClassName("step");
const p1 = document.getElementsByClassName("marche1");
console.log(p, p1);

// Récupère directement l'élément qui correspond à l'id donné.
const h1 = document.getElementById("mainTitle");
console.log(h1);

/*
    querySelector va prendre en argument, n'importe quel selecteur css.
    Il va selectionner le premier élément qui correspond au selecteur css.
*/

const p2 = document.querySelector(".marche2");
// const p2 = document.querySelector("main > p:nth-of-type(2)");
// const p2 = document.querySelector("main p.step.marche2");
console.log(p2);

// Si on souhaite selectionner plusieurs éléments à la fois, on utilisera querySelectorAll qui nous rendra une nodeList
const li2 = document.querySelectorAll("footer li");
console.log(li2);
//! Attention, HTMLcollection est un objet, nodeList un tableau.

// Plutôt que chercher dans le document en entier, on peut chercher qu'à l'interieur d'un élément précis 
const header = document.querySelector('header');
const h = header.querySelector('h1');

// nextElementSibling permet de récupérer l'élément frère suivant.
//* Par exemple ici c'est mon main
console.log(header.nextElementSibling);
// Attention nextSibling récupère le prochain frère peu importe si c'est un élément html ou du text:
//* Par exemple ici c'est un saut à la ligne.
console.log(header.nextSibling);
// Pareil mais pour le précédent.
console.log(li2[2].previousElementSibling);
console.log(li2[2].previousSibling);
// On récupère l'élément parent
console.log(header.parentElement);
// closest permet de selectionner le parent le plus proche correspondant au selecteur css donné.
console.log(li2[0].closest("footer"));
// retourne une HTMLcollection contenant tous les enfants de l'élément.
console.log(header.children);

// remove permet de retirer un élément du HTML tout en le gardant existant en JS
h.remove();
console.log(h);
// prepend permet d'ajouter au début d'un de mes élément plutôt qu'à la fin (comme append)
document.querySelector("main").prepend(h);
// retire l'enfant donné en argument qui se trouve dans le parent. 
// header.removeChild(h);