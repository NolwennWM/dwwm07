<?php 
require "../../../ressources/service/_pdo.php";
require "../../../ressources/service/_csrf.php";
require "../../../ressources/service/_shouldBeLogged.php";
shouldBeLogged(true, "../connexion.php");

if($_SERVER['REQUEST_METHOD']=='POST')
{
    if(empty($_POST["message"]))
        $_SESSION["flash"] = "Veuillez entrer un message";
    else
    {
        $message = cleanData($_POST["message"]);
        $pdo = connexionPDO();
        if(empty($_POST["categorie"]))
        {
            $sql = $pdo->prepare("INSERT INTO messages(message, idUser) VALUES (?, ?)");
            $sql->execute([$message, (int)$_SESSION["idUser"]]);
        }
        else
        {
            $sql = $pdo->prepare("INSERT INTO messages(message, idUser, idCat) VALUES (?, ?, ?)");
            $sql->execute([$message, (int)$_SESSION["idUser"], $_POST["categorie"]]);
        }
        $_SESSION["flash"] = "Votre message a bien été envoyé";
    }
}
header("Location: ./read.php?id=".$_SESSION["idUser"]);
exit;
?>