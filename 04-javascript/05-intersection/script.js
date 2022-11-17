"use strict";
const indicator = document.querySelector('.scroll-indicator');
const main = document.querySelector('main');
const options = {
    /*
        L'option root permet de changer le scrolling observé.
        Par défaut c'est celui du document (et donc du viewport)
        mais si on a ajouté un scrolling sur un élément html, on peut lui indiquer cet élément comme racine.
    */
    // root: main
    /*
        rootMargin permet d'étendre ou réduire la zone de détection.
        Avec un nombre positif, la détection sera déclenché hors de l'écran.
        Avec un nombre négatif, la détection sera déclenché dans une zone réduite de l'écran.
        (Que ce soit pour l'entrée ou la sortie de l'élément.)
    */
    // rootMargin: "-200px"
    /*
        Indique avec un chiffre entre 0 et 1 quel pourcentage de l'élément doit être visible pour déclencher l'évènement.
        ! Attention d'avoir un chiffre possible, si votre élément est plus grand que votre viewport, il n'atteindra jamais 1.
    */
    // threshold: 0.15
};
/*
    Intersection Observer est un objet permettant de détecter lorsqu'un élément html rentre dans le viewport lors du scrolling.
    Il prend obligatoirement une fonction callback en premier argument suivi d'optionnellement un objet contenant ses options.
*/
const observer = new IntersectionObserver(setIndicator, options);
// On utilise la méthode "observe" pour lui indiquer quel élément html il doit observer.
observer.observe(main)
// On peut observer autant d'élément que l'on souhaite.
function setIndicator(entries)
{
    /*
        La fonction donné en callback à l'observer sera lancé à chaque fois que l'objet observé rentre ou sort du viewport.
    */
    let entry = entries[0];
    console.log(entry);
    /* 
        Dans une entrée on trouvera les informations suivantes :
        target => la cible qui a été détecté dans le viewport
        isIntersecting => boolean qui indique si l'élément est dans le viewport
        intersectionRatio => chiffre entre 0 et 1 indiquant le pourcentage de l'élément visible lors du déclenchement.
        boudingClientRect => taille et position de l'élément cible.
        intersectionRect => taille et position de l'élément cible visible dans le viewport.
        rootBounds => Position et taille de l'élément racine (par défaut le viewport)
    */
    if(entry.isIntersecting)
    {
        window.addEventListener("scroll", indicatorAnimation);
    }
    else
    {
        window.removeEventListener("scroll", indicatorAnimation);
    }
}
function indicatorAnimation()
{
    //scrollY représente combien de pixel on a scroll.
    // offsetTop représente la position de notre élément par rapport au haut de la page.
    if(window.scrollY > main.offsetTop)
    {
        // scrollHeight représente la hauteur de l'élément incluant le padding vertical.
        // toFixed retourne un string correspondant à notre nombre avec "n" chiffres après la virgule.
        const prc = ((window.scrollY - main.offsetTop)/main.scrollHeight).toFixed(2);
        // console.log(prc);
        indicator.style.transform = `scaleX(${prc})`;
    }
    else
    {
        indicator.style.transform = "scaleX(0)";
    }
}
/*
    Pour arrêter d'observer un élément on peut utiliser :
    variableObserver.unobserve(elementHTML)
    ici :
    observer.unobserve(main)
    On peut arrêter toute observation avec :
    variableObserver.disconnect()
    ici :
    observer.disconnect()
*/