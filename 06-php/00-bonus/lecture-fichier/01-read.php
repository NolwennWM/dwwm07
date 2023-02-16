<?php 
/* 
    PHP à la capacité de lire et écrire les fichiers qui se trouvent sur votre serveur.

    On va voir ici quelques fonctions qui permettent cela.

    La fonction fopen() permet d'ouvrir le fichier en premier argument.
    Le second argument indique quel mode est utilisé. 

    Le mode "r" pour "read" ouvre le fichier en lecture seule.
*/
$file = fopen("exemple1.txt", "r");
/* 
    fgetc va retourner un caractère du fichier, puis déplacer le curseur au caractère suivant.
*/
echo fgetc($file);
// Si je l'appelle plusieurs fois, il lira les caractères un à un.
for( $i=0; $i<10; $i++) echo fgetc($file);
echo "<hr>";
/* 
    Si jamais on souhaite déplacer le curseur, sans avoir à lire les caractères, on peut utiliser :
    fseek()
*/
fseek($file, 0);
/* 
    On peut aussi lire notre fichier ligne par ligne
    Pour cela on utilisera fgets();
*/
echo fgets($file);
/* 
    Ici aussi le curseur est déplacé, et si je rappelle ma fonction plusieurs fois,
    Elle lira les lignes une à une.
*/
for( $i=0; $i<5; $i++) echo fgets($file), "<br>";
echo "<hr>";

fseek($file, 0);
/* 
    On peut aussi indiquer le nombre d'octet qui doivent être lu
    Cela se fait avec fread();
*/
echo fread($file, 20);
echo "<br>";
/* 
    Une façon de lire un fichier en entier, est d'indiquer à fread() la taille du fichier.
    Cela se fait avec filesize();
*/
echo fread($file, filesize("exemple1.txt"));
echo "<hr>";
fseek($file, 0);
/* 
    Une autre façon de lire un fichier en entier, 
    est de détecter que le curseur se trouve à la fin du fichier.
    On utilisera pour cela feof();
*/
while(!feof($file)) echo fgetc($file);
// On aurait pu utiliser n'importe quel fonction de lecture.

/* 
    Quand on a fini d'utiliser un fichier, il est important de le fermer.
    Un serveur n'est qu'un simple ordinateur, si vous ouvrez des tas de fichiers sans jamais les fermer, 
    votre serveur finira par ralentir sous le poid de tout ce qui est ouvert.
    On utilisera alors la fonction fclose();
*/  
fclose($file);
echo "<hr>";
/* 
    Notons aussi l'existence d'une fonction file_get_contents() 
    qui a pour effet de lire le fichier en entier, sans avoir besoin d'ouvrir ou fermer celui ci
*/
echo file_get_contents("exemple1.txt");
?>