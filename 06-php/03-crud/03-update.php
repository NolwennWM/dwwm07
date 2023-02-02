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

require "../ressources/service/_pdo.php";
require "../ressources/service/_csrf.php";
// Je récupère les informations lié à mon utilisateur.
$pdo = connexionPDO();
$sql = $pdo->prepare("SELECT * FROM users WHERE idUser=?");
$sql->execute([(int)$_SESSION["idUser"]]);
$user = $sql->fetch();

$username = $password = $email = "";
$error = [];
$regexPass = "/^(?=.*[!?@#$%^&*+-])(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{6,}$/";

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update']))
{
    if(empty($_POST["username"]))
        $username = $user["username"];
    else
    {
        $username = cleanData($_POST["username"]);
        if(!preg_match("/^[a-zA-Z'\s-]{2,25}$/", $username))
            $error["username"]= "Votre nom d'utilisateur ne peut contenir que des lettres";
    }
    if(empty($_POST["email"]))
        $email = $user["email"];
    else
    {
        $email = cleanData($_POST["email"]);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            $error["email"]= "Votre nom d'utilisateur ne peut contenir que des lettres";
    }
    if(empty($_POST["password"]))
        $password = $user["password"];
    else
    {
        $password = cleanData($_POST["password"]);
        if(empty($_POST["passwordBis"]))
        {
            $error["passwordBis"] = "Veuillez confirmer votre mot de passe";
        }
        else if($_POST["password"] != $_POST["passwordBis"])
        {
            $error["passwordBis"] = "Veuillez saisir le même mot de passe";
        }
        if(!preg_match($regex, $password))
        {
            $error["password"] = "Veuillez saisir un mot de passe valide";
        }
        else
            $password = password_hash($password, PASSWORD_DEFAULT);
    }
    if(empty($error))
    {
        $sql = $pdo->prepare("UPDATE users SET 
            username=:us,
            email = :em,
            password = :mdp
            WHERE idUser = :id");
        $sql->execute([
            "id"=> $user["idUser"],
            "em"=> $email,
            "mdp"=> $password,
            "us"=> $username
        ]);

        // Ajout d'un Flash Message;
        $_SESSION["flash"] = "Votre Profil a bien été édité.";
        // Je redirige mon utilisateur
        header("Location: ./02-read.php");
        exit;
    }
}



$title = "CRUD - Update";
require "../ressources/template/_header.php";
?>
<h2>Mise à jour du Profil</h2>
<form action="" method="post">
    <!-- username -->
    <label for="username">Nom d'Utilisateur :</label>
    <input type="text" name="username" id="username" value="<?php echo $user['username']?>">
    <span class="error"><?php echo $error["username"]??"" ?></span>
    <br>
    <!-- Email -->
    <label for="email">Adresse Email :</label>
    <input type="email" name="email" id="email" value="<?php echo $user['email']?>">
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