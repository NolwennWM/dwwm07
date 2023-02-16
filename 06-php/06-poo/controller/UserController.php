<?php 
use Model\UserModel;
use Classes\AbstractController;
use Classes\Interface\CrudInterface;

require __DIR__."/../../ressources/service/_shouldBeLogged.php";
require __DIR__."/../../ressources/service/_csrf.php";

class UserController extends AbstractController implements CrudInterface
{
    use Classes\Trait\Debug;
    
    private UserModel $db;
    private string $regexPass = "/^(?=.*[!?@#$%^&*+-])(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{6,}$/";

    function __construct()
    {
        $this->db = new UserModel();
    }
    /**
     * Gère la page d'inscription.
     *
     * @return void
     */
    function create():void
    {
        // Je change la redirection
        shouldBeLogged(false, "/06-poo");

        $username = $email = $password = "";
        $error = [];
        // Je retire regexPass et change le nom du formulaire attendu
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["userForm"]))
        {
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
                // Je change ma fonction en méthode :
                $resultat = $this->db->getOneUserByEmail($email);
                if($resultat)
                    $error["email"] = "Cet email est déjà enregistré.";
            }
            // Traitement password :
            if(empty($_POST["password"]))
                $error["password"] = "Veuillez saisir un mot de passe";
            else
            {
                $password = cleanData($_POST["password"]);
                // Je change la variable regexPass en propriété
                if(!preg_match($this->regexPass, $password))
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
                // Je change la fonction en méthode
                $this->db->addUser($username, $email, $password);
                // J'ajoute un flash message
                $this->setFlash("Inscription bien prise en compte.");
                // Je change la redirection.
                header("Location: /06-poo");
                exit;
            }
        }
        // J'inclu la vue qui correspond :
        $this->render("user/inscription.php", [
            "error"=> $error,
            "title"=> "POO - Inscription",
            "required"=>"required"
        ]);
    }
    /**
     * Gère la liste des utilisateurs
     *
     * @return void
     */
    function read():void
    {
        // Je change la fonction en méthode
        $users = $this->db->getAllUsers();
        // $this->dump($users);
        // J'inclu ma vue.
        $this->render("user/list.php", [
            "users"=>$users,
            "title"=>"POO - Liste Utilisateur"
        ]);
    }
    /**
     * Gère la page de mise à jour de l'utilisateur.
     *
     * @return void
     */
    function update():void
    {
        // Je change la redirection
        shouldBeLogged(true, "/06-poo/connexion");
    
        if(empty($_GET["id"]) || $_SESSION["idUser"] != $_GET["id"])
        {
            // Je change la redirection
            header("Location: /06-poo");
            exit;
        }
    
        // Je change la fonction en méthode
        $user = $this->db->getOneUserById((int)$_GET["id"]);
    
        $username = $password = $email = "";
        $error = [];
        // Je retire $regexPass et modifie le nom du formulaire
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["userForm"]))
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
                    if($email != $user["email"])
                    {
                        $exist = $this->db->getOneUserByEmail($email);
                        if($exist)
                        {
                            $error["email"] = "Cet email existe déjà";
                        }
                    }
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
				elseif($_POST["password"] != $_POST["passwordBis"])
                {
                    $error["passwordBis"] = "Veuillez saisir le même mot de passe";
                }
                // Je change la variable en propriété
                if(!preg_match($this->regexPass, $password))
                {
                    $error["password"] = "Veuillez saisir un mot de passe valide";
                }
                else
                    $password = password_hash($password, PASSWORD_DEFAULT);
            }
            if(empty($error))
            {
                // Je change la fonction en méthode
                $this->db->updateUserById($username, $email, $password, $user["idUser"]);
    
                // J'utilise ma méthode pour flash message;
                $this->setFlash("Votre Profil a bien été édité.");
                // Je change ma redirection
                header("Location: /06-poo");
                exit;
            }
        }
        // J'inclu ma vue.
        $this->render("user/update.php", [
            "error"=>$error,
            "user"=>$user,
            "title"=>"POO - Mise à jour du Profil"
        ]);
    }
    /**
     * Gère la page de suppression de l'utilisateur.
     *
     * @return void
     */
    function delete():void
    {
        // Je change la redirection
        shouldBeLogged(true, "/06-poo");
    
        if(empty($_GET["id"]) || $_SESSION["idUser"] != $_GET["id"])
        {
            // Je change la redirection
            header("Location: /06-poo");
            exit;
        }
        // Je change la fonction en méthode
        $this->db->deleteUserById((int)$_GET["id"]);
    
        unset($_SESSION);
        session_destroy();
        setcookie("PHPSESSID","", time()-3600);
        // Je change la redirection
        header("refresh: 5;url = /06-poo");
    
        // J'inclu ma vue
        $this->render("user/delete.php", [
            "title"=>"POO - Suppression de compte"
        ]);
    }
}
?>