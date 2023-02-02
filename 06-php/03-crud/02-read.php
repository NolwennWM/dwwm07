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
// Ajout de flash message:
if(isset($_SESSION["flash"]))
{
    $flash = $_SESSION["flash"];
    unset($_SESSION["flash"]);
}

$title = "CRUD - Read";
require "../ressources/template/_header.php";
if(isset($flash)):
?>
<div class="flash">
    <?php echo $flash ?>
</div>
<?php endif; ?>
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
                        <a href="">Voir</a>
                        <!-- On affiche les boutons éditer et supprimer, uniquement si ils correspondent à l'utilisateur connecté -->
                        <?php if(isset($_SESSION["idUser"]) && $_SESSION["idUser"] == $row["idUser"]): ?>
                            &nbsp;|&nbsp;
                            <a href="./03-update.php?id=<?= $row["idUser"] ?>">Editer</a>
                            &nbsp;|&nbsp;
                            <a href="./04-delete.php?id=<?= $row["idUser"] ?>">Supprimer</a>
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
require "../ressources/template/_footer.php";
// "<?="  est un raccourci pour "<?php echo"
?>