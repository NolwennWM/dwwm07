"use strict";

/* 
    Les templates sont des balises HTML qui ne s'affiche pas sur votre page.
    Leur principale utilité est d'être récupéré afin d'être cloné,
    puis modifier leur contenue textuel pour l'insérer dans la page.

    Pour cela on va selectionner notre template.
    Puis récupérer son contenu avec la propriété ".content".
    Ce contenu n'est pas une balise mais un "document fragment"

    C'est ce contenu que l'on va cloner avec la méthode ".cloneNode()"
    Si on n'utilise cloneNode sur un élément HTML ou un document fragment, seul cet élément sans son contenu sera cloné.
        Il faut ajouter le paramètre "true" à cloneNode pour qu'il aille cloner en profondeur.
    
*/
const template = document.querySelector('#card');
console.log(template.content);
const content = template.content;
const clone = content.cloneNode(true);
console.log(clone);
// document.body.append(clone)
async function getCards()
{
    const response = await fetch("cards.json");
    if(!response.ok)return;
    const data = await response.json();
    data.forEach(c => {
        const clone = content.cloneNode(true);
        clone.querySelector("h2").textContent = c.title;
        clone.querySelector("p").textContent = c.paragraphe;
        const a = clone.querySelector("a");
        a.href = c.link;
        a.textContent = "clique moi !";
        document.body.append(clone);
    });
}
getCards();
/* 
    Les slots ne peuvent être utilisé qu'avec un élément personalisé.
    Les slots prennent un attribut "name" afin de les identifier.
    Ils servent de placeHolder dans un template. 

    Lorsque je vais appeler mon élément personalisé, je peux insérer de nouvelles balises à l'interieur, balise qui prendront l'attribut "slot".
    En donnant à cet attribut un des "name" d'un slot du template.
    Cette balise viendra remplacer le slot qui correspond dans le template.

    Exemple :
        <template>
            <div>
                <slot name="contenu"></slot>
            </div>
        </template>
        <super-balise>
            <ul slot="contenu">
                <li> coucou </li>
            </ul>
        </super-balise>
    * Cet exemple affichera dans la page :
        <super-balise>
            #shadowRoot
                <div>
                    <ul slot="contenu">
                        <li> coucou </li>
                    </ul>
                </div>
        </super-balise>
    * ceci est ce qui sera visible pour l'utilisateur, en vérité, dans l'inspecteur, c'est un peu différent.
*/
import SuperCard from "./SuperCard.js";