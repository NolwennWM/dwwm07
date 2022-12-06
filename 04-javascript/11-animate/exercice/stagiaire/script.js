"use strict";
/*
    Le texte doit être caché par défaut, 
    Donner l'impression de sortir de la barre au milieu
    Puis disparaître, changer le texte, faire réaparaître la barre 
    Puis refaire le slide depuis les barres avec le nouveau texte.
*/

const div =document.querySelector(".animation");
window.addEventListener("load", slide1);

function slide1(){
    const slideLeft1 = document.querySelector(".DevLeft");
    let a1 = [{
        left:"100%"
    }, {left:"0"}]
    let a2 = {
        duration: 2000,
        fill: "forwards"
    }
    slideLeft1.animate(a1,a2);
}