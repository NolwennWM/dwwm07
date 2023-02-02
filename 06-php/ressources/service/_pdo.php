<?php 
/* 
    Dans PHP il existe plusieurs outils de connexion à la BDD, "MySQLi" et "PDO"
    Ce premier est adapté uniquement aux BDD de type MySQL.
    Alors que le second gère tout.

    * le "\" avant PDO sert à indiquer que si on se trouve dans un namespace, 
    * On doit aller chercher PDO hors de ce namespace.
*/
function connexionPDO(): \PDO
{
    // Je récupère la configuration à ma BDD.
    $config = require __DIR__."/../config/_blogConfig.php";
    /* 
        "DSN" signifie "Data Source Name"
        C'est un string contenant toute les informations pour localiser la BDD.
        Il prendra la forme suivante :
            "pilote":host="hôte de la BDD";port="port de la bdd";dbname="nom de la bdd";charset="charset utilisé par la bdd"
        Ici on obtient :
            "mysql:host=localhost;port=3306;dbname=blog;charset=utf8mb4"
    */
    $dsn =
    "mysql:host=".$config["host"]
    . ";dbname=".$config["database"]
    . ";charset=".$config["charset"];

    try
    {
        /* 
            On crée une nouvelle instance de PDO en lui donnant:
                le dsn, 
                le nom d'utilisateur,
                le mot de passe,
                les options de PDO
            Cet objet contient la connexion à la BDD;
        */
        $pdo = new \PDO(
            $dsn,
            $config["user"],
            $config["password"],
            $config["options"]
        );
        return $pdo;
    }catch(\PDOException $e)
    {
        /* 
            On lance une nouvelle exception, 
            avec en premier argument le message d'erreur,
            et en second le code d'erreur.
        */
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}
?>