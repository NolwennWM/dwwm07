<?php
$title = "Formulaire en GET";
require "../ressources/template/_header.php";

/* 
    On retrouvera les informations envoyé par un formulaire en méthode "GET" dans la variable 
    super global "$_GET".
    Elle s'utilise tel un tableau associatif, dont chaque entrée correspond à l'attribut "name" de notre
    input.
*/
// var_dump($_GET);
/* 
    Il est important de vérifier l'existence de notre donnée dans la variable $_GET.
    Si on arrive ici sans avoir validé le formulaire, des erreurs apparaîtrons si on tente d'utiliser
    les données du formulaire.
*/
if(isset($_GET["username"]))
{
    $username = $_GET["username"];
}
/* 
    Optionnellement, on peut déclarer en début de fichier PHP, les différentes variables que l'on va utiliser.
    Cela permet de préciser ce qu'elles vont contenir et gérer la possibilité qu'elles soit utilisées sans passer par une condition suivante.
*/
# Une variable pour chaque entrée de mon formulaire.
$username = $food = $drink = "";
# Une variable pour mes erreurs.
$error = [];
# Les choix possibles pour l'utilisateur :
$foodList = ["welsh", "cannelloni", "oyakodon"];
$drinkList = ["jus de tomate", "milkshake", "limonade"];

/* 
    On trouvera dans la superglobal $_SERVER, la méthode utilisé pour arrivé sur cette page.
    Par défaut, aller d'une page à une autre, se fait en méthode "GET"
*/
var_dump($_SERVER["REQUEST_METHOD"]);
/* 
    Pour commencer la vérification de mon formulaire, je vais vérifier deux points.
    Si la méthode correspond à celle de mon formulaire, (Ici "GET")
    et si j'ai au moins un champ de ce formulaire (par exemple celui du bouton submit).
*/
if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["meal"]))
{
    // Si le champ "username" est vide, j'affiche un message d'erreur.
    if(empty($_GET["username"]))
        $error["username"] = "Veuillez entrer un nom d'utilisateur.";
    else
    {
        $username = cleanData($_GET["username"]);
        if(strlen($username) < 3 || strlen($username)>255)
            $error["username"] = "Votre nom d'utilisateur n'a pas une taille adapté.";
    }
    // On va maintenant vérifier un second champ
    if(empty($_GET["food"]))
        $error["food"] = "Veuillez choisir un repas!";
    else
    {
        $food = cleanData($_GET["food"]);
        // Je vérifie si le plât donné est bien dans ma liste de plât existante.
        if(!in_array($food, $foodList))
            $error["food"] = "Ce repas n'existe pas !";
    }
    // Et mon dernier champ
    if(empty($_GET["drink"]))
        $error["drink"] = "Veuillez choisir une Boisson!";
    else
    {
        $drink = cleanData($_GET["drink"]);
        if(!in_array($drink, $drinkList))
            $error["drink"] = "Cette boisson n'existe pas !";
    }
    /* 
        Si on devait faire un ajout en BDD,
        c'est après toute ces vérifications, 
        donc ici que l'on ferait l'ajout.
    */
}
/**
 * Nettoie le string donné en argument afin de le sécuriser.
 *
 * @param string $data
 * @return string $data nettoyé
 */
function cleanData(string $data): string
{
    // On se sert de trim pour supprimer les espaces accidentels qui pourrait se trouver en début ou en fin de string.
    $data = trim($data);
    // On retire les possibles "\" présent dans le string.
    $data = stripslashes($data);
    // On remplace les caractères HTML tel que "<" par leurs code non interprété comme "&lt;".
    return htmlspecialchars($data);
}
?>
<form action="" method="get">
    <input type="text" placeholder="Entrez un nom" name="username">
    <span class="error"><?php echo $error["username"]??"" ?></span>
    <br>
    <fieldset>
        <legend>
            Nourriture Favorite
        </legend>
        <input type="radio" name="food" id="welsh" value="welsh">
        <label for="welsh">Welsh (car vive le fromage)</label>
        <br>
        <input type="radio" name="food" id="cannelloni" value="cannelloni">
        <label for="cannelloni">Cannelloni (car les raviolis c'est surfait)</label>
        <br>
        <input type="radio" name="food" id="oyakodon" value="oyakodon">
        <label for="oyakodon">Oyakodon (car j'aime l'humour noir)</label>
        <span class="error"><?php echo $error["food"]??"" ?></span>
    </fieldset>
    <label for="boisson">Boisson Favorite</label>
    <select name="drink" id="boisson">
        <option value="jus de tomate">Jus de Tomate (je suis un vampire)</option>
        <option value="milkshake">Milkshake (aux fruits de préférence)</option>
        <option value="limonade">Limonade (J'ai besoin de sucre)</option>
    </select>
    <span class="error"><?php echo $error["drink"]??"" ?></span>
    <br>
    <!-- 
        Si ma page a plusieurs formulaire différents à traiter, je peux par exemple ajouter un name au submit pour vérifier quel formulaire a été envoyé. 
        Sinon je change l'action du formulaire, pour que les différents formulaires soit traité par une page différente.
    -->
    <input type="submit" value="Envoyer" name="meal">
</form>
<!-- 
    Si notre formulaire a été soumis et sans erreur, je vais afficher la partie suivante :
 -->
<?php if(empty($error) && isset($_GET["meal"])): ?>
    <!-- 
        On peut encapsuler du HTML dans une condition ou une boucle PHP.
        La fermeture de la balise PHP, ne met pas fin à la condition, 
        Elle attend toujours qu'on réouvre PHP pour fermer la condition.
        Le HTML ci dessous s'affichera donc que si la condition est true.
     -->
    <h2>Super Repas !</h2>
    <p>
        <?php echo "Pour $username, le meilleur repas est \"$food\" avec \"$drink\"." ?>
    </p>
<?php
endif;
require "../ressources/template/_footer.php";
?>