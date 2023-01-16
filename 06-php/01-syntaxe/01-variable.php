<!-- Tout le code PHP se trouve entre les balises "<?php ?>" -->
<?php 
// PHP signifie "PHP Hypertext Preprocessor"
// Originellement appellé "Personnal Home Page"

# Les commentaires PHP peuvent s'écrire avec // ou # pour une seule ligne
/* OU cela pour du multiligne */

// Chaque instruction PHP se termine par ";"

// Le code PHP ne s'affiche pas sur notre navigateur.
// Pour afficher des informations via PHP, on utilisera une des fonctions suivante :

/* echo est la fonction d'affichage la plus utilisé, et elle a la particularité de ne pas avoir besoin de parenthèse. */
echo("Coucou"); 
echo "Coucou", "Salut";

/* 
    Print fonctionne comme echo mais légèrement plus lente et retourne une valeur de 1; 
    * Peu importe la fonction utilisé, une fois une valeur affiché, elle est traité comme du HTML classique.
*/
print "<br> PHP !";
/* 
    var_dump(); sera votre meilleur ami, il affichera des informations supplémentaires sur les valeurs qui lui sont données.
    Très utile pour le debug.
*/
var_dump("Bonjour", "Le monde !");
/* 
    var_export() Affichera le contenu de ce qui lui a été donné, en tant que PHP utilisable.
*/
var_export("bidule");

# fonctions utile pour le développement
// phpinfo affiche tous les paramètres du serveur.
// phpinfo();
// geteven() permet de récupérer une des variables d'environnement du serveur
echo getenv("SERVER_PORT");
# ------------------------------------------------------
echo "<h1> Déclaration des variables </h1><hr>";
/* 
    On déclare une variable PHP avec un "$" puis une lettre ou un "_" 
    Puis ensuite les chiffres sont aussi acceptés.

    Tenter d'appeler une variable avant sa déclaration provoque une erreur.
*/
// echo $banane;
$banane;
$banane = "jaune";
echo "banane :", $banane, "<br>";
/* 
    PHP gère aussi les constantes, elles sont déclaré différement avant ou après la 8.0;
    (Avant la 7.3, on pouvait rajouter un 3ème argument à define pour indiquer que la constante n'était pas sensible à la casse)
    Ancienne version :
*/
define("AVOCAT", "vert");
echo "avocat:", AVOCAT, "<br>";
# Nouvelle version :
const TOMATE = "rouge";
echo "tomate:", TOMATE, "<br>";
/* 
    get_defined_vars() permet de récupérer un tableau des différentes variables défini. certaines sont présente par défaut.
    get_defined_constants() fait de même avec les constantes.
    Et on trouvera d'autres variantes.
*/
var_dump(get_defined_vars());
echo "<br>";

// variables dynamiques.
$chaussette = "rouge";
$$chaussette = "bleu";
$$$chaussette = "violet";
/* 
    Le nom de mes variables sont créé dépendament de la valeur de la variable précédente.
*/
echo $chaussette, $rouge, $bleu;

// On utilisera unset() pour supprimer une variable;
unset($banane);
var_dump(get_defined_vars());

# ------------------------------------------------------
echo "<h1> Types des variables </h1><hr>";

$num = 5;
$dec = 0.5;
$str = "coucou";
$arr = [];
$boo = true;
$nul = NULL;
$obj = (object)[];
// integer est un Nombre entier
echo gettype($num), "<br>";
// double est un nombre décimal (équivalent à FLOAT)
echo gettype($dec), "<br>";
// string est une chaîne de caractère.
echo gettype($str), "<br>";
// array est un tableau.
echo gettype($arr), "<br>";
// boolean qui accepte uniquement true ou false;
echo gettype($boo), "<br>";
// NULL qui n'a aucune valeur;
echo gettype($nul), "<br>";
// object pour la POO;
echo gettype($obj), "<br>";

# ------------------------------------------------------
echo "<h1> String </h1><hr>";
// Les strings se sont des chaînes de charactères entre guillemet ou appostrophe.
echo "bonjour", 'coucou', "<br>";
// En php, on peut faire des sauts de ligne dans les strings, mais ils ne sont pas pris en compte à l'affichage.
echo "Ceci est un message
        sur plusieurs lignes <br>";
