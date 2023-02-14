<?php 
require __DIR__."/../../ressources/service/_shouldBeLogged.php";
require __DIR__."/../Model/userModel.php";

function login()
{
    // Je change le lien de ma redirection
    shouldBeLogged(false, "/05-mvc");
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
            // Je retire la requête à la bdd pour utiliser mon model
            $user = getOneUserByEmail($email);
            if($user){
                if(password_verify($pass, $user["password"])){
                    // $_SESSION["user"]=[];
                    // $_SESSION["user"]["logged"]= true;
                    $_SESSION["logged"] = true; 
                    $_SESSION["username"] = $user["username"];
                    $_SESSION["idUser"] = $user["idUser"];
                    $_SESSION["expire"] = time()+ (60*60);
                    // Je change la redirection
                    header("location: /05-mvc");
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
    // J'inclu ma vue.
    require __DIR__."/../View/auth/connexion.php";
}
function logout()
{
    // Je change la redirection
    shouldBeLogged(true, "/05-mvc/connexion");
    // unset($_SESSION["user"]);
    unset($_SESSION);
    session_destroy();
    setcookie("PHPSESSID","", time()-3600);
    // Je change la redirection
    header("location: /05-mvc/connexion");
    exit;
}
?>