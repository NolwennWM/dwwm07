<?php 
// Je change ma gestion des messages flash.
$this->getFlash();
?>
<a href="?id=<?php echo $_GET["id"] ?>">Toutes les categories</a>
<?php
if($logged):
    // Je require mon formulaire
    require __DIR__."/_form.php";
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
                        <a href="/06-poo/message/update?id=<?php echo $row['idMessage'];?>">
                            update
                        </a>
                        <a href="/06-poo/message/delete?id=<?php echo $row['idMessage'];?>">
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
?>