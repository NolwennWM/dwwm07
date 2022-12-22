"use strict";

/* 
    Le type unknown est utilisé pour indiquer que l'on ne connaît pas le type de notre argument.
    à la différence de any, toute action spécifique à un type sera bloqué.
*/
function hasard(arg: unknown)
{
    // Impossible d'utiliser toString car on ne sait pas si ça pourrait fonctionner.
    // arg.toString()
    if(typeof arg === "number")
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
const b = {truc: "banane", machin: "camion"};
/* 
    Mais je peux changer cela grâce à certains mots clefs.
    Par exemple avec "as"
*/
const b1 = {truc: "banane" as "fruit", machin: "camion" as const};
/* 
    Le type de "truc" devient le literal "fruit" 
    et celui de "machin" comprennant qu'il est une constante, devient le literral "camion"
*/
const b2 = {truc: "banane", machin: "camion"} as const;
/* 
    Je peux aussi utiliser "as const" à l'exterieur de l'objet pour indiquer que l'objet en entier ne changera pas.
    ainsi les propriétés de b2 sont devenu des propriétés en "readOnly" ayant comme type les literals de leurs valeurs.

    Je peux aussi utiliser cela sur un tableau pour le mettre en "readOnly"
*/
const c1 = [1,2,3] as const;
// Mon tableau contient des string ou des nombres.
const c2: (string|number)[]= [34, "truc", 35, 67];
// Ceci est un "tuple", il indique que mon tableau devra contenir exactement un string puis un nombre.
const c3: [string, number] = ["truc", 5]

type listeBool = [string, boolean];
const c4: listeBool = ["chaussette", true];
const c5: listeBool = ["tongue", false];
/* 
    Ma fonction fusion, prend deux arguments de type T1 et T2 qui extends d'un tableau d'inconnu.
    Il retournera une fusion des tableaux et des deux types.
*/
function fusion<T1 extends unknown[], T2 extends unknown[]>(tab1:T1, tab2: T2): [...T1, ...T2]
{
    return [...tab1, ...tab2];
}
// le type de c6 est donc un tuple fusion des deux tuples précédents.
const c6 = fusion(c4, c5);
/* 
    Ce qu'on a fait avec la fonction précédente peut être résumé à cela :
*/
type DoubleLB = [...listeBool, ...listeBool];
const c7: DoubleLB = [...c4, ...c5];

// -------------- enumerateur -----------------
/* 
    Les énumérateurs permettent de lister des valeurs qui seront les seuls valeurs utilisable.
*/
// Cette version ne donnera que l'index correspondant
// enum Fruits{
//     Banane, 
//     Fraise, 
//     Pomme, 
//     Cerise"
// }
// Cette version donnera le string correspondant.
// enum Fruits{
//     Banane ="Banane", 
//     Fraise="Fraise", 
//     Pomme="Pomme", 
//     Cerise="Cerise"
// }
// Cette version n'apparaît pas dans la compilation.
const enum Fruits{
    Banane ="Banane", 
    Fraise="Fraise", 
    Pomme="Pomme", 
    Cerise="Cerise"
}
interface favorite{
    fruits: Fruits;
    legume: string;
}
const maurice: favorite = {
    legume: "Poivron",
    fruits: Fruits.Banane
}
console.log(maurice);
