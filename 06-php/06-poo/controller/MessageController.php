<?php 
use Model\MessageModel;
use Model\CategoryModel;
use Model\UserModel;
use Classes\AbstractController;
use Classes\Interface\CrudInterface;

require __DIR__."/../../ressources/service/_shouldBeLogged.php";
require __DIR__."/../../ressources/service/_csrf.php";

class MessageController extends AbstractController implements CrudInterface
{
    private UserModel $dbUser;
    private MessageModel $dbMessage;
    private CategoryModel $dbCat;
    
    function __construct()
    {
        $this->dbMessage = new MessageModel();
        $this->dbUser = new UserModel();
        $this->dbCat = new CategoryModel();
    }
    /**
     * Gère la page d'affichage des messages
     *
     * @return void
     */
    function read(): void
    {
        $messages = $flash = "";
        if(isset($_GET['id']))
        {
            $id = (int)$_GET["id"];
            if(empty($_GET["cat"]))
            {
                // Je transforme la fonction en méthode
                $messages = $this->dbMessage->getMessageByUser($id);
            }
            else
            {
                // Je transforme la fonction en méthode
                $messages = $this->dbMessage->getMessageByUserAndCategory($id, (int)$_GET["cat"]);
            }
        }
        else
        {
            // Je change la redirection
            header("Location: /06-poo");
            exit;
        }
        $logged = isset($_SESSION["idUser"]) && $_SESSION["idUser"] == $_GET["id"];
        
        // Je change la fonction en méthode
        $categories = $this->dbCat->getAllCategories();
        // j'inclu ma vue:
        $this->render("message/list.php", [
            "title"=>"POO - Liste des Messages",
            "categories"=> $categories,
            "messages"=> $messages,
            "required"=> "required",
            "action"=>"/06-poo/message/create",
            "logged"=> $logged
        ]);
    }
    function create(): void
    {
        // Je change la redirection
        shouldBeLogged(true, "/06-poo/connexion");

        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            if(empty($_POST["message"]))
                $_SESSION["flash"] = "Veuillez entrer un message";
            else
            {
                $message = cleanData($_POST["message"]);
                
                if(empty($_POST["categorie"]))
                {
                    // Je change la fonction en méthode :
                    $this->dbMessage->addMessage([
                        "m"=>$message, 
                        "id"=>(int)$_SESSION["idUser"]
                    ]);
                    // J'utilise ma méthode pour flash message
                    $this->setFlash("Message Envoyé");
                }
                else
                {
                    // Je change la fonction en méthode :
                    $cat = $this->dbCat->getCategoryById((int)$_POST["categorie"]);
                    if($cat)
                    {
                        // Je change la fonction en méthode :
                        $this->dbMessage->addMessage([
                            "m"=>$message, 
                            "id"=>(int)$_SESSION["idUser"],
                            "cat"=>$cat["idCat"]
                        ]);
                        // J'utilise ma méthode pour flash message
                        $this->setFlash("Message Envoyé");
                    }
                    else
                        // J'utilise ma méthode pour flash message
                        $this->setFlash("Cette catégorie n'existe pas.");
                }
            }
        }
        // Je change ma fonction en méthode
        $this->goToList();
    }
    function delete(): void
    {
        // Je change mes redirections.
        shouldBeLogged(true, "/06-poo/connexion");
        // Je change ma fonction en méthode
        if(empty($_GET["id"]))$this->goToList();
        // Je change ma fonction en méthode
        $message = $this->dbMessage->getMessageById((int)$_GET["id"]);
        // Je change ma fonction en méthode
        if(!$message || $message["idUser"] != $_SESSION["idUser"])$this->goToList();
        // Je change ma fonction en méthode
        $this->dbMessage->deleteMessageById((int)$_GET["id"]);
        // J'utilise ma méthode pour flash message :
        $this->setFlash("Votre message a bien été supprimé");
        // Je change ma fonction en méthode
        $this->goToList();
    }
    function update(): void
    {
        // Je change ma redirection
        shouldBeLogged(true, "/06-poo/connexion");
        // Je change ma fonction en méthode
        if(empty($_GET["id"]))$this->goToList();
        // Je change ma fonction en méthode
        $message = $this->dbMessage->getMessageById((int)$_GET["id"]);
        // Je change ma fonction en méthode
        if(!$message || $message["idUser"] != $_SESSION["idUser"])$this->goToList();
        // Je change le nom de mon formulaire
        if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['messageForm']))
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
                    // Je change ma fonction en méthode
                    $this->dbMessage->updateMessageById($message["idMessage"], $m);
                }
                else
                {
                    // Je change ma fonction en méthode
                    $cat = $this->dbCat->getCategoryById((int)$_POST["categorie"]);
                    if($cat)
                        // Je change ma fonction en méthode
                        $this->dbMessage->updateMessageById($message["idMessage"], $m, $cat["idCat"]);
                    else
                    {
                        // J'utilise ma méthode pour flash message
                        $this->setFlash("Cette catégorie n'existe pas");
                        // Je change ma fonction en méthode
                        $this->goToList();
                    }
                }
                // J'utilise ma méthode pour flash message
                $this->setFlash("Message édité !");
                // Je change ma fonction en méthode
                $this->goToList();
            }
        }
        // J'inclu ma vue 
        $this->render("message/update.php", [
            "title"=>"POO - Update Message",
            "message"=>$message,
            "categories"=> $this->dbCat->getAllCategories() 
        ]);
    }
    function goToList(): void
    {
        // Je change la redirection
        header("Location: /06-poo/message/list?id=".$_SESSION["idUser"]);
        exit;
    }
}


?>