<?php 
use Classes\AbstractController;
use Model\UserModel;

require __DIR__."/../../ressources/service/_shouldBeLogged.php";

class AuthController extends AbstractController
{
    use Classes\Trait\Debug;
    private UserModel $db;

    function __construct()
    {
        $this->db = new UserModel();
    }
    function login()
    {
        // Je change le lien de ma redirection
        shouldBeLogged(false, "/06-poo");
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
                // Je change ma fonction en méthode
                $user = $this->db->getOneUserByEmail($email);
                if($user){
                    if(password_verify($pass, $user["password"])){
                        $_SESSION["logged"] = true; 
                        $_SESSION["username"] = $user["username"];
                        $_SESSION["idUser"] = $user["idUser"];
                        $_SESSION["expire"] = time()+ (60*60);
                        // Je change la redirection
                        header("location: /06-poo");
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
        $this->render("auth/connexion.php", [
            "title"=> "POO - Connexion",
            "error"=>$error
        ]);
    }
    function logout()
    {
        // Je change la redirection
        shouldBeLogged(true, "/06-poo/connexion");
        
        unset($_SESSION);
        session_destroy();
        setcookie("PHPSESSID","", time()-3600);
        // Je change la redirection
        header("location: /06-poo/connexion");
        exit;
    }
}
?>