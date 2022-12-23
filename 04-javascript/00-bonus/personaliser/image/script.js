"use strict"
const imgs = document.querySelectorAll('.img-container');

imgs.forEach(img=>
        img.querySelector("button").addEventListener("pointerdown", fullscreen.bind(img))
    )
function fullscreen()
{   
    if(document.fullscreenElement)
        document.exitFullscreen();
    else
        this.requestFullscreen();
}
/* 
    document.fullscreenElement est une propriété qui contient soit null soit l'élément qui est en plein écran.
    exitFullscreen() est une méthode qui met fin au plein écran.
    requestFullscreen() est une méthode qui met l'élément HTML précédent en plein écran.
*/