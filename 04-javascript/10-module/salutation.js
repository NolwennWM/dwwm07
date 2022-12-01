"use strict";
/**
 * Affiche un message de salutation dans la console.
 * @return {void}
 */
export default function bonjour()
{
    console.log("Bonjour tout le monde !");
}
/**
 * Affiche un message de salutation dans la console.
 * @return {void}
 */
export function salut()
{
    console.log("Salut la population !");
}
/**
 * Affiche un message de salutation dans la console.
 * @param {string} name nom de la personne qui parle.
 */
export function coucou(name)
{
    parler(name, "Coucou tout le monde !");
}
/**
 * Affiche un message dans la console précédé du nom de la personne.
 * @param {string} nom Nom de la personne qui parle
 * @param {string} text Message de la personne
 */
function parler(nom, text)
{
    console.log(`${nom} : ${text}`);
}
console.log("Salutation importé !");
