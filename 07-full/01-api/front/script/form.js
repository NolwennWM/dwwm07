"use strict";

import router from "./router.js";

let method;
/**
 * Selectionne le formulaire et lui ajoute son évènement.
 * @param {string} option 
 */
export default function (option="GET")
{
    method = option;
    const form = document.querySelector("form");
    form.addEventListener("submit", sendForm);
    setForm();
}
/**
 * Traite le formulaire et l'envoi à l'api
 * @param {SubmitEvent} e 
 */
async function sendForm(e)
{
    e.preventDefault();
    const formData = new FormData(this);
    formData.append(this.name, true);

    const json = JSON.stringify(Object.fromEntries(formData));
    const response = await fetch(this.action+window.location.search,{
        method: method,
        body: json,
        credentials: "include"
    });
    const data = await response.json();
    const main = document.querySelector("main");
    if(response.ok)
    {
        main.textContent = data.message;
        if(sessionStorage.getItem("logged"))
        {
            const h2 = document.querySelector("header h2");
            h2.textContent = data.data.username;
        }
        setTimeout(router, 3000, "/");
    }
    else if(data.data.violations.length>0)
    {
        for(const error of data.data.violations)
        {
            const span = document.querySelector(`[name=${error.propertyPath}]+span.erreur`);
            span.textContent = error.message;
        }
    }
    else
    {
        main.textContent = data.message??"erreur inconnu";
    }
}
/**
 * paramètre le formulaire.
 */
function setForm()
{
    if(method === "POST")return;
    const inputs = document.querySelectorAll("input");
    inputs.forEach(inp=>inp.required = false);
}