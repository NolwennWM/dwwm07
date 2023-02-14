<?php 
$title = "MVC - Mise à jour de message";
require __DIR__."/../../../ressources/template/_header.php";
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
require __DIR__."/../../../ressources/template/_footer.php"; ?>