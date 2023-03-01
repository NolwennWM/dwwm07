"use strict";

import routes from "./routes.js";

const main = document.querySelector("main");
/**
 * Affiche le fichier HTML correspondant à la route donnée en paramètre
 * Puis lance les scripts correspondants.
 * @param {string} uri 
 */
export default async function router(uri)
{
    window.history.pushState({}, "", uri);
    main.classList.remove("show");

    const path = window.location.pathname;
    const route = "/view/"+(routes[path]?.html||"404.html");
    const response = await fetch(route);

    if(!response.ok)return;

    const data = await response.text();
    main.innerHTML = data;

    if(routes[path]?.js)
    {
        const script = await import("./"+routes[path].js);
        await script.default(routes[path].option??undefined);
    }

    getLinks();
    main.classList.add("show");
}
/**
 * Active la fonction de routing lors du clique sur un lien.
 * @param {MouseEvent} e 
 */
function goToHref(e)
{
    e.preventDefault();
    router(this.href);
}
/**
 * Selectionne tous les liens de la page et lance la fonction de paramètrage
 * @param {HTMLElement} parent 
 */
export function getLinks(parent=document)
{
    const links = parent.querySelectorAll("a");
    links.forEach(setLink);
}
/**
 * Paramètre le lien donné en argument.
 * @param {HTMLAnchorElement} a 
 */
function setLink(a)
{
    a.onclick = goToHref;
    const logged = sessionStorage.getItem("logged");
    if(a.classList.contains("logged"))
    {
        a.parentElement.style.display = logged?"block":"none";
    }
    else if(a.classList.contains("logout"))
    {
        a.parentElement.style.display = logged?"none":"block";
    }
}