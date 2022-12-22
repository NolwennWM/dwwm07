"use strict";

/* 
    L'interface est à mi chemin entre les types et les classes abstraites.
    à la différence de la classe abstraite, l'interface ne contiendra que des déclarations, mais aucune définition.
    à la différence des types, l'interface sera réservé aux objet et pourra être redéfini (fusionné)
*/
type Chaussette = string;
// Erreur, je ne peux pas redéfinir mon type.
// type Chaussette = number;

interface Point
{
    x: number;
    y: number;
    get(): number;
}
interface Point
{
    z: number;
}
/* 
    VScode utilise de nombreuses interfaces pour indiquer à l'utilisateur ce que contiennent tel ou tel variable de JS.
    par exemple, si on prend "document" qu'on a souvent utilisé, 
    Si on fait un "ctrl+click" sur document, on va finir par trouver l'interface Document.

    On peut donc fusionner cette interface avec une que l'on aura créé  nous même.
*/
interface Document
{
    chaussette: number;
}
/* 
    pour vsCode, document contient bien une propriété "chaussette"
    bien qu'en vrai, elle sera "undefined"
*/
document.chaussette

class Point3D implements Point
{
    x = 0;
    y = 0;
    z = 0;
    get()
    {
        return this.x;
    }
}