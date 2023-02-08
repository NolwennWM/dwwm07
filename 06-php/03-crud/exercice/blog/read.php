<?php 
session_start();
$title = "Liste des messages";
require "../../../ressources/template/_header.php";
// require "../../../ressources/service/_shouldBeLogged.php";
require "../../../ressources/service/_pdo.php";
$messages = $flash = "";
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $pdo = connexionPDO();
    $sql = $pdo->prepare("SELECT m.*, c.nom as categorie FROM messages m LEFT JOIN categories c ON c.idCat = m.idCat WHERE idUser = :id");
    $sql->bindParam(':id', $id);
    $sql->execute();
    $messages = $sql->fetchAll();
}
else
{
    header("Location: ../02-read.php");
    exit;
}
$logged = isset($_SESSION["idUser"]) && $_SESSION["idUser"] == $_GET["id"];
// $sql = $pdo->query("SELECT idMessage, message FROM messages");
if(isset($_SESSION["flash"]))
{
    $flash = $_SESSION["flash"];
    unset($_SESSION["flash"]);
}
if($flash):
?>
<div class="flash">
    <?php echo $flash;?>
</div>
<?php
endif;
if($logged):
?>
<form action="./create.php" method="post">
    <div class="form-group">
        <label for="message">Message :</label>
        <textarea name="message" id="message" cols="30" rows="10"></textarea>
    </div>
    <button type="submit">Enregistrer</button>
</form>
<?php
endif;
if($messages):
?>
<table>
    <thead>
        <tr>
            <th>id</th>
            <th>message</th>
            <th>categorie</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($messages as $row): ?>
            <tr>
                <td><?php echo $row['idMessage'];?></td>
                <td><?php echo $row['message'];?></td>
                <td>
                    <a href="?id=<?php echo $row["idUser"] ?>&cat=<?php echo $row["idCat"] ?>">
                        <?php echo $row['categorie'];?>
                    </a>
                </td>
                <td>
                    <?php if($logged): ?>
                        <a href="update.php?id=<?php echo $row['idMessage'];?>">
                            update
                        </a>
                        <a href="delete.php?id=<?php echo $row['idMessage'];?>">
                            delete
                        </a>
                        <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
    <p>Aucun message trouvé</p>
<?php 
endif;
require "../../../ressources/template/_footer.php";
?>