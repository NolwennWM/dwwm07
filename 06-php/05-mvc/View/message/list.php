<?php 
$title = "MVC - Liste des messages";
require "../../../ressources/template/_header.php";

if($flash):
?>
<div class="flash">
    <?php echo $flash;?>
</div>
<?php
endif;
?>
<a href="?id=<?php echo $_GET["id"] ?>">Toutes les categories</a>
<?php
if($logged):
?>
<!-- Je change l'action de mon formulaire. -->
<form action="/05-mvc/message/create" method="post">
    <div>
        <label for="message">Message :</label>
        <textarea name="message" id="message" cols="30" rows="10"></textarea>
    </div>
    <div>
        <select name="categorie">
            <option value="">Selection de Catégorie</option>
            <?php foreach($categories as $cat): ?>
                <option value="<?php echo $cat["idCat"] ?>">
                    <?php echo $cat["nom"] ?>
                </option>
            <?php endforeach; ?>
        </select>
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
                        <!-- Je change les liens vers mes pages d'édition et de suppression -->
                        <a href="/05-mvc/message/update?id=<?php echo $row['idMessage'];?>">
                            update
                        </a>
                        <a href="/O5-mvc/message/delete?id=<?php echo $row['idMessage'];?>">
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