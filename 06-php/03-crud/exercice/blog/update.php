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
        if(empty($_POST["categorie"]))
        {
            $sql = $pdo->prepare("UPDATE messages SET message = ?, editedAt = current_timestamp(), idCat = NULL WHERE idMessage = ?");
            $sql->execute([$m, $message["idMessage"]]);
        }
        else
        {
            $sql = $pdo->prepare("UPDATE messages SET message = ?, editedAt = current_timestamp(), idCat = ? WHERE idMessage = ?");
            $sql->execute([$m,$_POST["categorie"], $message["idMessage"]]);
        }

        $_SESSION["flash"] = "Message édité !";
        header("Location: ./read.php?id=".$_SESSION["idUser"]);
        exit;
    }
}
$sql = $pdo->query("SELECT * FROM categories ORDER BY nom ASC");
$categories = $sql->fetchAll();
$title = "Mise à jour de message";
require "../../../ressources/template/_header.php";
?>
<form action="" method="post">
    <textarea name="message" placeholder="Edition du message" cols="30" rows="10"
    ><?php echo $message["message"] ?></textarea>
    <span class="error"><?php echo $error["message"]??"" ?></span>
    <br>
    <div>
        <select name="categorie">
            <option value="">Selection de Catégorie</option>
            <?php foreach($categories as $cat): ?>
                <option value="<?php echo $cat["idCat"] ?>"
                <?php if($message["idCat"] == $cat["idCat"]) echo "selected" ?>
                >
                    <?php echo $cat["nom"] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <input type="submit" value="Mettre à jour" name="updateMessage">
</form>
<?php 
require "../../../ressources/template/_footer.php"; ?>