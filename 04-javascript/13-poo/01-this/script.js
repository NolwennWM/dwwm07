"use strict";

/* 
    Par défaut, this représente l'objet dans lequel il se trouve.
    Au plus haut niveau de notre script, il est donc égale à l'objet window.
*/
console.log(this);
console.log(this === window);

function test()
{
    /* 
        Selon si on utilise "use strict" ou non,
        this dans une fonction retournera soit 
            "undefined"
            soit
            l'objet parent, ici "window"
    */
    console.log(this);
}
test();

/* 
    Lors d'un appelle de la fonction par un écouteur 
    d'évènement, this représente l'élément sur lequel a été attaché l'écouteur.
*/
document.addEventListener("click", test);
/* 
    à la différence de la propriété target de l'évènement.
    this retournera toujours l'élément attaché.
    (ici target peut retourner soit body, soit span selon où on clique
        Alors que this retourne toujours body)
*/
document.body.addEventListener("click", function(event)
{
    console.log(this);
    console.log(event.target);
})
/* 
    !Attention dans une fonction fléché, this retourne l'objet parent (window)
*/
document.body.addEventListener("click",(event)=>
{
    console.log(this);
    console.log(event.target);
})
document.body.click();
/* 
    .bind() utilisé sur une fonction retourne un clone de la fonction 
    à la différence que dans celle ci "this" vaudra ce qui a été donné 
    en argument à bind.
*/
let test2 = test.bind("coucou");
test();
test2();

let article = document.createElement("article");
document.body.addEventListener("click", test.bind(article));
document.body.click();