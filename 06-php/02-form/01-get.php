<?php
$title = "Formulaire en GET";
require "../ressources/template/_header.php";

/* 
    On retrouvera les informations envoyé par un formulaire en méthode "GET" dans la variable 
    super global "$_GET".
    Elle s'utilise tel un tableau associatif, dont chaque entrée correspond à l'attribut "name" de notre
    input.
*/
var_dump($_GET);
/* 
    Il est important de vérifier l'existence de notre donnée dans la variable $_GET.
    Si on arrive ici sans avoir validé le formulaire, des erreurs apparaîtrons si on tente d'utiliser
    les données du formulaire.
*/
if(isset($_GET["username"]))
{
    $username = $_GET["username"];
}
?>

<form action="" method="get">
    <input type="text" placeholder="Entrez un nom" name="username">
    <input type="submit" value="Envoyer">
</form>

<?php

require "../ressources/template/_footer.php";
?>