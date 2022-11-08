"use strict";
// ---------------------- EXO 5.1 ---------------------
/* écrire un algorithme qui demande à l'utilisateur un nombre compris entre 1 et 3 
jusqu'à ce que la réponse convienne.*/
let x;
do{
    x = prompt("Donne moi un chiffre entre 1 et 3");
}while(x<1 || x>3)
// ---------------------- EXO 5.2 ---------------------
/* Ecrire un algorithme qui demande un nombre compris entre 10 et 20, jusqu'à ce que 
la réponse convienne, en cas de réponse superieur à 20, on ferra apparaître un message
"Plus petit !" et inversement "plus grand !" si inférieur à 10. */
let y, m= "Donne moi un chiffre entre 10 et 20.";

do{
    y = prompt(m);
    m = y<10?"Plus grand !":"Plus petit !";
    // if(y<10)
    // {
    //     m = "Plus grand !";
    // }
    // else
    // {
    //     m = "Plus petit !";
    // }
}while(y<10 || y>20)

// -------------------- EXO 5.3 ---------------------
/* Demander un nombre à l'utilisateur, puis afficher les dix nombres suivants. */
let z = parseInt(prompt("Donne moi un nombre et je te répondrais les dix suivants"));
for(let i = z+1; i<=z+10; i++)
{
    console.log(i);
}

// -------------------- EXO 5.4 ---------------------
/* Ecrire un algorithme qui demande un nombre puis écrit la table de multiplication
de ce nombre. */
let w = prompt("Donne moi le nombre dont tu veux voir la table de multiplication");
for(let i = 0; i<10; i++)
{
    console.log(`${w} * ${i} = ${w*i}`);
    // console.log(w + " * " + i + " = " + w*i);
}

// -------------------- EXO 5.6 (5.5) ---------------------

/* Ecire un algorithme qui demande un nombre puis calcul la factoriel de ce nombre
(le 5.5 demande la même chose mais avec des additions plutôt que des multiplications) */

let v = prompt("Donne moi un nombre !"), total = 1;
for(let i = 1; i<=v; i++)
{
    total *= i;
}
console.log("La factoriel de "+v+" vaut " + total);


// -------------------- EXO 5.7 ---------------------
/* Ecrire un algorithme qui demande successivement 20(5 parceque la flemme) nombres
et qui lui dise ensuite quel était le plus grand parmi ces nombres. 
Bonus : Indiquer la position à laquelle a été donné ce nombre*/
let nb, max, pos;
for(let i = 1; i<=5; i++)
{
    nb = parseInt(prompt("Donne moi un fichu nombre !"));
    if(i==1 || max<nb)
    {
        max = nb;
        pos = i;
    }
}
console.log(`Le nombre le plus grand est ${max} et a été donné à la saisie numéro ${pos}`);
// -------------------- EXO 5.8 ---------------------
/* même exercice que précédement mais on arrête de demander des nombres que si l'utilisateur
entre un 0 */

let i = 1;
do{
    nb = parseInt(prompt("Donne moi un fichu nombre !"));
    if(i==1 || max<nb)
    {
        max = nb;
        pos = i;
    }
}while(nb != 0)
console.log(`Le nombre le plus grand est ${max} et a été donné à la saisie numéro ${pos}`);
