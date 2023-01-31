<?php 
session_start();
require "../ressources/service/_mailer.php";
$email = $subject = $body = $envoi = "";
$error = [];
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['contact']))
{
    if(empty($_POST["email"]))
        $error["email"] = "Veuillez entrer un email";
    else
    {
        $email = cleanData($_POST["email"]);
        /* 
            La fonction filter_var permet de filtrer une variable.
            Elle prend la variable en premier argument,
            Et en second, une constante représentant le filtre à appliquer.

            Il y a deux types de filtre, 
                FILTER_SANITIZE_... return la variable assaini selon le filtre choisi.
                FILTER_VALIDATE_... return un boolean selon si la variable correspond ou non
        */
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            $error["email"] = "Veuillez entrer un email valide";
    }
    if(empty($_POST["sujet"]))
        $error["sujet"] = "Veuillez entrer un sujet";
    else
    {
        $subject = cleanData($_POST["sujet"]);
        /* 
            preg_match permet de vérifier un string via une REGEX.
            Il prendra en premier paramètre, la regex sous forme de string.
            et en second, le string à vérifier.
            Il retournera un boolean.
        */
        if(!preg_match("/^[a-z éèàùçê]{5,}$/i", $subject))
            $error["sujet"] = "Certains caractères ne sont pas accepté";
    }
    if(empty($_POST["corps"]))
        $error["corps"] = "Veuillez entrer un message";
    else
        $body = cleanData($_POST["corps"]);
    
    if(!isset($_POST["captcha"], $_SESSION["captchaStr"]) || $_POST["captcha"] != $_SESSION["captchaStr"])
        $error["captcha"] = "CAPTCHA incorrecte !";

    if(empty($error))
    {
        $envoi = sendMail(
            $email,
            "cours@nolwenn.fr",
            $subject,
            $body
        );
    }
}
function cleanData(string $data):string
{
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
    // return htmlspecialchars(stripslashes(trim($data)));
}
$title = "Email";
require "../ressources/template/_header.php";
// J'affiche un message indiquant si mon envoi d'email s'est bien passé.
if(!empty($envoi)):
?>
<p>
    <?php echo $envoi ?>
</p>
<?php endif; ?>
<form action="" method="post">
    <input type="email" name="email" placeholder="Votre Email">
    <span class="error"><?php echo $error["email"]??"" ?></span>
    <br>
    <input type="text" name="sujet" placeholder="Sujet de votre message">
    <span class="error"><?php echo $error["sujet"]??"" ?></span>
    <br>
    <textarea name="corps" placeholder="Votre message" cols="30" rows="10"></textarea>
    <span class="error"><?php echo $error["corps"]??"" ?></span>
    <br>
    <div>
        <label for="captcha">Veuillez recopier le captcha</label>
        <br>
        <img src="../ressources/service/_captcha.php" alt="captcha">
        <br>
        <input type="text" name="captcha" id="captcha" pattern="[A-Z0-9]{6}">
        <span class="error"><?php echo $error["captcha"]??"" ?></span>
    </div>
    <input type="submit" value="Envoyer" name="contact">
</form>
<?php 
require "../ressources/template/_footer.php";
?>