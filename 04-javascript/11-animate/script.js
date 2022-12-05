"use strict";
const div = document.querySelector('.anime');

document.querySelector(".b1").addEventListener("click", animation1);
document.querySelector(".b2").addEventListener("click", animation2);
document.querySelector(".b3").addEventListener("click", animation3);
document.querySelector(".b4").addEventListener("click", animation4);
document.querySelector(".b5").addEventListener("click", animation5);

function animation1()
{
    /* 
        La méthode animate de JS prend deux arguments, 
        le premier est la liste des keyframes que l'élément HTML devra parcourir.
        Le second est un objet contenant les options de l'animation.

        * Les keyframes peuvent être données sous forme de tableau ou d'objet.
    */
    const keyframes = [
        {
            left: 0,
            top: 0
        },
        {
            left: "80%",
            top: "200px"
        },
        {
            left: "20%",
            top: "500px"
        }
    ];
    const options = {
        duration: 2000,
        iterations: 3,
        fill: "forwards",
        direction: "alternate"
    }
    div.animate(keyframes, options);
}
function animation2()
{
    // Les keyframes peuvent aussi être données sous cette forme :
    const keyframes = {
        backgroundColor: ["blue", "red", "green"],
        opacity: [1, 0, 0.5]
    }
    div.animate(keyframes, {
        duration: 2000,
        direction: "alternate",
        iterations: 2
    })
}
function animation3()
{
    // On a la possibilité de ranger l'objet retourné par animate dans une variable pour accèder à de nouvelles méthodes.
    const anime = div.animate(
        {transform: ["skew(0deg, 0deg)","skew(360deg, 180deg)", "skew(0deg, 360deg)"]},
        {duration: 1500, direction: "alternate", iterations: 1}
    )
    // console.log(anime);
    // Je peux par exemple ajouter un évènement sur mon animation.
    anime.addEventListener("finish", ()=>{
        document.querySelector(".b4").style.opacity = 1;
    })
}
let a4 = false;
function animation4()
{
    // cancel arrête et annule l'animation.
    if(a4)
    {
        a4.cancel();
        a4 = false;
    }
    else
    {
        a4 = div.animate(
            {borderRadius: ["0", "50%", "5px", "25%"]},
            {duration: 2500, fill: "forwards"}
        )
    }
}
// la méthode animate, n'est qu'un raccourci pour l'utilisation des objets suivants :
let keyframes = new KeyframeEffect(div,[
    {transform: "translate(0,0)"},
    {transform: "translate(100%, 50%)"}
],
{
    duration: 3000,
    fill: "forwards"
});
let anime5 = new Animation(keyframes, document.timeline);
async function animation5()
{
    console.log(anime5.playState);
    const b5 = document.querySelector('.b5');
    // playState indique l'état actuel de l'animation.
    switch(anime5.playState)
    {
        // idle est l'état par défaut, celui d'attente
        case "idle":
            anime5.play();
            b5.textContent = "Pause";
            // La propriété finished contient une promesse qui est résolue quand l'animation se termine.
            await anime5.finished;
            b5.textContent = "Reverse";
            break;
        //  running est l'état de l'animation quand elle se déroule
        case "running":
            anime5.pause();
            b5.textContent = "Continue";
            break;
        // paused est l'état de l'animation en pause.
        case "paused":
            anime5.play();
            b5.textContent = "Pause";
            break;
        // finished est l'état de l'animation terminé.
        case "finished":
            anime5.reverse();
            await anime5.finished;
            b5.textContent = "Start";
            // je relance le reverse et je l'annule tout de suite pour remettre toute l'animation dans son état de base.
            anime5.reverse();
            anime5.cancel();
            break;
    }
}