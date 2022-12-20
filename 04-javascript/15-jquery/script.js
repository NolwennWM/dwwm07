"use strict";

/* 
    $() sert à la fois de querySelectorAll et de createElement.
    $("div") Avec un selecteur CSS, il y ira selectionner les éléments correspondant.
    $("<div>") Avec une balise, il créera l'élément correspondant.
*/
const btnSlide = $("#slide");
/* 
    .on() remplace le addEventListener.
    à noter qu'il existe des versions encore plus raccourci comme :
        ".click(function) déprécié" qui remplace ".on("click", function)"
*/
btnSlide.on("click", slideTitle);
/* 
    Je peux remplacer les deux lignes au dessus par :
    $("#slide").click(slideTitle);
*/
function slideTitle()
{
    /* 
        Certains effets classiques de CSS comme fade, hide, slide sont implémenté de base dans jquery, histoire de pouvoir les activer sans devoir passer par des ".style.display" et autres.

        Les différentes animations sont disponible avec des versions "In", "Out" ou "Toggle".
        méthodes auquels on indique en premier argument, la durée de l'animation.
        et en second, optionnellement une fonction à lancer une fois l'animation terminé.
    */
    $("h1").slideToggle(1000, function()
    {
        console.log('animation terminé!');
        /* 
            Pour accèder aux propriétés CSS d'un élément, on peut utiliser la méthode ".css()";
            Un seul argument, permet de récupérer la valeur de l'élément CSS.
            deux arguments, permet de changer la valeur :
        */
        const color = btnSlide.css("background-color") == 
            "rgb(255, 0, 0)"?"green":"red";
        btnSlide.css("background-color", color);
    })
}
$("#fade").on("click",fadeSpan)
function fadeSpan()
{
    /* 
        Si on selectionne plusieurs éléments d'un coup, 
        cela ne pose aucun problème à jquery, il appliquera l'effet sur tous les éléments selectionnés.
    */
    $("h1 span").fadeToggle();
}

// $("h1 span").hover(callbackEnter, callbackLeave); déprécié 
$("h1 span").on("mouseenter", callbackEnter)
$("h1 span").on("mouseleave", callbackLeave)

function callbackEnter()
{
    // Pour récupérer la cible d'un évènement, on utilisera $(this)
    $(this).css("font-size", "4rem");
}
function callbackLeave()
{
    $(this).css("font-size", "");
}
/* 
    $("document").ready(function(){}) déprécié et remplacé par :
    $(function(){})
    Cela permet d'attendre, la fin du chargement de la page.
    Cela était très pratique avant l'existence de l'attribut "defer"
*/
$(function()
{
    $("h1").on("dblclick", function()
    {
        $(this).hide();
    })
    $("#load").on("click", ()=>
    {
        $("ol").hide(200);
        /* 
            .ajax est la méthode qui remplace Fetch()
            .done s'active si tous s'est bien passé.
            .fail, si il y a une erreur.
            .always quoi qu'il arrive une fois terminé.

            à la différence de fetch, .done donne directement les données qu'elles soit textuelle ou json.
        */
        $.ajax("liste.json")
            .done(data=>
            {
                data.forEach(d=>
                {
                    /* 
                        En une seule ligne on crée une nouvelle balise,
                        on change son texte puis on l'ajoute à une autre balise.
                        .text équivaut à .textContent,
                        .appendTo à .append si ce n'est que le parent et l'enfant sont inversé.

                        En vanilla js :
                        const li = document.createElement("li");
                        li.textContent = d;
                        document.querySelector("ol").append(li);
                    */
                    $("<li>").text(d).appendTo($("ol"));
                })
                $("ol").show(500);
            })
            .fail(err=>console.error(err))
            .always(()=>console.log("Requête terminé !"))
    })
    $("#anime").on("click", function()
    {
        $(this).css("position", "absolute");
        /* 
            Jquery possède une méthode animate qui est différente de celle de JS.
            Celle ci prendra en argument les propriétés à modifier sous la forme d'un objet.
            Pouvant même prendre des calculs sous forme de string.
        */
        $(this).animate({
            width: "50vw",
            height: "5rem",
            top: "+=50px",
            left: "-=50px"
        }, 1000)
    })
})