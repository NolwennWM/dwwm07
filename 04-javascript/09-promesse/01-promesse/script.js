"use strict";
/* 
    Par défaut, toute programmation en javascript est dite "Synchrone".
    C'est à dire que tous le fonctionnement de la page et du script se met en pause tant que le code précédent n'a pas terminé de s'executer.
*/
for (let i = 0; i <= 1000000; i++) {
    if(i == 1000000) console.log("boucle synchrone");
}
console.log("Bonjour synchrone");
/*
    Mais JS peut gérer de la programmation asynchrone.
    C'est à dire qu'il continue d'executer du code pendant qu'en parallèle une autre partie du code s'execute.
*/
fetch("test.json").then(res=>{
    for (let i = 0; i <= 1000000; i++) {
        if(i == 1000000) console.log("boucle asynchrone");
    }
})
console.log("Bonjour Asynchrone");
/*
    Une fonction retourne soit quelque chose (chiffre, string, tableau...)
    soit undefined si elle ne retourne rien.
    Il s'avère que fetch retourne bien quelque chose, une promesse.
*/
let request = fetch("test.json");
console.log(request);
/*
    Dans cet objet "promise" on a trois méthdes principales.
        .then() qui va prendre une fonction callback qui sera appelé une fois la promesse tenue (réussite).
        .catch() qui prend aussi une fonction callback mais qui sera appelé si la promesse est rejeté (échec).
        .finally() qui on l'aura compris, prend une fonction callback, qui sera appelé une fois la promesse traitée (échec ou réussite).
*/
// récupère en argument la réponse de la requête
request.then(res=>console.log("then :", res));
// récupère en argument l'erreur
request.catch(res=>console.log("catch :", res));
// Ne récupère rien en argument.
request.finally(res=>console.log("finally :", res));

/* 
    Il est possible de résoudre plusieurs promesses en même temps.
    Pour cela on fera appel à la méthode all() de l'objet "Promise"
    à laquelle on donera un tableau de toute les promesse que l'on souhaite résoudre.
    Une fois toute résolue le then() se lancera en donnant en paramètre un tableau des différents résultats.
*/
let r1 = fetch("test.json");
let r2 = fetch("test2.json");

Promise.all([r1, r2]).then(res =>{
    console.log(res);
    // Je boucle sur mon tableau de réponse pour toute les résoudres.
    res.forEach(r=>{
        // je traite chaque réponse comme je le ferais sur un fetch classique.
        if(r.ok)
        {
            r.json().then(data=>console.log(data.property))
        }
    })
})
/* 
    On trouvera aussi les méthodes "Promise.race()" et "Promise.any()" qui prendront elles aussi un tableau de promesse.
    Mais à la différence de ".all()" elles ne rendront que la plus rapide à s'executer.
    La différence entre "race" et "any" se fait au niveau du ".catch()":
        - race lancera le catch si la plus rapide des promesses échoue.
        - any passera à la promesse suivante tant que la précédente échoue et ne lancera le catch que si elles échouent toute.
*/
/* 
    Lorsque l'on crée une promesse, elle prend une fonction callback avec 2 arguments.
    Ces arguments réprésentent à leurs tour deux fonctions callback.
    La première représentera then
    la seconde représentera catch
*/
let random = new Promise((resolve, reject)=>{
    let r = Math.floor(Math.random()*10);
    if(r<5)
    {
        resolve("Bravo r est plus petit que 5 !");
    }
    else
    {
        reject("Désolé, r est plus grand que 5 !");
    }
});

random.then(res=>console.log("then :", res))
    .catch(res=>console.log("catch :", res))
    .finally(()=>console.log("finally : Mon random est terminé !"));

// Exemple burger :
// 1. sans promesse :

function burger1()
{
    pain1();
    sauce1();
    viande1();
    salade1();
    console.log("Le burger est terminé");
}
function pain1()
{
    setTimeout(()=>console.log("Le pain est grillé et placé"), 1000);
}
function sauce1()
{
    console.log("La sauce est versé");
}
function viande1()
{
    setTimeout(()=>console.log("La viande est cuite et placé"), 3000);
}
function salade1()
{
    console.log("La salade est placé");
}

// 2. avec promesse :

function burger2()
{
    pain2().then(pain=>{
        console.log(pain);
        sauce2().then(sauce=>{
            console.log(sauce);
            viande2().then(viande=>{
                console.log(viande);
                salade2().then(salade=>{
                    console.log(salade);
                    console.log("Le burger est terminé")
                })
            })
        })
    })
}
function pain2()
{
    return new Promise(resolve=>{
        setTimeout(()=>{
            resolve("Le pain est grillé")
        }, 1000)
    })
}
function sauce2()
{
    return new Promise(resolve=>{
        resolve("La sauce est versé")
    })
}
function viande2()
{
    return new Promise(resolve=>{
        setTimeout(()=>{
            resolve("La viande est cuite et placé")
        }, 3000)
    })
}
function salade2()
{
    return new Promise(resolve=>{
        resolve("La salade est placé")
    })
}