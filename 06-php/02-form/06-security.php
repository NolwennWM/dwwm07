<?php 
session_start();
require "../ressources/service/_csrf.php";
/* 
    Une attaque connue possible sur un site web est l'attaque XSS (Cross-Site Scripting).
    Le principe de ce genre d'attaque, est d'insérer des scripts étranger à notre page.

    En développement, un des principes de base de la sécurité, est la phrase : 
    ! "Don't trust users"

    Pour se protéger des attaques XSS, on doit filtrer les entrées des utilisateurs.
    Cela on l'a déjà fait avec la fonction "htmlspecialchars()"
    D'autres sont utilisable comme "htmlentities()"
*/ 

/* 
    Dans le chapitre précédent, j'ai parlé de mot de passe hashé. 
    Ce terme obscure dont on entend peu parler au détriment de "chiffré" ou "crypté" est pourtant celui qui correspond le mieux.
        (crypté est un anglicisme, il correspond à chiffré)

    Un string chiffré peut être déchiffré. Plus ou moins difficilement selon la méthode utilisée.
    Un string hashé, ne peut pas revenir à la normal.

    Une messagerie sécurisé chiffrera les messages.
    Un site sécurisé, hashera les mots de passes.

    On a vu comment vérifier un mot de passe hashé dans le chapitre précédent.
    Mais pour hasher un mot de passe voici comment faire :
*/
$error = $password = "";
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['hash']))
{
    if(empty($_POST["password"]))
        $error = "Veuillez entrer un mot de passe";
    else
    {
        /* 
            Le mot de passe n'étant pas stocké en clair, ni affiché sur une page, 
            je n'ai pas besoin de l'assainir avec "htmlspecialchars()"
        */
        $password = trim($_POST["password"]);
        /* 
            "password_hash()" permet de hasher un mot de passe donné en premier argument.

            En second il prendra une constante prédéfini dans PHP, au choix entre :
                PASSWORD_DEFAULT
                PASSWORD_BCRYPT
                PASSWORD_ARGON2I
                PASSWORD_ARGON2ID
            
            Ce sont des constantes qui représente les différents algorythmes de hashage disponible dans PHP.

            PASSWORD_DEFAULT est un raccourci pour l'un des suivants défini par défaut par PHP.
            En PHP 8.1 "PASSWORD_DEFAULT" représente "PASSWORD_BCRYPT"

            Il est conseillé d'utiliser "DEFAULT" car il est automatiquement changé aux mises à jour de PHP si un meilleur algorythme est ajouté. 

            En troisième argument, on peut ajouter un tableau d'options pour modifier certains algorythme, mais pour cela référez vous à la documentation. 
            On pouvait par exemple avant changer le "cost" de BCRYPT mais maintenant la documentation conseille de ne pas le faire.
        */
        $password = password_hash($password, PASSWORD_DEFAULT);
        /* 
            Il nous reste à nous protéger des attaques CSRF et Brute force.
            (On parlera des injections SQL lorsque nous communiqueront avec la BDD)
        */
    }
    /* 
        Si aucun captcha n'est envoyé par le formulaire ou si il n'existe pas en session,
        ou si celui envoyé par le formulaire est différent de celui en session,
        J'ai une erreur.
    */
    if(!isset($_POST["captcha"], $_SESSION["captchaStr"]) || $_POST["captcha"] != $_SESSION["captchaStr"])
    $error = "Captcha incorrecte !";
    /* 
        On s'est protégé des bots via un captcha (celui ci est très simple, pour un site un peu pro, préférez un captcha développé par des professionnels)
        Mais on ne va pas placer de captcha sur tous nos formulaires, l'utilisateur en aura vite marre.
        Gardons celui ci pour les formulaires des utilisateurs non inscrit.

        Il nous reste une faille à voir, ce sont les attaques CSRF.
        L'attaque Cross Site Request Forgery
    */
    if(!isCSRFValid())
        $error = "La méthode utilisée n'est pas permise !";
}
$title = "Sécurité";
require "../ressources/template/_header.php";
?>
<form action="" method="post">
    <input type="password" name="password" placeholder="Mot de passe à hasher" required>
    <!-- début captcha -->
    <div>
        <label for="captcha">Veuillez recopier le texte ci-dessous pour valider :</label>
        <br>
        <img src="../ressources/service/_captcha.php" alt="CAPTCHA">
        <br>
        <input type="text" name="captcha" id="captcha" pattern="[A-Z0-9]{6}">
    </div>
    <!-- fin captcha -->
    <!-- début CSRF -->
    <?php setCSRF(5); ?>
    <!-- fin CSRF -->
    <input type="submit" name="hash" value="hasher">
    <br>
    <span class="error"><?php echo $error??"" ?></span>
</form>
<!-- Exemple d'attaque CSRF -->
<form action="http://php.localhost/02-form/02_post.php" method="post">
    <input type="text" name="username" placeholder="pseudonyme">
    <input type="hidden" name="food" value="welsh">
    <input type="hidden" name="drink" value="milkshake">
    <input type="hidden" name="cgu" value="cgu">
    <input type="submit" value="envoyer" name="meal">
</form>
<?php if(empty($error) && !empty($password)): ?>
    <!-- 
        On remarquera que si on hashe deux fois le même mot de passe, 
        On obtiendra des résultats différents.
    -->
    <div>
        Votre mot de passe hashé est :
        <?php echo $password ?>
    </div>
<?php 
endif;
require "../ressources/template/_footer.php";
?>