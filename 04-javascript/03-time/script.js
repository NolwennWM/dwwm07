"use strict";
const copyright = document.querySelector('footer span');
const mainTime = document.querySelector('main time');
const mainBtn = document.querySelector('main button');

let date = new Date();
// console.log(date);
copyright.textContent = date.getFullYear();
// console.log(date.toLocaleTimeString());
// toLocaleTimeString nous rend l'heure, les minutes et les secondes en un string.
mainTime.textContent = date.toLocaleTimeString();
// * Se renseigner sur la fonction setInterval()
// https://developer.mozilla.org/en-US/docs/Web/API/setInterval
function timer()
{
    const dateTimer = new Date();
    mainTime.textContent = dateTimer.toLocaleTimeString();
}
let idInterval = setInterval(timer, 1000);
mainBtn.addEventListener("click", ()=>clearInterval(idInterval));

let idTimeout = setTimeout(()=>console.log("Coucou en retard !"), 3000);

clearTimeout(idTimeout);

const progress = document.querySelector('.progress');
let w = 0;
function load()
{
    if(w === 100)return;
    w++;
    progress.style.width = w+"%";
    setTimeout(load, 100);
}
load();