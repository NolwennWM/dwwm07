<?php 
// Les méthodes acceptés par cette page.
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");

session_start();
require __DIR__."/../model/userModel.php";
require __DIR__."/../../../../06-php/ressources/service/_csrf.php";

$regexPass = "/^(?=.*[!?@#$%^&*+-])(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{6,}$/";

switch($_SERVER["REQUEST_METHOD"])
{
    case "POST": create(); break;
    case "GET": read(); break;
    case "PUT": update(); break;
    case "DELETE": delete(); break;
}

function create():void
{
    $json = file_get_contents("php://input");
    $data = json_decode($json);
    $username = $email = $password = "";
    $error = setError();
    // Est ce que l'on reçoit les données du formulaire d'inscription.
    if($data && isset($data->userForm))
    {
        // traitement username
        if(empty($data->username))
            setError("username", "Veuillez saisir un nom d'utilisateur");
        else
        {
            $username = cleanData($data->username);
            if(!preg_match("/^[a-zA-Z'\s-]{2,25}$/", $username))
                setError("username", "Veuillez saisir un nom d'utilisateur valide");
        }
        // traitement email 
        if(empty($data->email))
            setError("email", "Veuillez saisir un email");
        else
        {
            $email = cleanData($data->email);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                setError("email", "Veuillez saisir un email valide");
            $resultat = getOneUserByEmail($email);
            if($resultat)
                setError("email", "Cet email est déjà utilisé");
        }
        // traitement password
        if(empty($data->password))
            setError("password", "Veuillez saisir un mot de passe");
        else
            $password = cleanData($data->password);
            global $regexPass;
            if(!preg_match($regexPass, $password))
                setError("password", "Veuillez saisir un mot de passe valide");
            else
                $password = password_hash($password, PASSWORD_DEFAULT);
        // Vérification password 
        if(empty($data->passwordBis))
            setError("passwordBis", "Veuillez saisir à nouveau votre mot de passe");
        elseif($data->password != $data->passwordBis)
            setError("passwordBis", "Veuillez saisir le même mot de passe");
        
        $error = setError();
        if(empty($error["violations"]))
        {
            $user = addUser($username, $email, $password);
            sendResponse($user, 200, "Inscription validé");
        }

    }
    sendResponse($error, 400, "Formulaire Incorrecte");
}
function read():void
{
    if(isset($_GET["id"]))
        $users = getOneUserById((int)$_GET["id"]);
    else
        $users = getAllUsers();
    sendResponse($users, 200, "Utilisateur(s) récupéré(s)");
}
function update():void
{
    if(!isset($_GET["id"], $_SESSION["idUser"]) || $_SESSION["idUser"]!= $_GET["id"])
        sendResponse([], 400, "Accès Interdit!");
    
    $user = getOneUserById((int)$_GET["id"]);

    $json = file_get_contents("php://input");
    $data = json_decode($json);
    $username = $email = $password = "";
    $error = setError();

    if($data && isset($data->userForm))
    {
        // traitement username
        if(!empty($data->username))
        {
            $username = cleanData($data->username);
            if(!preg_match("/^[a-zA-Z'\s-]{2,25}$/", $username))
                setError("username", "Veuillez saisir un nom d'utilisateur valide");
        }
        else $username = $user["username"];
        // traitement email
        if(!empty($data->email))
        {
            $email = cleanData($data->email);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                setError("email", "Veuillez entrer un email valide");
            elseif($email != $user["email"])
            {
                $exist = getOneUserByEmail($email);
                if($exist) 
                    setError("email", "Cet email existe déjà");
            }
        }
        else $email = $user["email"];
        // traitement password
        if(!empty($data->password))
        {
            if(empty($data->passwordBis))
                setError("passwordBis", "Veuillez saisir à nouveau votre mot de passe");
            elseif($data->password != $data->passwordBis)
                setError("passwordBis", "Veuillez saisir le même mot de passe");
            $password = cleanData($data->password);
            global $regexPass;
            if(!preg_match($regexPass, $password))
                setError("password", "Veuillez saisir un mot de passe valide");
            else
                $password = password_hash($password, PASSWORD_DEFAULT);
        }
        else $password = $user["password"];
        // update
        $error = setError();
        if(empty($error["violations"]))
        {
            $user = updateUserById($username, $email, $password, $user["idUser"]);
            sendResponse($user, 200, "Utilisateur mis à jour");
        }
    }
    sendResponse($error, 400, "Formulaire Incorrecte");
}
function delete():void
{
    if(!isset($_GET["id"], $_SESSION["idUser"]) || $_SESSION["idUser"] != $_GET["id"])
    {
        sendResponse([], 400, "Accès Interdit !");
    }
    deleteUserById((int)$_GET["id"]);

    unset($_SESSION);
    session_destroy();
    setcookie("PHPSESSID", "", time()-3600);

    sendResponse([], 200, "Compte supprimé et déconnecté");
}
?>