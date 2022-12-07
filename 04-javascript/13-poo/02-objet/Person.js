"use strict";
/* 
    La programmation orienté objet consiste à ranger toute la logique et le fonctionnement d'un élément dans un objet.
    Toute ses fonctions, toute ses propriétés peuvent ainsi être appelé via cet objet.
    C'est comme cela que fonctionne javascript, dont on a déjà utilisé plusieurs objets.
    (console, document, Math, Date...)
*/
const Person = {
    name: {
        prenom: "Maurice",
        nom: "DUPONT"
    },
    age: 54,
    /* 
        Les setters permettent de modifier la valeur donné en argument
        avant de la rentrer dans une propriété de l'objet.
        * ils sont précédé du mot clef "set" puis s'écrivent comme une fonction.
        Mais lors de l'appelle de ceux ci, on les utilise comme des propriétés.
            par exemple "setAge(){}" va s'appeler "setAge = ..."
        Ils ne peuvent donc prendre qu'un seul argument.
    */
    set setAge(a)
    {
        let age = parseInt(a)
        /* 
            En orienté objet, this représente l'objet dans lequel il se trouve. ici "This" vaut "Person"
        */
        this.age = isNaN(age)?0:age;
    },
    set setNom(n)
    {
        /* 
            Lorsque l'on crée l'objet de cette façon, 
            on peut remplacer this par le nom de l'objet.
            Bien que c'est une bonne habitude à prendre d'utiliser this car il aura son importance par la suite.
        */
        this.name.nom = n.toUpperCase();
        // Person.name.nom = n.toUpperCase();
    },
    set setPrenom(p)
    {
        this.name.prenom = 
            p[0].toUpperCase() + p.slice(1).toLowerCase();
    },
    /* 
        Les getters permettent de récupérer une information de l'objet 
        quelque peu transformé.
        * Il s'écrit comme une fonction mais précédé du mot clef "get"
        Il ne prend pas d'argument et DOIT retourner une valeur.
        * Son appel se fait comme une propriété "Person.getFullName"
        et non comme une fonction.
    */
    get getFullName()
    {
        return this.name.prenom + " " + this.name.nom;
    },
    /* 
        Déclarer une fonction dans un objet se fait sans le mot clef "function". Comme on déclare nos variables sans "let, const et var". 
        D'ailleurs on ne parle pas de fonction et de variable dans un objet. Mais on parle de "methode" et de "propriété"
        (On peut aussi déclarer les fonctions, avec une propriété qui contient une fonction anonyme ou fléché)
    */
    // salutation: function()
    // salutation: ()=>
    salutation()
    {
        console.log(`Bonjour, je suis ${this.getFullName} et j'ai ${this.age} ans.`);
    },
    anniversaire()
    {
        this.age++;
        this.salutation();
    }
};
export default Person;
/* 
    Un autre avantage de l'orienté objet.
    C'est que sur un code conséquent, on peut se retrouver avec des conflits de nom de variable ou de fonction qui sont les même.
    Alors qu'en orienté objet, chaque méthode et propriété étant dans des objets distinct. 
    Avoir deux noms qui sont les même ne posent pas de problème.

    * Ici Person et Person2 ont les même propriétés et méthodes, mais aucun conflit.
*/
export const Person2 = {
    name: {
        prenom: "Charli",
        nom: "FONTAINE"
    },
    age: 78,
    set setAge(a)
    {
        let age = parseInt(a)
        this.age = isNaN(age)?0:age;
    },
    set setNom(n)
    {
        this.name.nom = n.toUpperCase();
    },
    set setPrenom(p)
    {
        this.name.prenom = 
            p[0].toUpperCase() + p.slice(1).toLowerCase();
    },
    get getFullName()
    {
        return this.name.prenom + " " + this.name.nom;
    },
    salutation()
    {
        console.log(`Bonjour, je suis ${this.getFullName} et j'ai ${this.age} ans.`);
    },
    anniversaire()
    {
        this.age++;
        this.salutation();
    }
};