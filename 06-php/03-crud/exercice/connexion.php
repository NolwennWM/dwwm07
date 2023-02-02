<?php
/*
	TODO : checkbox "Voulez vous rester connecté ?"
*/
require "../../ressources/service/_shouldBeLogged.php";
shouldBeLogged(false, "../02-read.php");
$email = $pass = "";
$error = [];

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])){
    if(empty($_POST["email"])){
        $error["email"] = "Veuillez entrer un email.";
    }else{
        $email = trim($_POST["email"]);
    }
    if(empty($_POST["password"])){
        $error["pass"] = "Veuillez entrer un mot de passe.";
    }else{
        $pass = trim($_POST["password"]);
    }
    if(empty($error)){
        require "../../ressources/service/_pdo.php";
        $pdo = connexionPDO();
        $sql = $pdo->prepare("SELECT * FROM users WHERE email=?");
        $sql->execute([$email]);
        $user = $sql->fetch();
        if($user){
            if(password_verify($pass, $user["password"])){
                $_SESSION["logged"] = true; 
                $_SESSION["username"] = $user["username"];
                $_SESSION["idUser"] = $user["idUser"];
                $_SESSION["expire"] = time()+ (60*60);
                header("location: ../02-read.php");
				exit;
            }
            else{
                $error["login"] = "Email ou Mot de passe incorrecte.";
            }
        }
        else{
            $error["login"] = "Email ou Mot de passe incorrecte.";
        }
    }
}
$title = " Connexion ";
require("../../ressources/template/_header.php");
?>

<form action="" method="post">
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    <br>
    <span class="error"><?php echo $error["email"]??""; ?></span>
    <br>
    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password">
    <br>
    <span class="error"><?php echo $error["pass"]??""; ?></span>
    <br>
    <input type="submit" value="Connexion" name="login">
    <br>
    <span class="error"><?php echo $error["login"]??""; ?></span>
</form>
<?php
require("../../ressources/template/_footer.php");
?>