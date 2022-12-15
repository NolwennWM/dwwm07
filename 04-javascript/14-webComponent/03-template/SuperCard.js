"use strict";
export default class SuperCard extends HTMLElement
{
    constructor()
    {
        super();
        this.attachShadow({mode:"open"});
        const template = document.querySelector("#superCard");
        const clone = template.content.cloneNode(true);
        this.shadowRoot.append(clone);
    }
}
customElements.define("super-card", SuperCard);