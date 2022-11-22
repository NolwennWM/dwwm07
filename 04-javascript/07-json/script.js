"use strict";
/* 
    JSON signifie JavaScript Object Notation.
    C'est un langage qui permet de transformer des données complexe comme un tableau ou un objet en string. Cela peut servir pour sauvegarder des données sous forme de string mais aussi pour transférer des données entre différents langages.
    Par exemple un tableau PHP et un tableau JS ne s'écrivant pas de la même façon, impossible de communiquer entre eux, mais avec du JSON, cela devient possible.
*/
const form = document.querySelector("form");

form.addEventListener("submit", saveData);

function saveData(e)
{
    // J'empêche le chargement de page lors de la soumission du formulaire
    e.preventDefault();
    // Je transfère les données de mon formulaire à l'objet FormData.
    const data = new FormData(form);
    // Je déclare un objet vide
    let user = {};
    // un forEach sur data me permet de récupérer les valeurs et noms de mes champs.
    data.forEach((value, name)=>{
        // console.log(value, name);
        user[name] = value;
    })
    // console.log(user);
    showUser(user);
    // JSON.stringify permet de transformer un objet ou tableau en string JSON.
    const strUser = JSON.stringify(user);
    localStorage.setItem("user", strUser);
}
function showUser(u)
{
    const h1 = document.querySelector("h1");
    h1.textContent = `Je suis ${u.prenom}, ${u.age} ans !`;
}

const userString = localStorage.getItem("user");
if(userString)
{
    // console.log(userString);
    // JSON.parse() permet de transformer un string JSON en objet ou tableau javascript.
    const user = JSON.parse(userString);
    // console.log(user);
    showUser(user);
}