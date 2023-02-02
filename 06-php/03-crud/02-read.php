<?php 
session_start();
require "../ressources/service/_pdo.php";
$pdo = connexionPDO();
/* 
    Aucune entrée de l'utilisateur, 
    pas besoin de faire de requête préparé.
*/
$sql = $pdo->query("SELECT idUser, username FROM users");
/* 
    "fetch" nous retournera qu'un seul résultat,
    alors que "fetchAll" nous retournera tous les résultats.
*/
$users = $sql->fetchAll();
// TODO : Ajouter des flash messages.

$title = "CRUD - Read";
require "../ressources/template/_header.php";
?>
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
                        <!-- TODO: Afficher éditer et supprimer seulement si on est connecté avec l'utilisateur. -->
                        <a href="">Voir</a>
                        &nbsp;|&nbsp;
                        <a href="./03-update.php?id=<?= $row["idUser"] ?>">Editer</a>
                        &nbsp;|&nbsp;
                        <a href="">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>Aucun utilisateur trouvé</p>
<?php 
endif;
require "../ressources/template/_footer.php";
// "<?="  est un raccourci pour "<?php echo"
?>