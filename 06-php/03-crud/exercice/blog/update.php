<?php 
// L'utilisateur est il connecté
require "../../../ressources/service/_shouldBeLogged.php";
shouldBeLogged(true, "../connexion.php");
// Sait-on quel message mettre à jour.
if(empty($_GET["id"]))
{
    header("Location: ./read.php?id=".$_SESSION["idUser"]);
    exit;
}
// L'utilisateur connecté, est il le propriétaire du message?
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
require "../../../ressources/service/_csrf.php";

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['updateMessage']))
{
    if(empty($_POST["message"]))
    {
        $error["message"] = "Veuillez entrer un message";
    }
    else
    {
        $m = cleanData($_POST["message"]);
    }
    if(empty($error))
    {
        $sql = $pdo->prepare("UPDATE messages SET message = ?, editedAt = current_timestamp() WHERE idMessage = ?");
        $sql->execute([$m, $message["idMessage"]]);

        $_SESSION["flash"] = "Message édité !";
        header("Location: ./read.php?id=".$_SESSION["idUser"]);
        exit;
    }
}

$title = "Mise à jour de message";
require "../../../ressources/template/_header.php";
?>
<form action="" method="post">
    <textarea name="message" placeholder="Edition du message" cols="30" rows="10"
    ><?php echo $message["message"] ?></textarea>
    <span class="error"><?php echo $error["message"]??"" ?></span>
    <br>
    <input type="submit" value="Mettre à jour" name="updateMessage">
</form>
<?php 
require "../../../ressources/template/_footer.php"; ?>