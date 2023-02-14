<?php 
require __DIR__ ."/../../ressources/service/_shouldBeLogged.php";
require __DIR__ ."/../Model/userModel.php";
require __DIR__ ."/../Model/messageModel.php";
require __DIR__ ."/../Model/categoryModel.php";
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
}
function createMessage(): void
{}
function deleteMessage(): void
{}
function updateMessage(): void
{}
function goToList(): void
{
    header("Location: /05-mvc/messsage/list?id=".$_SESSION["idUser"]);
    exit;
}
?>