// Les backticks ne sont pas utilisé pour les strings en PHP.
$nom = "Maurice";
$age = 54;
// L'interpollation ne fonctionne qu'entre guillemet, et utiliser le nom de la variable suffit :
echo "$nom a $age ans. <br>";
echo '$nom a $age ans. <br>';
// Pour concaténer deux strings on utilisera le caractère ".";
echo $nom . " a " . $age . ' ans. <br>';
$nom .= " Dupont";
echo $nom, "<br>";
// Quelques petites fonctions plus ou moins utiles.
# Donne la longueur du string.
echo strlen($nom), "<br>";
# donne le nombre de mot.
echo str_word_count($nom), "<br>";
# Inverse le string.
echo strrev($nom), "<br>";
# Recherche le string en second paramètre dans celui en premier paramètre. Puis retourne le premier string à partir du moment où la recherche a été trouvé (ou false);
echo strchr($nom, "Du"), "<br>";
# Pareil mais retourne la position des charactères.
echo strpos($nom, "Du"), "<br>";  
# On peut afficher un caractère donné en indiquant sa position:
echo $nom[8], "<br>";  
# On peut modifier un string en indiquant la position que l'on souhaite modifier.
$nom[8] = "L";
echo $nom, "<br>";
# Remplace le premier string par le second, dans le troisième.
echo str_replace("ce", "cette", $nom), "<br>";

# ------------------------------------------------------
echo "<h1> Nombres</h1><hr>";
// On peut indiquer avec un prefixe quelle est la base de mon chiffre.
# 0b pour base 2 (binaire);
$bin = 0b10000;
echo "\$bin = $bin <br>";
# 0 pour base 8 (octale);
$oct = 020;
echo "\$oct = $oct <br>";
# aucun pour la base 10 (decimal);
$dec = 16;
echo "\$dec = $dec <br>";
# 0x pour hexadecimal (base 16);
$hex = 0x10;
echo "\$hex = $hex <br>";
// Les nombres sont soit des INTEGER (nombre entier) soit des FLOAT (ou double), des nombres decimals.
var_dump("3.14 is int?", is_int(3.14));
echo "<br>";
var_dump("3.14 is float?", is_float(3.14));
// is_int et is_float retourne un boolean indiquant si le nombre en paramètre est un integer ou un float.
echo "<br>", PHP_INT_MAX, "<br>", PHP_INT_MIN, "<br>";
echo "<br>", PHP_FLOAT_MAX, "<br>", PHP_FLOAT_MIN, "<br>";
// Les constantes précédentes indiquent les plus petits et plus grands nombres possibles.
$nan = acos(8);
// is_numeric verifie si le paramètre peut être un nombre.
var_dump(is_numeric("09876"), is_numeric("098.76"), is_nan($nan));
// Mettre int entre parenthèse avant une valeur permet de la transformer en integer.
echo "<br>", (int)"42chaussettes", "<br>", (int)3.14;
// de même avec float.
echo "<br>", (float)"42.34chaussettes", "<br>";
// On va évidemment retrouver les opérations mathématiques classiques.
echo "1+1=", 1+1, "<br>";
echo "1-1=", 1-1, "<br>";
echo "2*2=", 2*2, "<br>";
echo "8/2=", 8/2, "<br>";
// modulo:
echo "11%3=", 11%3, "<br>";
// puissances :
echo "2**4=", 2**4, "<br>";
// Les opérateurs d'assignements sont aussi disponible.
$x = 5;
$x += 2;
$x -= 3;
$x *= 4;
$x /= 2;
$x %= 3;
$x **= 5;
echo $x, "<br>";
// L'incrémentation et la décrémentation font leur retour :
echo $x++, "-->", $x, "<br>";
echo ++$x, "-->", $x, "<br>";
echo $x--, "-->", $x, "<br>";
echo --$x, "-->", $x, "<br>";

# ------------------------------------------------------
echo "<h1> Tableaux </h1><hr>";

// Version d'origine de la création de tableau :
$a = array("banane", "pizza", "avocat");
// Version moderne :
$b = ["banane", "pizza", "avocat"];
// echo n'accepte pas les tableaux, il faut donc utiliser var_dump
var_dump($a, $b);
// Une jolie façon d'afficher les tableaux :
echo "<pre>".print_r($b, 1)."</pre>";
// Pour selectionner un élément d'un tableau, on utilise son index.
echo "J'aime la $a[0], la $a[1] et l'$a[2].<br>";
// Pour connaître la taille d'un tableau.
echo count($a), "<br>";
// Pour ajouter un élément à mon tableau :
$b[] = "fraise";
echo '<pre>'.print_r($b, 1).'</pre>', "<br>";
/* 
    En PHP il existe des tableaux associatif (associative array).
    Leur principe est de remplacer les index "numérique" par des 
    clefs nominative (string); 
*/
$person = ["prenom"=>"Maurice", "age"=>42];
// Pour afficher les données, on utilisera ces clefs nominative :
echo $person["prenom"]. " a ". $person["age"]. " ans. <br>";
// les tableaux peuvent être multidimensionnel :
$person["loisir"] = ["pétanque", "bowling"];
echo '<pre>'.print_r($person, 1).'</pre>';
// Pour afficher ces données je vais placer les crochets côtes à côtes.
echo $person["loisir"][1], "<br>";
// Une donnée du tableau se supprime comme une variable avec unset()
unset($person["age"]);
// Cette façon de faire, ne pose aucun problème avec un tableau associatif, mais peut poser problème avec un tableau classique.
unset($b[1]);
echo '<pre>'.print_r($b, 1).'</pre>';
// Pour corriger cela on peut utiliser :
$b = array_values($b);
// cette fonction retourne un tableau contenant toute les valeurs du tableau donné en argument.
// On peut aussi éviter le problème en remplaçant unset par array_splice
array_splice($b, 1, 1);
/* 
    array_splice prend un tableau en premier argument
    en second l'index depuis lequel on doit couper le tableau.
    En troisième combien d'élément on souhaite couper.
*/
echo '<pre>'.print_r($b, 1).'</pre>';
// On peut aussi utiliser cette fonction pour remplacer.
array_splice($a, 1, 1, ['brocoli', "pamplemousse"]);
echo '<pre>'.print_r($a, 1).'</pre>';

