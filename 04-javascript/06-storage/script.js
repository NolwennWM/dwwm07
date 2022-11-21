"use strict"
const dark = document.querySelector('#darkTheme');
// dark.addEventListener("input", changeTheme);

/* 
    Une première façon de changer un thème, est de modifier la classe du body
    Le body étant le parent de tout, beaucoup des éléments hérites de ses propriétés.
    et tous sont enfant de lui.
*/
function changeTheme()
{
    document.body.classList.toggle("dark", dark.checked);
}
dark.addEventListener("input", changeTheme2);
/* 
    Une autre façon de faire est d'utiliser des variables CSS paramétré dans l'élément racine.
    Et ensuite de venir modifier les valeurs de ces variables.
*/
function changeTheme2()
{
    if(dark.checked)
    {
        // documentElement représenter l'élément racine.
        document.documentElement.style.setProperty("--fond", "#333");
        document.documentElement.style.setProperty("--text", "antiquewhite");
        // Je sauvegarde mon thème sombre
        localStorage.setItem("theme", "dark");
    }
    else
    {
        document.documentElement.style.setProperty("--fond", "antiquewhite");
        document.documentElement.style.setProperty("--text", "#333");
        // Je retire mon thème sombre
        localStorage.removeItem("theme");
    }
}
// Je coche ma case selon si le thème est sombre ou non.
dark.checked = localStorage.getItem("theme") === "dark";
changeTheme2();

/* 
    session et local storage permettent de sauvegarder des informations dans le navigateur sous forme de string.
    session se supprimera automatiquement à la fermeture du navigateur.
    Alors que local storage ne sera jamais supprimé si ce n'est pas fait manuellement.
    ! Attention, localStorage ne fonctionne que peu ou pas si on se contente d'ouvrir notre fichier sans passer par un serveur.
    * On pourra utiliser un serveur local style live server ou xampp pour tester localStorage.
    ? Les deux utilisent les mêmes méthodes et propriétés.

    setItem permet de sauvegarder un élément.
    Il prendra un premier argument qui sera une clef (un titre) pour retrouver notre information.
    Et en second argument l'information à sauvegarder sous forme de string.
*/
sessionStorage.setItem("salutation", "Bonjour tous le monde !");
localStorage.setItem("salutation", "Coucou tous le monde !")

/* 
    getItem permet de récupérer un élément stocké au préalable en le selectionnant via sa clef.
    Si il n'y en a aucun, il retournera "null"
*/
console.log(sessionStorage.getItem("salutation"));
/* 
    removeItem permet de supprimer un élément stocké au préalable en le selectionnant via sa clef.
*/
localStorage.removeItem("salutation");
/*
    key permet de récupérer les clefs des éléments stocké via leur index.
*/
console.log(sessionStorage.key(0));
/*
    clear supprime toute les entrées.
*/
// sessionStorage.clear();