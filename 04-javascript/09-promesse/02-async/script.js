"use strict";
/* 
    Si je souhaite récupérer le tableau dans mon fichier json puis le trier.
    Je me retrouve avec une fonction dans une fonction, dans une fonction avec à côté deux autres fonctions appelé pour gérer les erreurs.
    C'est ce qu'on va appeler un callback hell.
    des callback dans des callback et ainsi de suite.
*/
fetch("tab.json").then(res=>{
    if(res.ok)
    {
        res.json().then(data=>{
            tri(data).then(message=>{
                console.log(message, data);
            })
            .catch(err=>console.log(err))
        })
        .catch(err=>console.log(err))
    }
})



// FONCTIONS DU COURS ET EXERCICE PRECEDENT :

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
function tri(tab){
    return new Promise((resolve, reject)=>{
        tab.sort((a,b)=>{
            if(typeof(a) !== typeof(b)){
                reject("Tous les éléments du tableau ne sont pas de même type.");
            }
            return a-b;
        })
        resolve("Le tableau a été correctement trié");
    });
}