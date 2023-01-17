<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- J'affiche la variable $title si elle existe -->
    <title>Cours PHP <?php echo $title??"" ?></title>
    <!-- 
        Lorsque l'on inclu un fichier, le chemin devient relatif à l'emplacement du fichier dans lequel il est inclu.
        Difficile donc d'avoir un chemin relatif bon dans tous les cas. 
        On va donc préférer un chemin absolu.
     -->
    <link rel="stylesheet" href="/ressources/css/style.css">
    <script src="/ressources/script/script.js" defer></script>
</head>
<body>
    <header>
        <h1><?php echo $title??"Cours PHP" ?></h1>
    </header>
    <main class="<?php echo $mainClass??"" ?>">

