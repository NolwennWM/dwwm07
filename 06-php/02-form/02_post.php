<?php
$title = "Formulaire en POST";
require "../ressources/template/_header.php";

/* 
    La principale différence entre GET et POST, est la façon dont sont transmise les données.
    En GET elles sont visible dans l'URL, en POST elles sont transmise dans la requête de façon invisible.

    On utilisera généralement plutôt POST, surtout si on a des informations sensibles ou des fichiers à transmettre.
    Mais GET est souvent utiliser dans les formulaires de recherche pour rendre l'url de la recherche copiable.

    Au niveau du fichier, les seules différences sont :
        1. l'attribut methode du formulaire est passé à "POST"
        2. On vérifie si on arrive en méthode "POST" avant de traiter le formulaire.
        3. On récupère nos informations dans la superglobal "$_POST" et non "$_GET"
    
    Comme ça serait dommage d'arrêter le cours ici, on va améliorer notre formulaire :
        1. On va transformer nos tableaux de données en tableau associatif.
        2. Faire apparaître nos options et radios avec une boucle.
        3. Ajouter une classe "formError" à certaines de nos balises.
        4. Ajouter une case à cocher pour valider le formulaire.
        5. Faire que nos utilisateurs n'ai pas à remplir à nouveau les champs lorsqu'ils se trompent.
*/

# Une variable pour chaque entrée de mon formulaire.
$username = $food = $drink = "";
# Une variable pour mes erreurs.
$error = [];
# Les choix possibles pour l'utilisateur :
$foodList = [
    "welsh"=>"Welsh (car vive le fromage)", 
    "cannelloni"=>"Cannelloni (car les raviolis c'est surfait)",
    "oyakodon"=>"Oyakodon (car j'aime l'humour noir)"
];
$drinkList = [
    "jus de tomate"=>"Jus de Tomate (je suis un vampire)", 
    "milkshake"=>"Milkshake (aux fruits de préférence)", 
    "limonade"=> "Limonade (j'ai besoin de sucre)"
];

/* 
    On trouvera dans la superglobal $_SERVER, la méthode utilisé pour arrivé sur cette page.
    Par défaut, aller d'une page à une autre, se fait en méthode "POST"
*/
var_dump($_SERVER["REQUEST_METHOD"]);
/* 
    Pour commencer la vérification de mon formulaire, je vais vérifier deux points.
    Si la méthode correspond à celle de mon formulaire, (Ici "POST")
    et si j'ai au moins un champ de ce formulaire (par exemple celui du bouton submit).
*/
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["meal"]))
{
    // Si le champ "username" est vide, j'affiche un message d'erreur.
    if(empty($_POST["username"]))
        $error["username"] = "Veuillez entrer un nom d'utilisateur.";
    else
    {
        $username = cleanData($_POST["username"]);
        if(strlen($username) < 3 || strlen($username)>255)
            $error["username"] = "Votre nom d'utilisateur n'a pas une taille adapté.";
    }
    // On va maintenant vérifier un second champ
    if(empty($_POST["food"]))
        $error["food"] = "Veuillez choisir un repas!";
    else
    {
        $food = cleanData($_POST["food"]);
        // Je vérifie si le plât donné est bien une clef de ma liste de plât.
        if(!array_key_exists($food, $foodList))
            $error["food"] = "Ce repas n'existe pas !";
    }
    // Et mon dernier champ
    if(empty($_POST["drink"]))
        $error["drink"] = "Veuillez choisir une Boisson!";
    else
    {
        $drink = cleanData($_POST["drink"]);
        if(!array_key_exists($drink, $drinkList))
            $error["drink"] = "Cette boisson n'existe pas !";
    }
    if(empty($_POST["cgu"]))
        $error["cgu"] = "Veuillez accepter nos conditions d'utilisation.";
    else
    {
        $cgu = $_POST["cgu"];
        if($cgu != "cgu")
            $error["cgu"] = "Ne modifiez pas notre formulaire !";
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
<form action="" method="post">
    <input 
        type="text" 
        placeholder="Entrez un nom" 
        name="username"
        class="<?php echo (empty($error["username"])?"":"formError") ?>"
        value="<?php echo $username ?>">
        <!-- Si j'ai une erreur qui correspond au champ, alors je lui ajoute la classe "formError" -->
    <span class="error"><?php echo $error["username"]??"" ?></span>
    <br>
    <fieldset 
        class="<?php echo (empty($error["food"])?"":"formError") ?>">
        <legend>
            Nourriture Favorite
        </legend>
        <!-- J'ajoute un champ input avec son label pour chaque élément de mon tableau "$foodList" -->
        <?php foreach($foodList as $k => $f): ?>
            <input 
                type="radio" 
                name="food" 
                id="<?php echo $k ?>" 
                value="<?php echo $k ?>"
                <?php echo $food===$k?"checked":"" ?>>
            <label for="<?php echo $k ?>"><?php echo $f ?></label>
            <br>
        <?php endforeach; ?>
        <span class="error"><?php echo $error["food"]??"" ?></span>
    </fieldset>
    <label for="boisson">Boisson Favorite</label>
    <select 
    name="drink" 
    id="boisson"
    class="<?php echo (empty($error["drink"])?"":"formError") ?>">
    <!-- 
        J'ai ajouté la classe formError à mon select si il y a une erreur, 
        et j'ajoute une option pour chaque élément du tableau $drinkList 
    -->
    <option value="">Veuillez choisir une boisson</option>
        <?php foreach($drinkList as $k => $d): ?>
            <!-- On place l'attribut selected sur l'option qui correspond au choix de l'utilisateur -->
            <option 
                value="<?php echo $k ?>"
                <?php echo $drink===$k?"selected":"" ?>>
                <?php echo $d ?>
            </option>
        <?php endforeach; ?>
    </select>
    <span class="error"><?php echo $error["drink"]??"" ?></span>
    <br>
    <!-- Une checkbox cgu pour valider le formulaire. -->
    <input type="checkbox" name="cgu" id="cgu" value="cgu">
    <label for="cgu">J'accepte que mes données ne m'appartiennent plus.</label>
    <span class="error"><?php echo $error["cgu"]??"" ?></span>
    <br>
    <input type="submit" value="Envoyer" name="meal">
</form>
<!-- 
    Si notre formulaire a été soumis et sans erreur, je vais afficher la partie suivante :
 -->
<?php if(empty($error) && isset($_POST["meal"])): ?>
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