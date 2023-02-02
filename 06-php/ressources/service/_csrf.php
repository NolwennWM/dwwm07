<?php 
if(session_status() === PHP_SESSION_NONE)
session_start();
/**
 * Paramètre un token en session, et ajoute un input:hidden contenant le token.
 * 
 * Optionnellement, prend une durée de vie pour le jeton.
 *
 * @param integer $time
 * @return void
 */
function setCSRF(int $time = 0): void
{
    // Si le temps donnée est superieur à 0, on paramètre un timestamp d'expiration.
    if($time > 0)
    $_SESSION["tokenExpire"] = time() + 60*$time;
    /*
        random_bytes va retourner un nombre d'octet aléatoire d'une longueur donnée en paramètre.
        bin2hex va convertir des données binaires en hexadecimal.
    */
    $_SESSION["token"] = bin2hex(random_bytes(50));
    // On affiche un input de type hidden ayant pour valeur, notre jeton.
    echo "<input type='hidden' name='token' value='".$_SESSION['token']."'>";
}
/**
 * Vérifie si le jeton est toujours valide.
 *
 * @return boolean
 */
function isCSRFValid(): bool
{
    // Si il n'y a pas de date d'expiration ou si elle n'est pas dépassé.
    if(!isset($_SESSION["tokenExpire"]) || $_SESSION["tokenExpire"] > time())
    {
        // Si notre token existe et qu'il est bien égale à celui envoyé en post
        if(isset($_SESSION["token"], $_POST["token"]) && $_SESSION["token"] === $_POST["token"])
        return true;
        // Alors on retourne true, sinon on retourne false.
    }
    // On indique un code de status montrant que ce qui a été tenté n'est pas valide.
    header($_SERVER["SERVER_PROTOCOL"]. " 405 Method Not Allowed");
    return false;
}
/**
 * Assaini un string donné en paramètre et le retourne.
 *
 * @param string $data
 * @return string
 */
function cleanData(string $data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}
?>