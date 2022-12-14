import SuperBalise from "./SuperBalise.js";
import SuperDiv from "./superDiv.js";
/* 
    Les customs elements (éléments personnalisés) permettent de créer nos propres éléments HTML.
    On va pouvoir créer de nouvelles balises ayants leurs propres capacités et règles.
    Pour cela on a besoin de créer une nouvelle classe.

    Il existe deux types de customs elements :
        - les éléments personnalisés autonomes qui héritent de "HTMLElement";
        - Les éléments personalisés Intégrés qui héritent d'un élément HTML particulier (p, div, span..)
    Puis on appelle (hors de la classe) la méthode suivante :

        customElements.define()
    
    Elle prendra en premier argument, un string qui sera le nom de votre balise.
        !important les noms des balises personnalisées, doivent contenir un "-"
    En second argument, la classe de notre élément personalisé.
        * voir SuperBalise.js
    En troisième, optionnellement, si l'élément n'est pas autonome, 
    On précisera de quel élément il hérite.
        cela avec un objet "{extends:'nomDuParent'}"
        * voir SuperDiv.js

    Une fois cela fait, notre élément est fonctionnel, on peut l'appeler dans le HTML avec l'une des syntaxes suivante :
        - autonome : "<nom-balise></nom-balise>"
        - intégré : "<baliseParent is='nom-balise'></baliseParent>"

    Il est aussi possible d'ajouter des cycles de vie à nos éléments personnalisés.
    Ces cycles de vies sont des méthodes qui se déclenchent automatiquement à des moments précis :

        - "connectedCallback" se déclenche quand l'élément est ajouté à la page.
        - "disconnectedCallback" se déclenche quand l'élément est retiré de la page.
        - "adoptedCallback" se déclenche quand l'élément est déplacé d'un document à un autre.
            (principalement utile avec des iframe)
        - "attributeChangedCallback" se déclenche quand les attributs ciblé sont modifié.
            On pourra donner à ce dernier 3 arguments :
                - le premier recevra le nom de l'attribut modifié;
                - le second l'attribut avant modification;
                - le troisième, l'attribut après modification;
            Pour que cela fonctionne, on devra accompagner cette méthode, d'un getter static appelé :
            "observedAttributes" qui retournera un tableau contenant les attributs à observer
            * voir superDiv.js
*/