"use strict";
// Asynchronus JavaScript And Xml (AJAX)
// *Cela se résume en le fait d'envoyer des requêtes au serveur via Javascript.
// Chemin vers mon fichier :
const url = "./hero.json";
/* 
    On va voir deux façon de gérer les requêtes.
    La plus vieille : XMLHttpRequest
    et la plus moderne : fetch
*/
// on créer un nouvel objet XMLHttpRequest
const xmlhttp = new XMLHttpRequest();
// On donne à notre objet, un écouteur d'évènement qui sera lancé à chaque changement d'état de notre requête.
xmlhttp.onreadystatechange = handleRequest;
function handleRequest()
{
    // console.log(xmlhttp.readyState, xmlhttp.status);
    /* 
        readyState indique à quel moment de la requête on se trouve (4 étant la dernière étape)
        status indique le status de la requête :
        1xx indique une simple information
        2xx tous s'est bien passé.
        3xx il y a eu une redirection.
        4xx erreur côté client.
        5xx erreur côté serveur.
    */
    if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
    {
        let success, data;
        /* 
            Try catch permet de placer une partie ou tout notre code dans les accolades du try. 
            Si une erreur est provoqué dans notre code, elle sera capturé et non affiché, ce qui ne bloquera pas notre script.
            Si une erreur est provoqué, alors elle sera capturé et placé dans l'argument de catch, et alors ce qui se trouve dans les accolades de catch sera effectué.

            On peut ainsi créer un script qui ne plante pas en cas d'erreur et avoir des erreurs personnalisés.

            Il existe aussi "finally{}" qui sera effectué une fois le try catch terminé, qu'il y ai eu une erreur ou non.

            *try catch n'est pas lié aux requêtes AJAX et peut être utilisé n'importe où.
        */
        try
        {
            data = JSON.parse(xmlhttp.responseText);
            success = true;
        }catch(e)
        {
            console.log(e.message + " DANS -> " +xmlhttp.responseText);
            success = false;
        }
        // finally{
        //     console.log("coucou");
        // }
        if(success)
        {
            // console.log(data);
            document.body.innerHTML = `<h1>${data.squadName}</h1>`;
        }
    }
}
/* 
    On ouvre la requête:
        en premier argument, on lui donne la méthode sous forme de string.
        En second on lui donne l'url à laquelle on souhaite faire une requête
        En troisème, on lui indique si la requête doit être Asynchrone ou non.
            * De façon synchrone, le script pourra bloquer jusqu'à obtenir le résultat de la requête
            * De façon asynchrone, le script continuera sans attendre le résultat de la requête qui se fera en parallèle.
*/
xmlhttp.open("GET", url, true);
// On envoie la requête
xmlhttp.send();

// --------------- fetch ------------------
/* 
    fetch est toujours en asynchrone et par défaut utilise la méthode "GET", donc on peut se contenter de lui donner l'url.
    Ensuite on utilisera la méthode .then() qui prendra une fonction callback qui sera lancé une fois la requête terminé.
*/
fetch(url).then(handleFetch);

function handleFetch(responseText)
{
    // console.log(responseText);
    if(responseText.ok)
    {
        /* 
            sur la réponse donné par fetch, je peux utiliser la méthode ".json()" pour traiter les données json comme le ferait "JSON.parse()" 
            Si ce n'est que le résultat du traitement du JSON sera envoyé :
                dans le .then() suivant si tout s'est bien passé, 
                ou dans le .catch() si il y a une erreur.
        */
        responseText.json()
            .then(showResult)
            .catch(error=>console.log(error))
    }
    else{
        console.log(responseText.statusText);
    }
}
function showResult(data)
{
    // console.log(data);
    document.body.innerHTML += `<h2>${data.homeTown}</h2>`;
}