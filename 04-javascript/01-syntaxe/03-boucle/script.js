"use strict";
// ----------------------- WHILE ---------------------------
let a = 0;
// tant que a est plus petit que 10 :
while(a<10)
{
    // On répète ce qui se trouve entre accolade.
    console.log("a vaut ", a);
    // On prévoit la condition de sortie.
    a++;
}
// ! ATTENTION de toujours prévoir un moyen de sortir.
while(true)
{
    a++;
    if(a<20)
    {
        // Continue met fin à l'itération en cours mais continue la boucle.
        continue;
        // Ici ce qui suis ne s'executera que si a arrive à 20.
    }
    console.log("a vaut ", a);
    if(a == 25)
    {
        // Break met fin à la boucle.
        break;
    }
}

/* 
    do while permet de lancer une action au moins une fois avant de vérifier si elle doit être répété.
    Ici a est plus grand que 5, donc il n'y aura pas de boucle, 
    mais le console.log se lancera quand même une fois.
*/
do{
    console.log("a vaut ", a);
}while(a<5);

// ------------------ FOR -----------------------
for(let i = 0; i<10; i++)
{
    /* 
        La boucle for prend 3 paramètres séparés de ";" 
        - Le premier est une déclaration et définition de variable qui sera executé avant le début de la boucle.
        - le second est la condition qui sera vérifié avant chaque itération pour savoir si la boucle continue.
        - Le troisième est la modification de la variable qui aura lieu à la fin de chaque itération.
    */
    console.log("i vaut ", i);
}
let arr = ["pizza", "cannelé", "gratin dauphinois"];
let person = {nom: "Maurice", age:55, yeux: "vert"};

for(let food in arr)
{
    // for in permet de récupérer les différents index d'un tableau.
    console.log(food, " -> ", arr[food]);
    // à chaque itération, la variable déclaré dans le for prendra la valeur de l'index suivant.
}
for(let carac in person)
{
    // utilisé sur un objet, on obtien le nom des propriétés.
    console.log(carac, " -> ", person[carac]);
}

for(let f of arr)
{
    // for of comme for in va parcourir mon tableau, mais au lieu de selectionner les index, il selectionnera directement les valeurs.
    console.log(f);
}
// for of ne fonctionne pas sur les objets.
// for(let truc of person){}

// ---------------------- forEach et map -------------------
let a1 = [8, 42, 34, 13, 97];
/* 
    forEach et map sont des méthodes(fonction) appartenant aux tableaux 
    Elles ne fonctionnent donc que sur les tableaux.
    avec la syntaxe suivante :
        tableau.forEach(fonction);
        tableau.map(fonction);
*/
a1.forEach(chiffre=>console.log(chiffre));
/*
    forEach crée une itteration pour chaque élément du tableau.
    cet élément est récupéré dans la variable donné en paramètre 
    de forEach, et peut être utilisé comme on le souhaite dans la fonction callback. (plus de détail dans le cours sur les fonctions)
*/
let a2 = a1.map(val => val*2)
console.log(a2);
/*
    le fonctionnement de map se rapproche de celui de forEach, à la différence qu'il permet de modifier les valeurs d'un tableau et nous retourne un nouveau tableau contenant les valeurs retourné par la fonction callback.
*/
let a3 = arr.map(food=>food.toUpperCase());
console.log(a3);