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
require "../ressources/service/_csrf.php";
require "../ressources/service/_shouldBeLogged.php";
# On redirige l'utilisateur si il est déjà connecté.
shouldBeLogged(false, "/");

$username = $email = $password = "";
$error = [];
$regexPass = "/^(?=.*[!?@#$%^&*+-])(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{6,}$/";

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['inscription']))
{
    // Je me connecte à la BDD
    require "../ressources/service/_pdo.php";
    $pdo = connexionPDO();
    // Traitement username :
    if(empty($_POST["username"]))
        $error["username"] = "Veuillez saisir un nom d'utilisateur";
    else
    {
        $username = cleanData($_POST["username"]);
        if(!preg_match("/^[a-zA-Z'\s-]{2,25}$/", $username))
            $error["username"] = "Veuillez saisir un nom d'utilisateur valide";
    }
    // Traitement email :
    if(empty($_POST["email"]))
        $error["email"] = "Veuillez saisir un email";
    else
    {
        $email = cleanData($_POST["email"]);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            $error["email"] = "Veuillez saisir un email valide";
        /* 
            Il existe deux types de requêtes, 
            les basiques utilisant la méthode "query()"
            Et les préparés utilisant la méthode "prepare()"

            Si vous écrivez entièrement votre requête, contentez vous d'un query, ce sera plus rapide.
            Si il y a la moindre entré venant de l'utilisateur, il faudra utiliser une requête préparé.

            La requête préparé va analyser le string sans les entrés de l'utilisateur, et savoir que ce qui sera ajouté par la suite, n'est absolument pas du SQL.
        */
        $sql = $pdo->prepare("SELECT * FROM users WHERE email = :em");
        /* 
            ":em" est un placeholder pour indiquer qu'il faudra le remplacer par une valeur donnée à la suite.
            le ":" est obligatoire mais le nom est à votre choix.

            Ensuite j'appelle sur ma requête préparé la méthode execute, en lui donnant un tableau associatif dont les clefs correspondent aux placeholders (sans les ":")
        */
        $sql->execute(["em"=>$email]);
        /* 
            Ma requête a été executé, mais je n'ai pas encore récupéré les données.
            Pour cela je vais utiliser la méthode "fetch"
        */
        $resultat = $sql->fetch();
        if($resultat)
            $error["email"] = "Cet email est déjà enregistré";
    }
    // Traitement password :
    if(empty($_POST["password"]))
        $error["password"] = "Veuillez saisir un mot de passe";
    else
    {
        $password = cleanData($_POST["password"]);
        if(!preg_match($regexPass, $password))
            $error["password"] = "Veuillez saisir un mot de passe valide";
        else
            $password = password_hash($password, PASSWORD_DEFAULT);
    }
    // Traitement confirmation password :
    if(empty($_POST["passwordBis"]))
        $error["passwordBis"] = "Veuillez saisir à nouveau votre mot de passe";
    else
    {
        if($_POST["password"] != $_POST["passwordBis"])
            $error["passwordBis"] = "Veuillez saisir le même mot de passe";
    }
    // envoi des données:
    if(empty($error))
    {
        /* 
            Les placeholders des requêtes préparés peuvent aussi être des "?"
        */
        $sql = $pdo->prepare("INSERT INTO users(username, email, password) VALUES(?, ?, ?)");
        /* 
            Si on préféré les "?" aux ":" on ne donnera pas un tableau associatif mais un tableau classique.
            Avec l'obligation de respecter l'ordre dans lequel on a donné les "?"
        */
        $sql->execute([$username, $email, $password]);
        header("Location: ./exercice/connexion.php");
        exit;
    }
}

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