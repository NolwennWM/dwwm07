<?php 
require "../ressources/service/_shouldBeLogged.php";
shouldBeLogged(true, "./exercice/connexion.php");

/* 
    L'utilisateur peut venir ici que si il est connecté,
    Mais actuellement n'importe quel utilisateur peut modifier n'importe quel profil.
    On va donc interdire l'accès aux utilisateurs qui tentent d'aller sur un autre profil que le leur.
*/
if(empty($_GET["id"]) || $_SESSION["idUser"] != $_GET["id"])
{
    header("Location: ./02-read.php");
    exit;
}

$title = "CRUD - Update";
require "../ressources/template/_header.php";
?>
<h2>Mise à jour du Profil</h2>
<form action="" method="post">
    <!-- username -->
    <label for="username">Nom d'Utilisateur :</label>
    <input type="text" name="username" id="username">
    <span class="error"><?php echo $error["username"]??"" ?></span>
    <br>
    <!-- Email -->
    <label for="email">Adresse Email :</label>
    <input type="email" name="email" id="email">
    <span class="error"><?php echo $error["email"]??"" ?></span>
    <br>
    <!-- Password -->
    <label for="password">Mot de Passe :</label>
    <input type="password" name="password" id="password">
    <span class="error"><?php echo $error["password"]??"" ?></span>
    <br>
    <!-- password verify -->
    <label for="passwordBis">Confirmation du mot de passe :</label>
    <input type="password" name="passwordBis" id="passwordBis">
    <span class="error"><?php echo $error["passwordBis"]??"" ?></span>
    <br>
    <input type="submit" value="Mettre à jour" name="update">
</form>
<?php 
require "../ressources/template/_footer.php";
?>