<?php 
/* 
    Qu'est ce que le CRUD ?
    Le CRUD est un accronyme signifiant :
        Create Read Update Delete
    Cela représente ce que la majorité des tables d'une BDD a besoin.
        Create : Créer une nouvelle ligne dans la table.
        Read : Lire et afficher les données de la table.
        Update : Mettre à jour les données de la table.
        Delete : Supprimer les données de la table.
    
    Généralement, pour chaque table que l'on crée, on aura besoin d'un "CRUD" complet pour l'accompagner.
    Bien sûr il y a des exceptions.
    Par exemple "Twitter" a longtemps empêché l'édition des messages.

*/
require "../ressources/service/_shouldBeLogged.php";
# On redirige l'utilisateur si il est déjà connecté.
shouldBeLogged(false, "/");

$title = "CRUD - Create";
require "../ressources/template/_header.php";
?>
<h2>Inscription</h2>
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
    <input type="submit" value="Inscription" name="inscription">
</form>
<!-- 
    Pour des raisons de simplicité du cours, on n'a pas ajouté de sécurité sur ce formulaire, 
    mais pensez à en ajouter sur vos projets. 
-->
<?php 
require "../ressources/template/_footer.php"; 
?>