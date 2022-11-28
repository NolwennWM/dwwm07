"use strict";
const main = document.querySelector('main');
const liens = document.querySelectorAll('a');

setLinks(document)
// Je fais la liste de mes routes avec en clef la route voulu
// et en valeur la route réelle.
const routes = {
    "/":"pages/home.html",
    "/index.html": "pages/home.html",
    "/about": "pages/about.html",
    "/contact": "pages/contact.html",
    404: "pages/404.html"
};
function setLinks(parent)
{
    const tags = parent.querySelectorAll('a:not([href^="https"])');
    tags.forEach(a=>a.addEventListener("click", router));
}
function router(e) {
    // Je préviens l'activation du lien.
    e.preventDefault();
    // je change le lien de ma page par celui du href de mon a
    window.history.pushState({},"",e.target.href);
    // Je charge la page correspondante.
    loadPage();
}
function loadPage(){
    // Je récupère le chemin de la page.
    const path = window.location.pathname;
    // Je récupère le chemin qui correspond dans ma liste.
    const route = routes[path] || routes[404];
    // console.log(route);
    // Je fetch ma route
    fetch(route).then(resp =>{
        if(resp.ok){
            // Je récupère les données textuelles
            resp.text().then(data=>{
                // je les affiches dans mon html.
                main.innerHTML = data;
                setLinks(main);
            })
        }
    })
}
console.log(window.history);
// window.history.pushState({},"","/")
loadPage();