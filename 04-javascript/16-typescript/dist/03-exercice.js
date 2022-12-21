"use strict";
/*
    Faire fonctionner la fonction compteur de la partie 1
*/
// const btn = document.querySelector("#compte")!;
// const btn = document.querySelector("#compte") as HTMLButtonElement;
const btn = document.querySelector("#compte");
let i = 0;
btn.addEventListener("pointerdown", () => {
    i++;
    btn.textContent = i.toString();
});
