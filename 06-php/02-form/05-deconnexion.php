<?php 
session_start();
// Si on est déconnecté, alors on  redirige l'utilisateur ailleurs.
if(!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true)
{
    header("Location: /");
    exit;
}
/* 
    Selon si on stock d'autres informations que la connexion en session ou pas.
    On détruira la session ou juste les propriétés liées à la connexion.
*/
unset($_SESSION);
session_destroy();
setcookie("PHPSESSID", "", time()-3600);

header("Location: ./04-connexion.php");
exit;
?>