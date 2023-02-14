<?php

require_once("router.php");
get("/04-router/exercice", "/../pages/home.php");
get("/04-router/exercice/p2", "/../pages/page2.php");
/*
    Ce routeur recherche les fichiers par défaut à la racine du serveur.
    Il faut donc soit mettre le chemin complet vers le fichier.
    soit lui indiquer dans le fichier "router.php" 
    un nouveau chemin pour la variable $ROOT.
*/
any('/404','/../pages/404.php');
// any('/404','04-routeur/exercice/pages/404.php');
