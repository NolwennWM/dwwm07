"use strict";
/* 
    Le shadow DOM permet de créer un arbre DOM séparé du reste du DOM.
    Ce DOM fantôme obéit à ses propres règles, ignorant les scripts et styles du DOM parent.
    De même les scripts et styles du shadow DOM n'influe pas sur ceux du parent.

    Pour créer un hôte fantôme (shadow host), il suffit d'appeler la méthode suivante "attachShadow":
        element.attachShadow({mode:""})
            le mode peut être "open" ou "closed"
    le mode "open" est accessible depuis n'importe quel script via l'attribut "shadowRoot" de son hôte.
    Alors que le "closed" est censé ne pas être accessible.
*/
const open = document.querySelector('.open');
const close = document.querySelector('.close');

const shadowpen = open.attachShadow({mode:"open"});
const shadowclose= close.attachShadow({mode:"closed"});

// accessible
console.log(open.shadowRoot);
// non accessible
console.log(close.shadowRoot);
/* 
    Dans l'exemple suivant, chacun des h1 ne sont affecté que par le style de leur propre DOM.

    à noter que j'utilise des feuilles de style interne dans cet exemple, mais il est tout à fait possible d'ajouter une feuille de style externe.

    On notera aussi le selecteur css ":host" qui est utilisable uniquement en shadowDOM et qui correspondra au "root" ou au "body" de notre DOM fantôme.
*/
// premier style
const style1 = document.createElement("style");
style1.textContent = /* CSS */
`
:host{
    text-align: right;
}
h1{
    background-color: black;
}
`;
const h01 = document.createElement("h1");
h01.textContent = "Je vois des fantômes dans les ombres";
shadowpen.append(style1, h01);
// Second style
const style2 = document.createElement("style");
style2.textContent = /* CSS */
`
:host{
    text-align: center;
}
h1{
    text-shadow: 5px 5px 5px red;
}
`;
const h02 = document.createElement("h1");
h02.textContent = "Mon ombre cache un fantôme";
shadowclose.append(style2, h02);
/* 
    Si je tente de selectionner tous mes H1, seul celui du DOM principale sera trouvé.

    Pour selectionner ceux des DOM fantômes, il faudra soit faire la recherche dans le shadowRoot retourné par attachShadow, soit si il est "open" via l'attribut shadowRoot de l'host fantôme.
*/
const hx = document.querySelectorAll('h1');
console.log(hx);

const h01bis = shadowpen.querySelector('h1');
const h01bis2 = open.shadowRoot.querySelector('h1');
console.log(h01bis, h01bis2);

/* 
    Maintenant fusionnons notre shadow DOM avec nos custom Elements.

    Pour cela je vais lier directement un shadow DOM à mon customElement dans son constructor.

    Je peux ainsi ajouter son style directement sous forme de balise "style" ou "link".
*/
import SuperBalise from "./SuperBalise.js";