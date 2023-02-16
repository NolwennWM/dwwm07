<?php 
/* 
    PHP peut aussi écrire et créer des fichiers.
    Pour cela on commencera par ouvrir un fichier.

    On utlisera ce coup ci, le mode "w" pour "write"
*/
$file = fopen("exemple2.txt", "w");
// Ici exemple2 est le même fichier que exemple1
/* 
    Pour écrire dans mon fichier, je vais utiliser
    la fonction fwrite();
*/
fwrite($file, "Bonjour tout le monde !");
/* 
    Tout le contenu de notre fichier se voit remplacer par le nouveau contenu.
*/
fclose($file);
/* 
    Si on tente d'ouvrir un fichier en écriture alors qu'il n'existe pas,
    Alors PHP le créera.
*/
$file2 = fopen("exemple3.txt", "w");
fwrite($file2, "Mon nouveau fichier !");
fclose($file2);
/* 
    à noter qu'il existe la fonction "file_put_contents()"
    qui revient à appeler les fonctions fopen, fwrite et fclose successivement.
*/
file_put_contents("exemple3.txt", "Finalement pourquoi se compliquer la vie ?");
?>