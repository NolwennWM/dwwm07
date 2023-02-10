<?php 
require __DIR__."/../../ressources/service/_shouldBeLogged.php";
require __DIR__."/../Model/userModel.php";
require __DIR__."/../../ressources/service/_csrf.php";

/**
 * Gère l'inscription des utilisateurs.
 *
 * @return void
 */
function createUser(): void
{
    shouldBeLogged(false, "/05-mvc");
    $username = $email = $password = "";
    $error = [];
    $regexPass = "/^(?=.*[!?@#$%^&*+-])(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{6,}$/";

    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['inscription']))
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
            $resultat = getOneUserByEmail($email);
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
            addUser($username, $email, $password);
            header("Location: /05-mvc");
            exit;
        }
    }
    // J'inclu la vue qui correspond :
    require __DIR__."/../View/user/inscription.php";
}
/**
 * Gère la liste des utilisateurs.
 *
 * @return void
 */
function readUsers():void
{
    $users = getAllUsers();
    if(isset($_SESSION["flash"]))
    {
        $flash = $_SESSION["flash"];
        unset($_SESSION["flash"]);
    }
    require __DIR__."/../View/user/list.php";
}
/**
 * Gère la page de mise à jour de l'utilisateur.
 *
 * @return void
 */
function updateUser(): void
{
    shouldBeLogged(true, "/05-mvc");

    if(empty($_GET["id"]) || $_SESSION["idUser"] != $_GET["id"])
    {
        header("Location: /05-mvc");
        exit;
    }

    // Je récupère les informations lié à mon utilisateur.
    $user = getOneUserById((int)$_GET["id"]);

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
            if(!preg_match($regexPass, $password))
            {
                $error["password"] = "Veuillez saisir un mot de passe valide";
            }
            else
                $password = password_hash($password, PASSWORD_DEFAULT);
        }
        if(empty($error))
        {
            updateUserById($username, $email, $password, $user["idUser"]);

            // Ajout d'un Flash Message;
            $_SESSION["flash"] = "Votre Profil a bien été édité.";
            // Je redirige mon utilisateur
            header("Location: /05-mvc");
            exit;
        }
    }
    require __DIR__ ."/../View/user/update.php";
}
/**
 * Gère la page de suppression de l'utilisateur.
 *
 * @return void
 */
function deleteUser(): void
{
    shouldBeLogged(true, "/05-mvc");

    if(empty($_GET["id"]) || $_SESSION["idUser"] != $_GET["id"])
    {
        header("Location: /05-mvc");
        exit;
    }

    deleteUserById((int)$_GET["id"]);

    unset($_SESSION);
    session_destroy();
    setcookie("PHPSESSID","", time()-3600);

    header("refresh: 5;url = /05-mvc");

    require __DIR__."/../View/user/delete.php";
}
?>