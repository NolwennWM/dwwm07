<?php 
require __DIR__ ."/../../ressources/service/_shouldBeLogged.php";
require __DIR__ ."/../Model/userModel.php";
require __DIR__ ."/../Model/messageModel.php";
require __DIR__ ."/../Model/categoryModel.php";
require __DIR__ ."/../../ressources/service/_csrf.php";
/**
 * Gère la page d'affichage des messages
 *
 * @return void
 */
function readMessage(): void
{
    $messages = $flash = "";
    if(isset($_GET['id']))
    {
        $id = (int)$_GET["id"];
        if(empty($_GET["cat"]))
        {
            // Je récupère les messages d'un utilisateur
            $messages = getMessageByUser($id);
        }
        else
        {
            // Je récupère les messages d'un utilisateur pour une catégorie
            $messages = getMessageByUserAndCategory($id, (int)$_GET["cat"]);
        }
    }
    else
    {
        // Je change la redirection
        header("Location: /05-mvc");
        exit;
    }
    $logged = isset($_SESSION["idUser"]) && $_SESSION["idUser"] == $_GET["id"];
    if(isset($_SESSION["flash"]))
    {
        $flash = $_SESSION["flash"];
        unset($_SESSION["flash"]);
    }
    // Je récupère les catégories
    $categories = getAllCategories();
    // j'inclu ma vue:
    require __DIR__ ."/../View/message/list.php";
}
function createMessage(): void
{
    // Je change la redirection
    shouldBeLogged(true, "/05-mvc/connexion");

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        if(empty($_POST["message"]))
            $_SESSION["flash"] = "Veuillez entrer un message";
        else
        {
            $message = cleanData($_POST["message"]);
            
            if(empty($_POST["categorie"]))
            {
                addMessage([
                    "m"=>$message, 
                    "id"=>(int)$_SESSION["idUser"]
                ]);
                $_SESSION["flash"]= "Message Envoyé";
            }
            else
            {
                // Je vérifie si la catégorie existe.
                $cat = getCategoryById((int)$_POST["categorie"]);
                if($cat)
                {
                    addMessage([
                        "m"=>$message, 
                        "id"=>(int)$_SESSION["idUser"],
                        "cat"=>$cat["idCat"]
                    ]);
                    $_SESSION["flash"]= "Message Envoyé";
                }
                else
                    $_SESSION["flash"]= "Cette catégorie n'existe pas.";
            }
        }
    }
    // Je redirige vers la liste des messages
    goToList();
}
function deleteMessage(): void
{
    shouldBeLogged(true, "/05-mvc/connexion");
    // Je change mes redirections.
    if(empty($_GET["id"]))goToList();

    $message = getMessageById((int)$_GET["id"]);
    // J'ai récupéré le message puis vérifié son propriétaire
    if(!$message || $message["idUser"] != $_SESSION["idUser"])goToList();
    // Je supprime mon message
    deleteMessageById((int)$_GET["id"]);

    $_SESSION["flash"] = "Votre message a bien été supprimé";
    goToList();
}
function updateMessage(): void
{
    shouldBeLogged(true, "/05-mvc/connexion");
    // Sait-on quel message mettre à jour.
    if(empty($_GET["id"]))goToList();
    // L'utilisateur connecté, est il le propriétaire du message?
    $message = getMessageById((int)$_GET["id"]);
    // J'ai récupéré le message puis je vérifie son propriétaire
    if(!$message || $message["idUser"] != $_SESSION["idUser"])goToList();

    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['updateMessage']))
    {
        if(empty($_POST["message"]))
        {
            $error["message"] = "Veuillez entrer un message";
        }
        else
        {
            $m = cleanData($_POST["message"]);
        }
        if(empty($error))
        {
            if(empty($_POST["categorie"]))
            {
                updateMessageById($message["idMessage"], $m);
            }
            else
            {
                $cat = getCategoryById((int)$_POST["categorie"]);
                if($cat)
                    updateMessageById($message["idMessage"], $m, $cat["idCat"]);
                else
                {
                    $_SESSION["flash"] = "Cette catégorie n'existe pas";
                    goToList();
                }
            }

            $_SESSION["flash"] = "Message édité !";
            goToList();
        }
    }
    
    $categories = getAllCategories();
    require __DIR__."/../View/message/update.php";
}
function goToList(): void
{
    header("Location: /05-mvc/message/list?id=".$_SESSION["idUser"]);
    exit;
}
?>