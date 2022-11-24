"use strict";
const url = "https://api.thedogapi.com/v1/images/upload";
const api_key = "469f2c7f-9aad-4623-8e7a-d72c11a91b18";

const formulaire = document.querySelector('form');
const result = document.querySelector('.result');

formulaire.addEventListener("submit", uploadDog);

function uploadDog(e)
{
    e.preventDefault();
    const formData = new FormData(formulaire);
    result.textContent = "Chargement en cours...";
    /* 
        Fetch peut prendre optionnellement un second argument, 
        celui ci permet d'ajouter des options comme :
        La méthode utilisé pour envoyer la requête
        les informations contenue dans l'entête de la requête
        et le corps de la requête.
    */
    fetch(url, {
        method: "POST",
        headers: {"x-api-key": api_key},
        body: formData
    }).then(checkResponse);
}
function checkResponse(response)
{
    result.textContent = "Chargement terminé !";
    if(response.ok)
    {
        response.json().then(data=>{
            result.innerHTML += `<hr><img src="${data.url}" alt="image de chien" width="400">`;
            console.log(data);
        })
    }else{
        result.textContent = response.statusText;
    }
}