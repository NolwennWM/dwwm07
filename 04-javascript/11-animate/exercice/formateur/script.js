"use strict";
/**
 * Le texte doit être caché par défaut, 
 * Donner l'impression de sortir de la barre au milieu
 * Puis disparaître, changer le texte, faire réaparaître la barre 
 * Puis refaire le slide depuis les barres avec le nouveau texte.
 */
const spans = document.querySelectorAll("h1 span");

spans.forEach(async (sp)=>{
    let slide = sp.animate({textIndent: "0"}, {duration: 2000, fill:"forwards"});
    await slide.finished;
    let fade = sp.animate({opacity: "0"}, {duration: 1000, fill: "forwards"});
    await fade.finished;
    slide.cancel();
    sp.textContent = sp.dataset.text;
    fade.reverse();
    await fade.finished;
    slide.play();
})