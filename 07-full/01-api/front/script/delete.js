"use strict";
import router from "./router.js";
export default function()
{
    if(confirm("Êtes vous sûr de vouloir supprimer cet utilisateur?"))
        deleteUser();
    else
        router("/");
}
async function deleteUser()
{
    const response = await fetch("http://api.localhost/user"+window.location.search, {
        method: "DELETE",
        credentials: "include"
    });
    const main = document.querySelector("main");
    if(response.ok)
    {
        sessionStorage.clear();
        main.textContent = "Utilisateur supprimé";
        const h2 = document.querySelector("header h2");
        h2.textContent = "Non connecté";
        setTimeout(router, 3000, "/");
    }
    else
    {
        const data = await response.json();
        main.textContent = data.message??"Erreur Inconnu";
    }

}