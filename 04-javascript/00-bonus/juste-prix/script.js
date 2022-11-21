"use strict";

let number, turn;
const max = 7,
    badShadow = "1px 1px 5px red, -1px -1px 5px red",
    goodShadow = "1px 1px 5px green, -1px -1px 5px green",
    restart = document.querySelector(".card .front button"),
    answer = document.querySelector(".card .front span"),
    card = document.querySelector(".card"),
    messageP = document.querySelector(".message"),
    guess = document.querySelector(".gameZone input"),
    submit = document.querySelector(".gameZone button");

function start()
{
    turn = 0;
    answer.textContent = "?";
    number = Math.ceil(Math.random()*100);
    messageP.textContent = `Veuillez choisir un nombre entre 1 et 100, vous avez ${max} essais`;
    // Pour le bouton "recommencer" :
    messageP.style.textShadow = "";
    card.classList.remove("reveal");
    guess.disabled = false;
    submit.disabled = false;
    guess.focus();
}
function endOfGame(win)
{
    if(win)
    {
        messageP.textContent = `Bien joué ! Vous avez trouvé en ${turn} tours.`;
        messageP.style.textShadow = goodShadow;
    }
    else
    {
        messageP.textContent = `C'est perdu ! les ${max} tours sont écoulés.`;
        messageP.style.textShadow = badShadow;
    }
    answer.textContent = number;
    card.classList.add("reveal");
    guess.disabled = true;
    submit.disabled = true;
}
function check()
{
    let nb = parseInt(guess.value);
    messageP.style.textShadow = badShadow;
    if(isNaN(nb))
    {
        messageP.textContent = "J'ai demandé un nombre !";
        return;
    }
    else if(nb<1 || nb>100)
    {
        messageP.textContent = "J'ai dit entre 1 et 100 !";
        return;
    }
    turn++;
    messageP.style.textShadow = "";
    if(nb === number)
        endOfGame(true);
    else if(turn === max)
        endOfGame(false);
    else if(nb < number)
        messageP.textContent = `C'est plus grand que ${nb}`;
    else
        messageP.textContent = `C'est plus petit que ${nb}`;
    guess.value = "";
    guess.focus();

}

start();
restart.addEventListener("click", start);
submit.addEventListener("click", check);
guess.addEventListener("keyup", e=>{
    if(e.key === "Enter")check();
});