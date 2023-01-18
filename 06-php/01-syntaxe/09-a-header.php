<?php 
/* 
    le header est l'entête de la requête, il sera lu par le navigateur et le serveur avant d'afficher quoi que ce soit.
    On placera le header avant l'affichage de quoi que ce soit en HTML.

    Le header peut permettre de transmettre des informations ou alors activer certaines actions.

    La fonction "header()" de PHP permet de modifier celui ci.
        Elle prendra une chaîne de caractère qui sera évalué par la fonction.
    
    "HTTP/" permet de modifier le code d'état envoyé:
        (200, 300, 404...)
*/
header("HTTP/1.1 404 Not Found");
/* 
    http_response_code permet aussi de modifier le code d'état envoyé si un argument lui est donné.
    sinon il retourne le code d'état actuel.
*/
// echo http_response_code();
if(rand(0, 100)<50)
{
    /* 
        "Location:" permet de provoquer une redirection.
        Changeant le code d'état en "302" pour indiquer la redirection.
        Le liens donné peut être relatif ou absolue.
    */
    header("Location: 09-b-header.php");
    /* 
        Il est de bon ton, d'empêcher le code qui suit une redirection de s'executer.
        C'est normalement le cas, mais par sécurité, on va le préciser avec "exit" ou "die";
    */
    exit;
    /* 
        exit ou die peuvent prendre en argument un message à afficher.
        Ils peuvent être très utiles pour débugger lorsque plusieurs actions s'enchaînent, cela permet de stopper notre code et vérifier ce qui s'y passe.
    */
}
$title = "Header page 1";
require "../ressources/template/_header.php";
?>
<h1>Vous avez de la chance de me voir</h1>
<?php 
require "../ressources/template/_footer.php"; ?>