<?php 
// flash message :
$this->getFlash(); ?>
<!-- Liste des utilisateurs : -->
<h3>Liste des utilisateurs</h3>
<?php if($users): ?>
    <table>
        <thead>
            <th>id</th>
            <th>username</th>
            <th>action</th>
        </thead>
        <tbody>
            <?php foreach($users as $row): ?>
                <tr>
                    <td><?php echo $row["idUser"] ?></td>
                    <td><?php echo $row["username"] ?></td>
                    <td>
                        <a href="/06-poo/message/list?id=<?php echo $row["idUser"] ?>">Voir</a>
                        <!-- On affiche les boutons éditer et supprimer, uniquement si ils correspondent à l'utilisateur connecté -->
                        <?php if(isset($_SESSION["idUser"]) && $_SESSION["idUser"] == $row["idUser"]): ?>
                            &nbsp;|&nbsp;
                            <a href="/06-poo/user/update?id=<?= $row["idUser"] ?>">Editer</a>
                            &nbsp;|&nbsp;
                            <a href="/06-poo/user/delete?id=<?= $row["idUser"] ?>">Supprimer</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aucun utilisateur trouvé</p>
<?php 
endif; 
?>