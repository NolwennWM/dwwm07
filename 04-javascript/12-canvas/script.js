"use strict";
/* 
    La balise canvas ne sert à rien sans JS.
    Mais elle avec JS on peut l'utiliser pour faire des animations,
    des jeux, des outils interactif ou autre.
*/
const canvas = document.querySelector('canvas');
/* 
    Pour intéragire avec le canvas, on a besoin d'un contexte.
    pour cela on va utiliser la méthode "getContext()" en lui donnant 
    en argument le context voulu. 
    Le plus classique et celui qu'on va voir ici est le context "2d".

    Mais il est possible de faire de la "3d" avec "webgl" par exemple.
*/
const ctx = canvas.getContext("2d");
// ------------ Optionnelle ---------------------
// Redimensiont du canvas :
function resize()
{
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
}
resize();
window.addEventListener("resize", resize);
// ------------------ CANVAS ---------------------
// la plupart des méthodes du canvas, se lance sur le contexte.

/* 
    fillRect et strokeRect permettent de dessiner un rectangle avec 
    les paramètres suivants :
        position x, position y, largeur, hauteur.
    Le premier est un rectangle rempli, le second, donne juste les contours.
 */
ctx.fillRect(50, 50, 150, 25);
ctx.strokeRect(100, 150, 25, 150);
/* 
    fillStyle et strokeStyle sont des propriétés qui permettent de changer la couleur de remplissage ou de contour.
    Elles prennent un string contenant une couleur. 
        (rgb, hexadecimal, mot clef)

    Le changement ne s'applique qu'aux dessins qui suivent et non aux précédents.
*/
ctx.fillStyle = "rgba(156, 78, 94, 0.5)";
ctx.strokeStyle = "red";
ctx.fillRect(25, 59, 78, 95);
ctx.strokeRect(150, 150, 54,245);

// Pour des formes plus complexes, on va devoir faire appelle à cela :
// On commence un chemin avec "beginPath"
ctx.beginPath()
// On déplace notre "curseur" à une position de départ.
ctx.moveTo(345, 70);
// Je trace un chemin vers une nouvelle position.
ctx.lineTo(450, 200);
// Je dessine les traits des chemins tracé précédement.
ctx.stroke();

ctx.beginPath();
ctx.moveTo(400, 300);
ctx.lineTo(500, 40);
ctx.lineTo(160, 543);
// closePath permet de refermer une forme dessiner par des lignes.
ctx.closePath();
ctx.strokeStyle = "green";
ctx.fillStyle = "yellow";
// lineWidth est une propriété prenant un nombre changeant la largeur du trait.
ctx.lineWidth = 8;
ctx.stroke();
// fill permet de remplir la forme précédement dessiné.
ctx.fill();

//-------------- cercle ----------------
ctx.beginPath();
/* 
    arc permet de dessiner des cercles ou arc de cercle, avec les propriétés suivantes :
    position x, position y, taille du rayon, 
    position de départ du radiant (0 pour un cercle complet)
    position de fin du radiant (Math.PI*2 pour un cercle complet)
*/
ctx.arc(89, 90, 42, 0, 2*Math.PI);
ctx.stroke();
// clearRect permet d'effacer ce qui se trouve dans la zone rectangulaire selectionner.
ctx.clearRect(50, 60, 70, 80);
// ctx.clearRect(0, 0, canvas.width, canvas.height);
/* 
    Mini Exercice :
    déclarer 5 variables représentant les éléments suivants :
    position X, position Y, vitesse Vertical, vitesse Horizontale, rayon.
    Faire une fonction qui dessine un cercle de rayon et de position défini par les variables précédentes.

    Ajouter des conditions:
        si x + le rayon est plus grand que la largeur du canvas, ou si x moins le rayon, plus petit que 0.
            Alors inverser la vitesse horizontale.
        De même pour les coordonnées verticale.
    Enfin ajouter la vitesse vertical à la position Y et la vitesse horizontale à la position X
*/
let x = 100, y=100, vv= 5, vh = 5, r= 80;
/* 
    "getImageData" permet de récupérer un objet contenant les données 
    des pixels dans le rectangle donné en argument.
    position x, position y, largeur, hauteur.

    Inversement "putImageData" permet en prenant l'objet précédement créé 
    en argument de redessiner le rectangle sauvegardé.
*/
let snapshot = ctx.getImageData(0,0, canvas.width, canvas.height)
function cercle()
{
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.putImageData(snapshot, 0, 0)
    ctx.beginPath()
    ctx.arc(x, y, r, 0, Math.PI*2);
    ctx.fill();
    ctx.stroke();
    // ctx.drawImage(img, x,y, r, r)
    if(x+r > canvas.width || x-r <0)
        vh = -vh;
    if(y+r > canvas.height || y-r <0)
        vv = -vv;
    x += vh;
    y += vv;
    // requestAnimationFrame va appeler la fonction donné en argument au rythme optimal pour une animation.
    requestAnimationFrame(cercle);
}
cercle()
// ------------------------ images ---------------------
// Je crée un nouvel objet image
let img = new Image();
// je lui donne une source.
img.src = "../../ressources/images/favicon.ico";
// On attend le chargement de l'image avant de la dessiner.
img.onload = ()=>{
    ctx.drawImage(img, 50,250, 100, 100)
    snapshot = ctx.getImageData(0,0, canvas.width, canvas.height)
}
// les paramètres sont l'image, la position x, la position y, la largeur et la hauteur.
// img.onload = cercle;

// ---------------------- texte ------------------------
ctx.lineWidth = 1;
// font permet de changer la taille et la police d'écriture.
ctx.font = "82px serif";
// strokeText et fillText permettent d'écrire du texte évidé ou rempli.
ctx.strokeText("Coucou", 500, 500);
ctx.fillText("Coucou", 500, 300);
// textAlign pour changer l'alignement du texte.
ctx.textAlign = "center";
ctx.fillStyle = "purple";
// On peut ajouter optionnellement un dernier paramètre pour limiter sa largeur.
ctx.fillText("Salut tout le monde !", 500, 100, 200);
// avec le texte align center, son x à 500 se retrouve au milieu du texte et non au début.

// --------------- forme des traits ------------------
ctx.lineWidth = 16;

ctx.beginPath();
ctx.lineCap = "round";
ctx.moveTo(700, 40);
ctx.lineTo(700, 400);
ctx.stroke();

ctx.beginPath();
ctx.lineCap = "square";
ctx.moveTo(750, 40);
ctx.lineTo(750, 400);
ctx.stroke();

ctx.beginPath();
ctx.lineCap = "butt";
ctx.moveTo(800, 40);
ctx.lineTo(800, 400);
ctx.stroke();
snapshot = ctx.getImageData(0,0, canvas.width, canvas.height)