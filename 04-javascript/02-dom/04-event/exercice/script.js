// ------------- EXO 1 ------------------------
/*
Faire que lors de la selection d'une couleur dans la div 2
le texte du bouton change de couleur, 
et lors de l'appuie sur le bouton, 
le background de la div change de couleur.
*/
const i2 = document.querySelector('.div2 input');
const b2 = document.querySelector('.div2 button');
const d2 = document.querySelector('.div2');
i2.addEventListener("change", textColor);
b2.addEventListener("click", bgColor);
function textColor(e)
{
    b2.style.color = e.target.value;
}
function bgColor()
{
    d2.style.backgroundColor = i2.value;
}
// ---------------------- EXO 2
/* 
Lors du clique sur le bouton de la div 3,
faire apparaître une modale (soit déjà créé en html/ soit que l'on crée en JS)
Cette modale doit contenir un élément permettant de la faire disparaître.
*/
const b3 = document.querySelector('.div3 button');
const m = document.querySelector('.modal');
const btnModal = document.querySelector(".modal button:last-of-type")
function modal()
{
    m.classList.toggle("hidden");
}
b3.addEventListener("click", modal);
btnModal.addEventListener("click", modal);
// -------------------------- EXO 3 ----------------------
/* 
Faites que tous nos li dans la nav double de taille lorsque l'on clique dessus.
puis retournent à leurs tailles d'origine si on clique de nouveau dessus.
*/
const liste = document.querySelectorAll('nav li');
function double(e)
{
    let li = e.target;
    if(li.style.transform == "")
    {
        li.style.transform = "scale(2)";
    }
    else
    {
        li.style.transform = "";
    }
}
liste.forEach(l=>l.addEventListener("click", double));
// ------------------ EXO 4 ------------------------
/* 
Utilise les évènements "mouseenter" et "mousemove" pour 
faire que lorsque l'on passe sur le span du footer, il commence à suivre la souris
et cela jusqu'à ce que l'on clique, il retournera alors à sa position d'origine.
*/
const sp = document.querySelector('.endOfFile');
sp.addEventListener("mouseenter", followOn);
document.body.addEventListener("click", followOff);
function followOn(e)
{
    sp.style.position = "absolute";
    document.body.addEventListener("mousemove", follow);
}
function follow(e)
{
    sp.style.top = e.clientY+"px";
    sp.style.left = e.clientX+"px";
}
function followOff()
{
    sp.style.position = "";
    document.body.removeEventListener("mousemove", follow);
}