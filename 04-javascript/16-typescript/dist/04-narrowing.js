"use strict";
/*
    Le narrowing c'est le fait de supprimer des possibilités de type pour nos variables.
*/
function birthday(age) {
    // age peut être un string, donc l'incrémentation est une erreur.
    // age++;
    if (typeof age === "number")
        age++;
    else
        age = parseInt(age) + 1;
    /*
        Dans notre if, age devient forcément de type nombre,
        Dans notre else, age devient forcément de type string.
    */
    return age + " ans";
}
function chaussette(droite, gauche) {
    if (droite === gauche)
        console.log("Vous avez la paire !", droite, gauche);
    /*
        Pour entrer dans la condition, droite et gauche doivent être de même type.
        TS sait donc que droite et gauche, dans la condition sont de type string. étant le seul type qu'ils ont en commun.
    */
}
function planning(date, days) {
    // date.getDate();
    if (date instanceof Date)
        date.getDate();
    // days++
    if (!Array.isArray(days))
        days++;
}
document.addEventListener("keypress", clavier);
function clavier(e) {
    if (typeof e == "number")
        console.log(e);
    /*
        Ici "e" est de type "never",
        C'est un type particulier qui indique que selon TS, il est impossible que le code arrive ici.
    */
}
// function isDate(a: any): boolean
function isDate(a) {
    return a instanceof Date;
}
function check(a) {
    if (isDate(a))
        console.log(a);
    /*
        si j'indique que ma fonction isDate() retourne un boolean,
        Typescript ne comprendra pas le rôle du boolean.
        Mais en indiquant que ma fonction retourne "a is Date"
        grâce au mot clef "is", TS comprend que le retour d'un boolean à true indique que le type de a est bien une date.
    */
}
