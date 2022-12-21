"use strict";
/*
    J'ai déclaré un type fruit avec le mot clef "type"
    Puis je l'utilise pour type mes variables.
*/
let f = { nom: "Pomme", couleur: "rouge" };
let aF = [
    f,
    { nom: "banane", couleur: "jaune" }
];
/*
    Je déclare un type "Age" qui est de type nombre ou string.
    Puis je déclare un type "Person" qui est un objet, dont une des propriétés est de type "Age".
*/
let p = { nom: "Maurice", age: 45 };
/*
    Ici j'indique que "Name" est du même type que la propriété "nom" du type "Fruit";
*/
let n = "George";
/*
    Ici notre type "Full" n'accepte grâce à "keyof"
    que des string qui sont égale aux noms des propriétés de "Person"
*/
let fp = "age";
fp = "nom";
let objet = { vieux: true, prenom: "Maurice", age: 78 };
/*
    Sur ce dernier exemple, le type est créé par rapport à l'objet précédement déclaré.
    Il lit les propriétés de l'objet et en fait un type correspondant.
*/
// --------------- Generics ----------------
function useless(arg) {
    return arg;
}
let machine = useless("Salut");
/*
    Dans notre premier cas, la fonction prend n'importe quel type en argument.
    Elle retourne aussi n'importe quel type.
    Mais rien n'indique que le type sera le même.
    Notre variable dépendant du type de retour de la fonction devient donc de type "any"

    Dans notre second cas, on lui indique qu'elle va recevoir un type particulier, elle ne sait pas lequel mais il est sauvegardé, et on lui indique ensuite qu'elle retournera ce même type.

    ma variable prend donc le même type que l'argument qui est donné à la fonction.
*/
function useful(arg) {
    return arg;
}
let machine2 = useful("Bonjour");
let machine3 = useful(42);
function lastOf(arr) {
    return arr.at(-1);
}
/*
    Ici on indique que notre argument est un tableau d'un type précis.
    Mais que le retour n'est pas un tableau, seulement le type qui était contenu dans le tableau. (ou undefined)
*/
let last = lastOf([23, 45, 12]);
function logSize(arg) {
    console.log(arg.length);
    return arg;
}
/*
    Ici on précise à notre fonction, qu'elle peut certe prendre n'importe quel type.
    Mais que ce type doit au moins avoir la propriété "length" qui est un nombre.
    On peut donc par exemple lui donner un tableau, un string, mais pas un nombre.
*/
// let size1 = logSize(45);
let size1 = logSize([45]);
let size2 = logSize("Chaussette");
