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

# ------------------------------------------------------
echo "<h1> Nombres</h1><hr>";

# ------------------------------------------------------
echo "<h1> Tableaux </h1><hr>";

# ------------------------------------------------------
echo "<h1> Booleans </h1><hr>";

# ------------------------------------------------------
echo "<h1> Les variables SUPERGLOBALs </h1><hr>";
?> 