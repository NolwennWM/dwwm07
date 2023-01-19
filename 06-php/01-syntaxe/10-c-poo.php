<?php
namespace Cours\POO;

require "./10-a-poo.php";
/* 
    3. En travaillant dans le même namespace que ma classe, on retrouvera celle ci directement.
*/
class Enfant extends Humain{}
$hum = new Humain();
/* 
    Seul défaut de travailler dans un namespace précis, c'est que lorsqu'on veut utiliser une classe 
    prédéfini de PHP, il ne la trouvera pas. La cherchant dans le namespace actuel.
*/
// $ex =  new Exception();

// Pour corriger cela, on va simplement ajouter devant le nom de notre classe, un "\"
$ex =  new \Exception();

// Comme pour un chemin absolu,  ce "\" indique de revenir à la racine du namespace.
?>