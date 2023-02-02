<?php 
/* 
    Ce fichier va contenir toute les informations de connexion à votre BDD.
    Il faut donc faire attention qu'il ne soit pas accessible à vos utilisateurs.

    Soit en ayant un routeur bloquant l'accès à ce fichier, 
    Soit en ayant ce fichier hors de la racine de votre site.
*/
return [
    # hebergeur de la bdd
    "host" => "localhost",
    # Nom de la bdd
    "database" => "blog",
    # Nom d'utilisateur
    "user" => "root",
    # Password
    "password" => "",
    # le set de caractère 
    "charset" => "utf8mb4",
    # Les options de PDO (PHP Data Object)
    "options"=>
    [
        # Le mode d'erreur utilisé
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        # De quelle façon sont retourné les informations de la BDD
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        # PDO doit il émuler les requêtes préparé.
        PDO::ATTR_EMULATE_PREPARES => false
    ]
]
?>