// On pourra fusionner des tableaux avec :
$ab = array_merge($a,$b);
echo '<pre>'.print_r($ab, 1).'</pre>';

// On pourra trier nos tableaux avec la fonction sort()
sort($ab);
echo '<pre>'.print_r($ab, 1).'</pre>';
/* 
    rsort() tri par ordre décroissant.

    Puis spécifique aux tableaux associatif on a :
        asort() tri par ordre croissant des valeurs
        ksort() tri par ordre croissant des clefs
        arsort() tri par ordre décroissant des valeurs
        krsort() tri par ordre décroissant des clefs
*/ 

# ------------------------------------------------------
echo "<h1> Booleans </h1><hr>";

// Les booleans ne prennent que les valeurs true ou false;

$t = true;
$f = false;
var_dump($t, $f);
// echo $t, $f;
echo "<br> 5<3 : ";
var_dump(5<3);
echo "<br> 5<=3 : ";
var_dump(5<=3);
echo "<br> 5>3 : ";
var_dump(5>3);
echo "<br> 5>=3 : ";
var_dump(5>=3);
echo "<br> 5=='5' : ";
var_dump(5=='5');
echo "<br> 5==='5' : ";
var_dump(5==='5');
echo "<br> 5!='5' : ";
var_dump(5!='5');
echo "<br> 5<>'5' : ";
var_dump(5<>'5');
echo "<br> 5!=='5' : ";
var_dump(5!=='5');

// On peut aussi combiner les booleans :
echo "<br> true and false :";
var_dump($t and $f);
echo "<br> true && true :";
var_dump($t && $t);
echo "<br> true or false :";
var_dump($t or $f);
echo "<br> false || false :";
var_dump($f || $f);
// La porte logique xor retourne true seulement si un des deux côtés est true. 
echo "<br> false xor true :";
var_dump($f xor $t);
// Si les deux côtés ont la même valeur, elle retourne false.
echo "<br> true xor true :";
var_dump($t xor $t);

// On peut inverser le résultat avec "!"
echo "<br> !(true and false) :";
var_dump(!($t and $f));

// Dans les cas suivants, $machin n'existe pas, mais PHP n'ira même pas lire cette partie du code, car la porte logique ne l'y oblige pas.
echo "<br>";
var_dump(true or $machin);
echo "<br>";
var_dump(false and $machin);


# ------------------------------------------------------
echo "<h1> Les variables SUPERGLOBALS </h1><hr>";
/* 
    Les variables superglobals sont des variables défini par PHP et accessibles partout dans votre code. 

    * $GLOBALS contient toute les variables globals définie par PHP ou par vous.
*/
// var_dump($GLOBALS);
// $_SERVER contient les informations liés au serveur ou à la requête.
// echo '<pre>'.print_r($_SERVER, 1).'</pre>';

// $_REQUEST contient les mêmes informations que $_GET, $_POST et $_COOKIE;
echo '<pre>'.print_r($_REQUEST, 1).'</pre>';
// $_POST contient toute les informations envoyer en méthode POST lors de la requête.
echo '<pre>'.print_r($_POST, 1).'</pre>';
// $_GET contient toute les informations envoyer en méthode GET lors de la requête.
echo '<pre>'.print_r($_GET, 1).'</pre>';
// $_FILES contient les informations liés aux fichiers envoyer en POST (upload).
echo '<pre>'.print_r($_FILES, 1).'</pre>';
// $_ENV contient les variables d'environnement.
echo '<pre>'.print_r($_ENV, 1).'</pre>';
// $_COOKIE contient les cookies.
echo '<pre>'.print_r($_COOKIE, 1).'</pre>';
// $_SESSION contient les informations stockés en session (mais n'existe qu'une fois la session lancé.)
// echo '<pre>'.print_r($_SESSION, 1).'</pre>';
?> 