"use strict";
/* 
    Une classe est un plan de construction pour un objet.
    Elle se déclare avec le mot clef "class" suivi de son nom et d'accolades.
    Pour instancier une classe (créer un nouvel objet à partir de notre plan) on va utiliser le mot clef "new" suivi du nom de notre classe;

*/
export default class Human
{
    /* 
        On peut déclarer 3 types de propriétés ou méthodes:
            - les propriétés classique, qui seront accessible et visible depuis notre objet.
            - Les propriétés privées, qui ne sont accessible qu'à l'interieur de notre objet.
            - Les propriétés statics, qui ne sont accessible que sur la classe et non sur l'objet.

        Les propriétés et méthodes privées, servent soit à évité d'être utilisé sans getter ou setter, soit au fonctionnement interne de l'objet. (sur un distributeur, vous avez accès aux boutons et moyen de paiement, mais pas au décompte du stock ou au déplacement des objets)
    */
    age = 0;
    #name = {};
    static categorie = "Mamifère";
    constructor(prenom, nom, age)
    {
        this.setPrenom = prenom;
        this.#setNom = nom;
        this.age = age;
        /* 
            les propriétés static et privées sont à déclarer obligatoirement avant leur utilisation, mais les propriétés classiques peuvent être déclaré à la volée directement dans le code.
        */
        this.createdAt = new Date();
    }
    /* 
        Dans une classe, on n'a pas les mots clef de déclaration habituel comme "let, const, var, function"
        seul "static" ou "#" peuvent être optionnellement utilisé.

        Dans une méthode static, seul les propriétés statics sont accessible.
        les autres propriétés sont déclaré au moment de l'instanciation de la classe.
    */
    static description()
    {
        console.log(`Un humain est un ${this.categorie} qui a généralement une tête, un buste, deux bras et deux jambes.`);
    }
    /**
     * @param {string} p
     */
    set setPrenom(p)
    {
        this.#name.prenom = p[0].toUpperCase() + p.slice(1).toLowerCase();
    }
    /**
     * @param {string} n
     */
    set #setNom(n)
    {
        this.#name.nom = n.toUpperCase();
    }
    get getFullname()
    {
        return this.#name.prenom + " " + this.#name.nom;
    }
    salutation()
    {
        console.log(`Bonjours, je suis ${this.getFullname} et j'ai ${this.age} ans`);
    }
    anniversaire()
    {
        this.age++;
        this.salutation();
    }
}