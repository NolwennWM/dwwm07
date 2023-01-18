<?php 
/* 
    "refresh:" permet de raffraichir la page au bout de quelques secondes.
    si on y ajoute "url=" séparé par un ";", nous nous retrouvons avec une direction au bout de quelques secondes.
*/
header("refresh: 5; url=09-a-header.php");
/* 
    En second paramètre de header, on peut indiquer un boolean par défaut à true.
    Boolean qui indique si le header donné doit remplacer ou s'ajouter au header actuel.

    Et en troisième on peut indiquer un code de status seulement si le premier est bien rempli.
*/

$title = "Header page 2";
require "../ressources/template/_header.php";
?>
<h1>Bienvenue sur la page 2... temporairement</h1>
<?php 
require "../ressources/template/_footer.php"; ?>