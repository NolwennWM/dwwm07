<?php 
if(session_status() === PHP_SESSION_NONE)
    session_start();
/**
 * Vérifie si l'utilisateur est connecté ou non, et le redirge dans le cas contraire.
 * 
 * Si $logged est à true, vérifie si l'utilisateur est connecté
 * Si $logged est à false, vérifie si l'utilisateur est déconnecté
 *
 * @param boolean $logged
 * @param string $redirect
 * @return void
 */
function shouldBeLogged(bool $logged = true, string $redirect = "/"): void 
{
    if($logged)
    {
        // Si la session à un temps limité et qu'il est dépassé.
        if(isset($_SESSION["expire"]) && time()> $_SESSION["expire"])
        {
            // Je détruit la session.
            unset($_SESSION);
            session_destroy();
            setcookie("PHPSESSID", "",time()-3600);
        }
        // Si l'utilisateur n'est pas connecté, je le redirige.
        if(!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true)
        {
            header("Location: ". $redirect);
            exit;
        }
    }
    else
    {
        // Si l'utilisateur est connecté, alors je le redirige.
        if(isset($_SESSION["logged"]) && $_SESSION["logged"] === true)
        {
            header("Location: ". $redirect);
            exit;
        }
    }
}
?>