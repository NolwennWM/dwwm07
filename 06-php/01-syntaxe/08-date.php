<?php 
$title = "Les Dates";
require ("../ressources/template/_header.php");

// Si on souhaite récupérer le timestamp, on utilisera la fonction time
echo time(), "<br>";
/* 
    Pour afficher une date en PHP, on utilisera la fonction date();
    Celle ci peut prendre jusqu'à deux arguments.

    Le premier est un string sur lequel on reviendra juste après. 
    Le second, optionnel, est un timestamp.

    Si on ne donne pas le second argument, le timestamp utilisé sera celui de la date actuelle.
*/
echo date("");
/* 
    Si on laisse le string vide, rien ne s'affiche.
    Ce string représente, les informations qui doivent être rendu.

    Ces informations sont représenté par des lettres ayant un sens particulier.
    Si des caractères qui n'ont aucun sens pour la fonction sont utilisé, ils seront simplement rendu comme tel.
*/
/* 
    d = numéro du jour du mois avec le 0;
    m = numéro du mois avec le 0;
    Y = année sur 4 chiffres
*/
echo date("d/m/Y"), "<br>";
/* 
    j = numéro du jour du mois sans le 0;
    n = numéro du mois sans le 0;
    y = année sur 2 chiffres
*/
echo date("j/n/y"), "<br>";
/* 
    D = nom du jour sur 3 lettres;
    l = nom du jour complet;
    M = nom du mois sur 3 lettres;
    F = nom du mois complet;
*/
echo date("D = l / M = F"), "<br>";
/* 
    N = numéro du jour dans la semaine avec dimanche = 7;
    w = numéro du jour dans la semaine avec dimanche = 0;
*/
echo date("D = N = w"), "<br>";
/* 
    z = numéro du jour dans l'année avec 1er janvier = 0;
    W = numéro de la semaine dans l'année;
*/
echo date("z -> W"), "<br>";
/* 
    t = nombre de jour dans le mois
*/
echo date("F -> t"), "<br>";
/* 
    L = boolean indiquant si l'année est bissextile
*/
echo date("Y -> L"), "<br>";
/* 
    h = heure en format 12  avec 0
    i = minute avec 0
    s = secondes avec 0
    a = "am" ou "pm"
*/
echo date("h:i:s a"), "<br>";
/* 
    g = heure en format 12 sans le 0
    A = "AM" ou "PM"
*/
echo date("g:i:s A"), "<br>";
/* 
    H = heure en format 24 avec 0
    v = millisecondes avec 0
    (v ne fonctionne pas sur tous les serveurs.)
*/
echo date("H:i:s:v"), "<br>";
/* 
    G = heure en format 24 sans 0
*/
echo date("G:i"), "<br>";
/* 
    O = Différence d'heure avec GMT sans ":"
    P = Différence d'heure avec GMT avec ":"
*/
echo date("O = P"), "<br>";
/* 
    I = boolean true si heure d'été.
    Z = Différence d'heure avec GMT en seconde.
*/
echo date("I -> Z"), "<br>";
// Date complète au format ISO 8601
echo date("c"), "<br>";
// Date complète au format RFC 2822
echo date("r"), "<br>";
?>
<?php 
require ("../ressources/template/_footer.php"); ?>