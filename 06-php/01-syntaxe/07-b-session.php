<?php 
$title = "Session page 2";
require "../ressources/template/_header.php";
/* 
    Si on a besoin de la session que sur de rare pages, 
    autant ne l'activer sur les pages où on en a besoin.
    Mais si la majorité de notre site l'utilise, 
    autant mettre le session start dans un fichier inclu partout.

    On peut avoir un message d'information si on tente de start une session déjà existante.
    Si on souhaite l'éviter, on peut utiliser une des constantes suivantes dans une condition :
        PHP_SESSION_NONE (il n'y a pas de session)
        PHP_SESSION_DISABLED (les sessions sont désactivé)
        PHP_SESSION_ACTIVE (il y a une session démarrée)
    Si je compare ces constantes à session_status(), je pourrais activer ma session que si elle n'est pas déjà démarrée.

    La durée de vie de ma session correspond à celle de mon cookie, or par défaut, le cookie meurt quand on ferme le navigateur.
    Mais on peut lui donner une durée de vie plus longue en option du session start.
*/
session_start([
    "cookie_lifetime"=>300 // la durée est en seconde.
]);
if(session_status() === PHP_SESSION_NONE)
    session_start();
/* 
    ! ATTENTION : La durée de vie des cookies n'est pas très précise.
    Le navigateur fait régulièrement un nettoyage des cookies, vérifiant à ce moment là si leur durée de vie est dépassé ou non.

    Une solution pour avoir une session plus précise, est de stocker la durée de vie en session lors de la création et si celle ci est dépassée, supprimer manuellement le cookie.

    Si ma session est morte, mon affichage pourrait me retourner des warnings, car je tente d'accèder à des clef qui n'existent pas.

    Pour éviter cela, il est de bon ton de vérifier l'existence de celles ci avant de les utiliser :
        On pourra utiliser pour cela "isset()" qui prend autant d'argument que l'on souhaite, et retourne "true" si ils existent et "false" si ils n'existent pas.
*/
if(isset($_SESSION["username"], $_SESSION["food"], $_SESSION["age"]))
echo $_SESSION["username"]["nom"]. " "
    .$_SESSION["username"]["prenom"] . " aime la "
    .$_SESSION["food"] . " et a "
    .$_SESSION["age"]. " ans <br>";
?>
<a href="./07-a-session.php">Page 1</a>
<?php require "../ressources/template/_footer.php" ?>