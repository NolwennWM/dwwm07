<?php 
echo "<h1> Déclaration des fonctions </h1>";
/* 
    Pour déclarer des fonctions en PHP, on utilisera le mot clef "function".
    suivi du nom de la fonction qui suis les même règles que les noms des variables.
    Ensuite des parenthèses pouvant accueillir les possibles arguments.
    et enfin des accolades contenant le corps de la fonction.
*/
function salut()
{
    echo "Salut tout le monde ! <br>";
}
/* 
    Pour appeler une fonction, on utilise son nom suivi de parenthèse.
    Le code d'une fonction n'est executé qu'une fois qu'elle est appellé.
*/
salut();
/* 
    PHP déclare les fonctions avant de lire le code.
    On peut donc appeler une fonction avant qu'elle soit déclaré.
*/
salut1();
function salut1()
{
    echo "Salut les autres ! <br>";
}
/* 
    Si une fonction est déclaré dans un bloc (un if par exemple). Elle n'est appelable qu'après avoir été déclaré. 
*/
if(true)
{
    // salut2();
    function salut2()
    {
        echo "Salut moi même ! <br>";
    }
    salut2();
}
/* 
    Appeler ce genre de fonction hors de son block peut poser problème si elle se retrouve non déclaré. 
    (si la condition est false par exemple.)
*/
// salut2();
if(true) salut2();

/* 
    Une fonction peut se contenter d'effectuer des actions.
    Mais peut aussi retourner des informations.
    On utilisera pour cela le mot clef "return" suivi (ou non) des informations à retourner.
    Le mot clef "return" met fin à la fonction, tout code qui suis ne sera pas effectué.
*/
function aleaString()
{
    $r = rand(0,100);
    // Si $r est plus petit que 50 on ne retourne rien.
    if($r<50)return;
    // Sinon on retourne le nombre sous forme de string.
    return (string)$r;
}
// On peut utiliser la valeur de retour, directement dans une autre fonction :
echo aleaString(), "<br>";
// Ou alors l'attribuer à une variable :
$alea = aleaString();
echo $alea, "<br>";
# ------------------------------------------
echo "<h2> ARGUMENTS </h2>";

/* 
    Entre les parenthèses de la déclaration de fonction,
    Nous pouvons avoir entre 0 et l'infini arguments. 
    Ces arguments sont séparé d'une virgule et nommé comme une variable.

    Quand on appelle une fonction avec un argument, la valeur donnée est transmise à la variable déclaré dans la fonction.
*/
function bonjour($nom)
{
    echo "Bonjour $nom ! <br>";
}
bonjour("Maurice");
// Si il manque des arguments, PHP lancera une fatal error.
// bonjour();
function bonjour1($n1, $n2)
{
    echo "Bonjour $n1 et $n2 ! <br>";
}
bonjour1("Charli", "Pierre");

// Il est aussi possible d'avoir un nombre d'argument infini:
// "..." est le "rest operator"
function bonjour2(...$noms)
{
    // Dans ce cas là, tous les arguments sont placé dans $noms sous forme de tableau.
    foreach($noms as $n) echo "Salut $n ! <br>";
}
bonjour2("Maurice", "Pierre", "Charli", "Julie");
/* 
    Il est possible de donner une valeur par défaut à un argument.
    Dans ce cas là, l'argument devient optionnel.
    Si l'argument est fourni, alors il utilisera la valeur fourni.
    Sinon il utilisera la valeur par défaut.
    Un argument est optionnel que si les arguments suivants le sont aussi.
*/
function bonjour3($n1, $n2="personne d'autre")
{
    echo "Bonjour $n1 et $n2 ! <br>";
}
bonjour3("Julie");
bonjour3("Julie", "Mauricette");
/* 
    Quand on donne un argument à une fonction, via une variable.
    si l'argument est modifié, cela ne modifie pas, la variable.
*/
function titre($nom)
{
    $nom .= " le grand";
    return $nom;
}
$mau = "Maurice";
$mau2 = titre($mau);
// $mau n'a pas changé malgré que l'argument lui est modifié.
echo "$mau est devenu $mau2 ! <br>";
/* 
    Par contre, il est possible de passer des arguments par "référence".
    Cela signifie que les modifications qui auront lieu sur l'argument, auront lieu aussi sur la variable.
    Ce n'est plus la valeur qui est transmise, mais la position de la variable dans la mémoire.
*/
function titre1(&$nom)
{
    $nom .= " le petit";
}
titre1($mau);
echo "Voici $mau !";

