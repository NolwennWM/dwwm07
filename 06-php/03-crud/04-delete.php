<?php 
require "../ressources/service/_shouldBeLogged.php";
shouldBeLogged(true,"./exercice/connexion.php");

// Si on n'a pas d'id ou que ce n'est pas celui de l'utilisateur connecté.
if(empty($_GET["id"]) || $_SESSION["idUser"]!= $_GET["id"])
{
    header("Location: ./02-read.php");
    die();
}
require "../ressources/service/_pdo.php";

// On supprime l'utilisateur.
$pdo = connexionPDO();
$sql = $pdo->prepare("DELETE FROM users WHERE idUser = ?");
$sql->execute([(int)$_GET["id"]]);

// On déconnecte l'utilisateur
unset($_SESSION);
session_destroy();
setcookie("PHPSESSID", "", time() - 3600);

// On le redirige après quelques secondes.
header("refresh: 5; url = /");

$title = "CRUD - Delete";
require("../ressources/template/_header.php");

echo $sql->rowCount(), " ligne(s) effacée(s)";
?>
<p>
    Vous avez bien <strong>supprimé</strong> votre compte. <br>
    Vous allez être redirigé d'ici peu.
</p>
<?php 
require "../ressources/template/_footer.php";
?>