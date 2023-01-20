<?php 
/* 
    Ici nous allons voir l'upload de fichier.
    Même si on ne touchera pas à la BDD ici, il est important de savoir que en BDD, nous ne sauvegardons que le nom du fichier.
    le fichier en lui même est sauvegardé sur notre serveur, comme tout fichier déjà présent.
*/
$error = $target_file = $target_name = $mime_type = $oldName = "";
/* 
    $target_dir contient le chemin vers le dossier où l'on rangera nos fichiers.
    Pour des raisons de sécurités, si ce sont des fichiers accessible par les utilisateurs (exemple photo de profil).
    Il vaudra mieux ranger vos fichiers téléversés dans un dossier "public" loins du fonctionnement de votre site.
    Le chemin vers vos fichier étant visible.
*/
$target_dir = "./upload/";
// la liste des types mimes dont j'accepte l'upload.
$typePermis = ["image/png", "image/jpeg", "image/gif", "application/pdf"];
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['upload']))
{
    /* 
        Lors de l'upload d'un fichier, le serveur va sauvegarder le fichier dans un dossier temporaire, 
        dossier dont il sera supprimé une fois l'execution du script terminé.
        On va donc vérifier notre fichier, et si il correspond le déplacer ailleurs.

        La première étape est de vérifier si l'upload s'est bien passé.
        Pour cela on va utiliser la variable superGlobal $_FILES.

        Elle contiendra un tableau associatif au nom de l'attribut name de notre input:file (ici "superFichier")
        qui contiendra lui même un autre tableau associatif avec plusieurs informations liées au fichier.
    */
    // echo '<pre>'.print_r($_FILES, 1).'</pre>';
    // Dans "tmp_name" on va retrouver le chemin vers le fichier temporaire.
    if(!is_uploaded_file($_FILES["superFichier"]["tmp_name"]))
        $error = "Aucun fichier téléversé !";
    else
    {
        /* 
            On trouvera le nom d'origine du fichier à la clef "name". 
            basename() va retourner le dernier composant d'un chemin.
        */
        $oldName = basename($_FILES["superFichier"]["name"]);
    }
}
$title = "Upload de Fichier";
require "../ressources/template/_header.php";
?>
<form action="" method="post" enctype="multipart/form-data">
    <label for="fichier">Choisir un Fichier :</label>
    <input type="file" name="superFichier" id="fichier">

    <input type="submit" value="Envoyer" name="upload">
    <span class="error"><?php echo $error??"" ?></span>
</form>
<?php if(isset($_POST["upload"]) && empty($error)): ?>
    <p>
        Votre fichier a bien été téléversé sous le nom "<?php echo $target_name ?>" <br>
        Vous pouvez le télécharger <br>
        <a 
            href="<?php echo $target_file ?>" 
            download="<?php echo $oldName?>">
            ICI
        </a>
    </p>
<?php 
endif;
require "../ressources/template/_footer.php";
?>