<?php 
if(session_status() === PHP_SESSION_NONE)
session_start();
// liste des caractères accepté pour le captcha:
$characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
/**
 * Génère une chaîne de caractère aléatoire.
 *
 * @param string $characters
 * @param integer $strength
 * @return string
 */
function generateString(string $characters, int $strength = 10): string
{
    $randStr = "";
    for($i = 0; $i < $strength; $i++)
    {
        $randStr .= $characters[rand(0, strlen($characters)-1)];
    }
    return $randStr;
}
// echo generateString($characters);
// génère une nouvelle image avec (largeur, hauteur) qui est un objet de classe GdImage
$image = imagecreatetruecolor(200, 50);
// On active les fonctions d'antialias pour améliorer la qualité de l'image.
imageantialias($image, true);

$colors = [];
// On choisi une plage de couleur aléatoire.
$red = rand(125, 175);
$green = rand(125, 175);
$blue = rand(125, 175);

for($i = 0; $i < 5; $i++)
{
    /* 
        imagecolorallocate prend en premier argument un objet de classe GdImage.
        En second, troisième et quatrième, respectivement des valeurs numériques représentant le RGB.
        Elle retourne un INT représentant un identifiant pour la couleur généré.
    */
    $colors[] = imagecolorallocate($image, $red - 20*$i, $green -20*$i, $blue -20*$i);
}
// echo '<pre>'.print_r($colors, 1).'</pre>';
/* 
    imagefill rempli un objet gdImage donné en premier argument,
    à partir des positions x et y en second et troisième argument,
    avec l'identifiant de couleur donné en quatrième argument.
*/
imagefill($image, 0, 0, $colors[0]);

for($i = 0; $i <10; $i++)
{
    // Paramètre l'épaisseur d'une ligne en pixel pour une image donnée.
    imagesetthickness($image, rand(2, 10));
    /* 
        Dessine un rectangle pour l'image donnée en premier argument,
        avec les arguments 2 et 3 pour la position de départ x et y,
        Puis les arguments 4 et 5 pour la position de fin x et y,
        De la couleurs donnée en sixième argument.
    */
    imagerectangle(
        $image,
        rand(-10, 190),
        rand(-10, 10),
        rand(-10, 190),
        rand(40, 60),
        $colors[rand(1, 4)]
    );
}
// Tableau des couleurs disponibles pour le texte.
$textColors = [imagecolorallocate($image, 0, 0, 0), imagecolorallocate($image, 255, 255, 255)];
// Tableau des polices disponibles pour le texte.
$fonts = [__DIR__."/../font/Acme-Regular.ttf", __DIR__."/../font/arial.ttf", __DIR__."/../font/typewriter.ttf"];
// Taille du captcha :
$strLength = 6;
$captchaStr = generateString($characters, $strLength);
// Je sauvegarde le string aléatoire en session.
$_SESSION["captchaStr"] = $captchaStr;
for($i = 0; $i < $strLength; $i++)
{
    // On calcul l'espacement idéal par rapport au nombre de lettre.
    $letterSpace = 170/$strLength;
    // On choisi une position initial.
    $initial = 15;
    /*  
        imagettftext permet d'écrire du texte dans notre image en utilisant une police au format ttf.
        premier argument : l'image dans laquelle écrire.
        second argument : taille en pixel pour le texte.
        troisième argument : un angle en degré. 
        quatrième et cinquième argument : position x et y.
        sixième argument : une couleur.
        septième argument : une police d'écriture.
        huitième argument : le texte à écrire.
    */
    imagettftext(
        $image,
        24,
        rand(-15, 15),
        $initial + $i*$letterSpace,
        rand(25, 45),
        $textColors[rand(0,1)],
        $fonts[array_rand($fonts)],
        $captchaStr[$i]
    );
}
// On indique que le résultat de la requête à ce fichier retourne une image de type PNG.
header("Content-type: image/png");
// On transforme notre objet GdImage au format png:
imagepng($image);
?>