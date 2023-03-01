"use strict";
let template, tbody, rowTemplate;

/**
 * Va chercher la liste des données utilisateur.
 */
export default async function()
{
    const response = await fetch("http://api.localhost/user");
    if(!response.ok)return;

    tbody = document.querySelector("tbody");
    template = document.querySelector("#tableRow");
    rowTemplate = template.content;

    const data = await response.json();
    data.data.forEach(fillTable);
    // console.log(data);
}
/**
 * rempli le tableau d'utilisateur
 * @param {Object} u User
 */
function fillTable(u)
{
    const row = rowTemplate.cloneNode(true);
    row.querySelector(".id").textContent = u.idUser;
    row.querySelector(".username").textContent = u.username;
    setLinksId(row, u.idUser);
    tbody.append(row);
}
/**
 * Ajoute l'id aux href des liens qui en ont besoin.
 * Cache les liens qui ne devraient pas être présent.
 * @param {HTMLElement} parent 
 * @param {string} id 
 */
function setLinksId(parent, id)
{
    const links = parent.querySelectorAll("a");
    links.forEach(a=>{
        if(a.classList.contains("limited") && id != sessionStorage.getItem("idUser"))
        {
            a.style.display = "none";
        }
        a.href += id;
    })
}