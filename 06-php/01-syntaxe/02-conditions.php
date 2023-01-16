<?php 
// rand retourne un nombre aléatoire.
$r = rand(0,100);
echo $r, "<br>";
echo "<h1>Conditions </h1>";
// if prend entre parenthèse une condition (un boolean), si c'est true les accolades sont executé, sinon rien ne se passe.
if($r<50)
{
    echo "\$r est plus petit que 50. <br>";
}
// elseif fonctionne comme le if mais ne peut apparaître qu'après un if ou un autre elseif, et sa condition ne sera vérifié que si toute les précédentes sont fausse.
elseif($r>50)
{
    echo "\$r est plus grand que 50. <br>";
}
// else n'apparaît qu'après un if ou un elseif, ne prend pas de condition entre parenthèse, et s'execute si toutes les conditions précédentes sont fausse.
else
{
    echo "\$r vaut 50. <br>";
}
// Il est tout à fait possible d'imbriquer les if.
echo "<h2> Autres syntaxes </h2>";

/* 
    Cette syntaxe retire les accolades, et les remplaces par un ":" pour marquer le début de la condition, et "endif" pour marquer la fin.
*/
if($r<50):
    echo "\$r est plus petit que 50. <br>";
elseif($r>50):
    echo "\$r est plus grand que 50. <br>";
else:
    echo "\$r vaut 50. <br>";
endif;

/* 
    Il existe aussi une syntaxe n'acceptant qu'une seule ligne après mes conditions pour laquelle on retire ":" et "endif";
*/
if($r<50)
    echo "\$r est plus petit que 50. <br>";
elseif($r>50)
    echo "\$r est plus grand que 50. <br>";
else
    echo "\$r vaut 50. <br>";

/* 
    On va aussi retrouver les ternaires qui permettent une condition sur une seule ligne.
    sous la forme suivante :
        condition ? true : false;
*/
echo "\$r est plus ". ($r<=50?"petit ou égale à":"grand que")." 50.<br>";
// Elles peuvent aussi être imbriqué :
echo "\$r est " . ($r<50?"plus petit que":($r>50?"plus grand que":"égale à")). " 50.<br>";

// On peut aussi vérifier l'existence ou non d'une variable avec :
$message1 = "Bonjour le monde !<br>";
echo $message1??"Rien à dire <br>";
echo $message2??"Rien à dire <br>";

#------------------------------------------------------------
echo "<h2>SWITCH </h2>";

$pays = ["France", "Japon", "Angleterre", "Suisse", "france"];
$r2 = rand(0, count($pays)-1);
echo $pays[$r2], "<br>";
// switch prend une valeur à évaluer puis lance le cas qui correspond
switch($pays[$r2])
{
    case "Japon":
        echo "Une cuisine réputé";
        // Chaque cas doit finir par un break, sinon l'instruction suivante sera lancé.
        break;
    case "Suisse":
        echo "Personne parle la même langue";
        break;
        // On peut donner plusieurs cas pour une même instruction.
    case "France":
    case "france":
        echo "Pays de la cuisine !";
        break;
        // Default sera lancé si aucun cas ne correspond.
    default:
        echo "Je ne vais pas détailler tous les pays...";
}
?>