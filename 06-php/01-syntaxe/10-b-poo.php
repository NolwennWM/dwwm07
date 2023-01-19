<?php 
    /*
        Un des avavantages de la POO est le fait de ne pas à avoir à se soucier du nom de nos variables et fonctions qui sur un gros projet peuvent entrer en conflit.
        $maSuperClass->travail() est différent de $petiteClass->travail()

        Sur un très gros projet utilisants énorméments de bibliothèques le problème des noms en commun peut se retrouver sur les classes.

        C'est ici qu'entre en jeu le namespace.
    */
#------------------------------Namespace et Use ---------------------
/* 
    Les namespaces sont un peu comme des dossiers virtuels.
    On ne crée pas réellement de dossiers, mais on range nos classes dans un chemin que l'on nomme comme on le souhaite.

    Le namespace se déclare tout en haut du fichier avant tout autre code. 
    On utilise le mot clef "namespace" suivi du chemin choisi séparé par des "\"
*/

require "./10-a-poo.php";
// class Enfant extends Humain{}
// $hum = new Humain();
/* 
    Si je tente d'utiliser une classe de mon fichier précédent, que ce soit en instanciant ou héritant la classe, PHP ne la trouvera pas.
    Pourquoi?
    Car tout en haut de mon fichier "a" j'ai indiqué que l'on se trouvait dans le namespace "Cours\POO"

    Or, cela mon fichier "b" l'ignore. Il ne trouve donc pas mes classes.

    Pour retrouver ma classe, je dois indiquer le namespace, pour cela plusieurs solutions.

    1. Indiquer le chemin complet du namespace à chaque fois que je veux utiliser ma classe.
*/
class Enfant extends Cours\POO\Humain{}
$hum = new Cours\POO\Humain();
// 2. Utiliser le mot clef "use" pour indiquer à quoi fait référence ma classe "Humain"
use Cours\POO\Humain;
class Enfant2 extends Humain{}
$hum2 = new Humain();

// 2.1 Si on a deux classes portant le même nom, on peut utiliser le mot "as" pour faire un alias.
use Cours\POO\Humain as H;
class Enfant3 extends H{}
$hum3 = new H();

/* 
    Utiliser les namespaces ne prive pas de devoir require le fichier où se trouve notre classe.
    Mais sur les gros frameworks, on aura tendance à utiliser un autoloader qui detectera l'utilisation d'une classe, 
    Puis ira require automatiquement le fichier correspondant.

    Pour faciliter le travail de cet autoloader on va généralement appeler un fichier par le nom de la classe qu'il contient
    ainsi que ranger le fichier dans des dossiers qui correspondent à son namespace.

    Troisième façon d'utiliser le namespace dans le fichier suivant :
*/
?>