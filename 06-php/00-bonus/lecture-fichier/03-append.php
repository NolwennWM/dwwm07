<?php 
/* 
    Si on souhaite simplement ajouter quelque chose dans un fichier.
    On utilisera le mode d'ajout, "a" pour "append";
*/
$file = fopen("exemple3.txt", "a");
// Maintenant, si on utilise fwrite, on effacera pas le contenu précédent.
fwrite($file, "\nCeci est un ajout à mon fichier.");
fclose($file);
/* 
    Nos exemples ont été fait avec des fichiers textes,
    Mais vous pouvez le faire avec n'importe quel type de fichier.
*/
fclose(fopen("superPage.html", "w"));
fclose(fopen("script.js", "w"));
/* 
    Il existe quelques modes d'ouverture différents et des variantes de ceux présentés ici.
    Vous pourrez les retrouver dans la documentation de fopen.

    Il existes d'autres fonctionnalités liées aux fichiers comme :
        - is_file() pour vérifier l'existence d'un fichier.
        - rename() pour renommer un fichier.
*/
if(is_file("superPage.html"))
    rename("superPage.html", "page.html");
// La suppression de fichier avec unlink();
unlink("script.js");
/* 
    Vérifier l'existence d'un dossier avec is_dir();
    créer un dossier avec mkdir();
*/
if(!is_dir("poubelle"))
    mkdir("poubelle");
/* 
    On peut utiliser rename() pour déplacer un fichier.
    ! Attention, rename supprime les fichiers qui portent le même nom que le fichier renommé.
*/
rename("page.html", "poubelle/page.html");
/* 
    On peut supprimer un dossier, avec rmdir()
    seulement si le dossier est vide.
*/
unlink("poubelle/page.html");
rmdir("poubelle");
?>