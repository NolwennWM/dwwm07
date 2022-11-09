"use strict";
/*
    On va chercher la méthode "floor" de l'objet "Math" qui nous permet d'arrondir à l'inferieur.
    Math.random() nous permet d'obtenir un chiffre entre 0 et 1.
    x contiendra donc un chiffre entre 0 et 20.
*/
let x = Math.floor(Math.random()*20);
// Un if permet de vérifier une condition, il attend un boolean pour savoir si il peut faire l'action entre accolade ou non.
if(x<10)
{
    console.log(x + " est plus petit que 10");
}
// à la suite d'un if, on peut optionnellement ajouter un else if pour vérifier une autre condition.
else if(x>10)
{
    console.log(x + " est plus grand que 10");
}
// à la suite d'un if ou d'un else if, on peut ajouter un else, qui s'enclenchera si toute les autres conditions sont fausse.
else
{
    console.log("x vaut 10");
}
// on peut mettre autant de else if que l'on veut.
/*
    d'autres syntaxes existent, comme en ne mettant pas d'accolade, dans ce cas là, seule la première instruction qui suis sera dans le if. les autres seront considéré hors du if.
*/
if(x<10)
    console.log(x + " est plus petit que 10");
else if(x>10)
    console.log(x + " est plus grand que 10");
else
    console.log("x vaut 10");

/*
    On peut aussi utiliser une ternaire, c'est à dire une condition sous la forme :
    condition?true:false;
*/
let message = x<10?x + " est plus petit que 10":x + " est plus grand ou égale à 10";
console.log(message);
// Je peux imbriquer une ternaire dans une autre.
message = x<10?x + " est plus petit que 10":x>10?x + " est plus grand que 10":"x vaut 10";
console.log(message);
// ------------------------ Switch ------------------------
let ville = prompt("De quelle ville venez-vous?");
console.log(ville);
// Le switch accueil une variable en paramètre puis lance le cas qui correspond
switch(ville.toLowerCase())
{
    // Plusieurs cas peuvent lancer les mêmes actions.
    case "londre":
    case "tokyo":
    case "paris":
        alert("De la capital donc");
        break;
        // Le mot clef "break" permet d'arrêter le cas ici et de ne pas lancer les prochaines actions.
    case "lille":
        alert("Moule, frite et bière");
        break;
        // Le mot clef "default" permet de créer un cas par défaut qui se lance si les précédents ne correspondent pas
    default:
        alert("Je ne connais pas");
}
//---------------------- ?. ------------------
// les caractères ?. permettent le chaînage optionnel.
let obj = {
    info: "Cet objet est un exemple",
    superInfo: {a: "rien"}
},
obj2 = null, obj3;
/*
    Il permet de vérifier si un élément existe avant de tenter d'accèder
    à ses propriétés.
    si je tente d'accèder à "undefined" ou "null" alors 
    les éléments suivants ne s'executerons pas.
    !ATTENTION, on ne peut pas l'utiliser pour attribuer une valeur.
*/
console.log(
    obj?.info, 
    obj?.info?.superInfo,
    obj?.fake?.superInfo,
    obj2?.info,
    obj3?.info
    );
// ----------------------- ?? ------------------------
let a, b = undefined, c = null, d = "chaussette", e = {nom:"Bruno"}, f = ["test"];
// Le "??" permet de vérifier si la variable précédente est défini et dans le cas contraire, utiliser ce qui est donné apprès les "??"
console.log(
    a??"Coucou", 
    b??"Coucou",
    c??"Coucou",
    d??"Coucou",
    e.nom ?? "Coucou",
    e.prenom??"Coucou",
    f[0]??"Coucou",
    f[1]??"Coucou"
);