# ----------------------------------------
echo "<h2> RECURCIVITE </h2>";

/* 
    Une fonction s'appelant elle même, est dite récurcive.
    La première chose à faire lorsque l'on crée ce genre de fonction,
    c'est de prévoir une condition de sortie, sous peine d'avoir une boucle infinie.
*/
function decompte($n)
{
    echo $n, "<br>"; // Action réalisé par la fonction
    if($n<=0)return; // Condition de sortie de la boucle
    decompte(--$n); // la récurcivité
}
decompte(5);
/* 
    exemple de fonction récurcive qui va lire toute les données d'un tableau multidimensionnel.
*/
$a = [
    "truc", 
    "bidule", 
    [
        "Chaussette",
        "pantalon",
        [
            "banane", "tomate"
        ]
    ]
];
function echoArray($tab)
{
    foreach($tab as $e)
    {
        if(gettype($e) === "array")
        {
            echoArray($e);
            continue;
        }
        echo $e, "<br>";
    }
}
echoArray($a);

# --------------------------------------
echo "<h2>Typage et Description</h2>";
/* 
    Sur les dernières versions de PHP, il est possible, voir conseillé bien que non obligatoire, 
    de typer ses arguments et valeur de retour. 
    Ainsi que de décrire ses fonctions

    Faire ceci ne va pas fondamentalement changer le fonctionnement de votre code, mais faciliter sa relecture, que ce soit par vous ou un collègue.
*/
/**
 * Cette fonction retourne la présenation du personnage
 * 
 * Ces arguments représentes les informations du personnage.
 *
 * @param string $nom nom du personnage
 * @param integer $age age du personnage
 * @param boolean $travail travaille t-il ou non
 * @return string présentation du personnage
 */
function presentation(string $nom, int $age, bool $travail):string
{
    return "Je m'appelle $nom et j'ai $age ans. Je ".($travail?"travaille.":"ne travaille pas.");
}
echo presentation("Maurice", 54, false);

#---------------------------------------
echo "<h2>Portée des variables et static</h2>";

// Une variable déclaré hors d'une fonction, n'est pas accessible dans celle ci;
$z = 5;
function showZ()
{
    // Ici $z est inconnu
    // echo $z;
    /* 
        On peut récupérer une variable global grâce au mot clef "global"
        Mot clef que l'on fera suivre du nom des variables que l'on souhaite récupérer.
    */
    global $z;
    echo $z, "<br>";
}
showZ();
/* 
    Dans un cas normal, une variable déclaré dans une fonction, est détruite une fois la fonction terminé. 
    Le mot clef "static" permet de la sauvegarder et de ne pas la réinitialiser
*/
function compte()
{
    $a = 0;
    // $b est initialisé seulement au premier appel
    static $b = 0;
    echo "a : $a <br> b : $b <br>";
    $a++;
    $b++;
}
compte();
compte();
compte();
#-------------------------------------------
echo "<h2>Fonction anonyme, fléché et callback </h2>";

/* 
    Bien que plus rarement utilisé qu'en JS, il est posssible d'utiliser des fonctions anonyme et fléché en PHP.

    Une fonction anonyme, est une fonction qui ne porte pas de nom.
    Elle sera rangé dans une variable ou utilisé en callback;

    Un callback est une fonction appelé en argument d'une autre fonction.

    Une fonction fléché est une fonction anonyme raccourci.
*/
function dump(array $arr, callable $func): void
{
    foreach($arr as $a)
    {
        $func($a);
        echo "<br>";
    }
}
$a2 = ["sandwich", "ramen", "pizza"];
/* 
    Ici je donne un tableau à ma fonction suivi d'une fonction anonyme qui fera un echo.
*/
dump($a2, function($x){echo $x;});
// la même chose avec une fonction fléché:
dump($a2, fn($x)=>var_dump($x));
$superFonction = function($x)
{
    $x = strtoupper($x);
    print($x);
};
// Je donne ma variable contenant une fonction en callback de ma fonction.
dump($a2, $superFonction);
?>