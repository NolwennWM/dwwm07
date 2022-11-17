"use strict";
/**
 * ---------------- EXO 1 --------------------
 * 1. Rendre tous les paragraphes du main, invisible.
 * 2. Ajouter Une observation sur chaque paragraphes.
 * 3. Lorsque l'élément est au moins à moitié dans le viewport, le rendre visible.
 * 4. Désactiver la détection de l'élément une fois l'action terminé.
 * (Bonus). Faire venir le paragraphe depuis le côté.
 * ---------------- EXO 2 ----------------------
 * 1. Lorsque le dernier paragraphe est à 200px en dessous du viewport.
 *      Créer 10 paragraphes et les ajouter à la suite du main.
 * 2. Désactiver la détection du précédent dernier paragraphe.
 * 3. Ajouter l'animation de l'exercice 1 aux nouveaux paragraphes.
 * 4. Ajouter la détection du dernier paragraphe au nouveau dernier paragraphe.
 */

const ps = document.querySelectorAll('main p');
const obs = new IntersectionObserver(showPara, {threshold: 0.5});

ps.forEach(p=>obs.observe(p));

function showPara(entries)
{
    // console.log(entries);
    entries.forEach(reveal)
}
function reveal(entry)
{
    // console.log(entry);
    if(entry.isIntersecting)
    {
        entry.target.style.opacity= "1";
        // entry.target.style.transform = "translateX(0)";
        entry.target.classList.add("roll-in-left");
        obs.unobserve(entry.target);
    }
}

// exo 2 :
let lastP = document.querySelector('main p:last-child');
const obsLast = new IntersectionObserver(addMore, {rootMargin: "200px"});
const m = document.querySelector('main');

obsLast.observe(lastP);

function addMore(entries)
{
    let ent = entries[0];
    if(ent.isIntersecting)
    {
        let p;
        for (let i = 0; i < 10; i++) {
            p = document.createElement("p");
            p.textContent = "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ut obcaecati debitis cupiditate, perspiciatis aut omnis enim commodi unde, in quis nobis nostrum corporis quam dolores qui ducimus ex voluptate eveniet.";
            m.append(p);
            obs.observe(p);
        }
        obsLast.observe(p);
        obsLast.unobserve(lastP);
        lastP = p;
    }
}