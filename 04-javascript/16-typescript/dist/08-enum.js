"use strict";
/*
    Le type unknown est utilisé pour indiquer que l'on ne connaît pas le type de notre argument.
    à la différence de any, toute action spécifique à un type sera bloqué.
*/
function hasard(arg) {
    // Impossible d'utiliser toString car on ne sait pas si ça pourrait fonctionner.
    // arg.toString()
    if (typeof arg === "number")
        arg.toString();
    // On peut utiliser le narrowing pour trouver le type d'un unknown.
}
/*
    Une constante aura tendance à prendre comme type, un literal, c'est à dire que son type vaudra exactement sa valeur:

    ici le type de "a" est litérallement "Bonjour" et non "string".
*/
const a0 = "Bonjour";
let a1 = "Bonjour";
// Un objet par contre, même si le fait qu'il soit un objet ne changera pas, verra ses propriétés changer.
const b = { truc: "banane", machin: "camion" };
/*
    Mais je peux changer cela grâce à certains mots clefs.
    Par exemple avec "as"
*/
const b1 = { truc: "banane", machin: "camion" };
/*
    Le type de "truc" devient le literal "fruit"
    et celui de "machin" comprennant qu'il est une constante, devient le literral "camion"
*/
const b2 = { truc: "banane", machin: "camion" };
/*
    Je peux aussi utiliser "as const" à l'exterieur de l'objet pour indiquer que l'objet en entier ne changera pas.
    ainsi les propriétés de b2 sont devenu des propriétés en "readOnly" ayant comme type les literals de leurs valeurs.

    Je peux aussi utiliser cela sur un tableau pour le mettre en "readOnly"
*/
const c1 = [1, 2, 3];
// Mon tableau contient des string ou des nombres.
const c2 = [34, "truc", 35, 67];
// Ceci est un "tuple", il indique que mon tableau devra contenir exactement un string puis un nombre.
const c3 = ["truc", 5];
const c4 = ["chaussette", true];
const c5 = ["tongue", false];
/*
    Ma fonction fusion, prend deux arguments de type T1 et T2 qui extends d'un tableau d'inconnu.
    Il retournera une fusion des tableaux et des deux types.
*/
function fusion(tab1, tab2) {
    return [...tab1, ...tab2];
}
// le type de c6 est donc un tuple fusion des deux tuples précédents.
const c6 = fusion(c4, c5);
const c7 = [...c4, ...c5];
const maurice = {
    legume: "Poivron",
    fruits: "Banane" /* Fruits.Banane */
};
console.log(maurice);
