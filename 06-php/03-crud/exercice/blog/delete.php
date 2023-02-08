<?php 
require "../../../ressources/service/_shouldBeLogged.php";
shouldBeLogged(true, "../connexion.php");
if(empty($_GET["id"]))
{
    header("Location: ../read.php".$_SESSION["idUser"]);
    exit;
}
require "../../../ressources/service/_pdo.php";
$pdo = connexionPDO();
$sql = $pdo->prepare("SELECT * FROM messages WHERE idMessage = ?");
$sql->execute([$_GET["id"]]);
$message = $sql->fetch();
// J'ai récupéré le message puis vérifié son propriétaire
if(!$message || $message["idUser"] != $_SESSION["idUser"])
{
    header("Location: ./read.php?id=".$_SESSION["idUser"]);
    exit;
}
$sql = $pdo->prepare("DELETE FROM messages WHERE idMessage = ?");
$sql->execute([(int)$_GET["id"]]);

$_SESSION["flash"] = "Votre message a bien été supprimé";
header("Location: ./read.php?id=".$_SESSION["idUser"]);
exit;
?>