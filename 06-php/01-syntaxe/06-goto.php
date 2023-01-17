<?php 
$title = "Go TO";
require "../ressources/template/_header.php";

/* 
    Go To permet de sauter une partie du code pour aller à la suivante.
    On peut s'en servir dans une condition pour ne pas executer certains codes.
    C'est une vieille fonctionnalité que les developpeurs n'apprécie pas trop car elle change l'ordre de lecture du code. 

    ! ATTENTION :
        On ne peux pas entrer dans une fonction, une boucle ou une condition avec go to.
        On ne peux pas sortir d'une fonction non plus.

    Goto fonctionne en deux parties, la première est une balise qui servira d'ancre à notre goto.
        Elle est représenté par un mot suivi de ":"
    Puis le mot clef "goto" suivi du nom de l'ancre.
*/
for ($i=0; $i < 100000; $i++) 
{ 
    echo "ceci est le message $i <br>";
    if($i === 5) goto fin;
}

echo "Les chaussettes de l'archi duchesses...<br>";
fin:

echo "ceci est la fin !";
?>

<?php require "../ressources/template/_footer.php" ?>