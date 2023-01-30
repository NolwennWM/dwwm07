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
        /* 
            Un problème avec l'upload de fichier, c'est la possibilité que deux fichiers portent le même nom.
            On aura donc la possibilité de renommer le fichier.

            Ici, j'utilise "uniqid()" pour générer un string aléatoire à concatener au nom du fichier.
            Par défaut il génère 13 caractères, mais si son second paramètre est à true, il passe alors à 23.
            Son premier paramètre permet d'y ajouter un prefix.
        */
        $target_name = uniqid(time()."-", true)."-".$oldName;
        // var_dump($target_name);
        /* 
            Je concatène le chemin vers le dossier "upload" au nom du fichier.

            Je ne le fais pas ici mais je pourrais créer des dossiers par mois ou par utilisateur.
            Pour cela j'utiliserais "is_dir()" pour vérifier si le dossier existe déjà. 
            Et "mkdir()" pour créer un nouveau dossier.

            Ensuite je n'aurais plus qu'à l'ajouter à mon chemin ci dessous.
        */
        $target_file = $target_dir . $target_name;
        /* 
            J'utilise "mime_content_type" pour aller vérifier le contenu de mon fichier dans sa zone temporaire,
            Puis en déduire le type mime.
            Cela est plus sécurisé que de juste vérifier l'extension, qui peut être facilement changé.
        */
        $mime_type = mime_content_type($_FILES["superFichier"]["tmp_name"]);
        /* 
            Bien qu'inutile vu le surnom que j'ai donné à mon fichier plus tôt,
            Je vérifie si j'ai déjà un fichier de même nom dans mon dossier d'upload.
        */
        if(file_exists($target_file))
            $error = "Ce fichier existe déjà";
        /* 
            Je vérifie la taille de mon fichier, 
            il ne faudrait pas que l'utilisateur téléverse des fichiers de plusieurs giga.
            la taille est donnée en "octet" donc vous pouvez voir assez grand, ici avec 500 000 on n'est même pas à 1mo.

            Rappel que la taille maximum d'upload ainsi que de donnée envoyé en POST ont un paramètre modifiable dans le fichier "php.ini".
        */
        if($_FILES["superFichier"]["size"] > 500000)
            $error = "Ce fichier est trop gros.";
        /* 
            Enfin on vérifie si le type mime du fichier est dans notre tableau de type mime acceptés.
        */
        if(!in_array($mime_type, $typePermis))
            $error = "Ce type de fichier n'est pas accepté.";
        // Si on a aucune erreur.
        if(empty($error))
        {
            /* 
                "move_uploaded_file" va déplacé un fichier depuis sa zone temporaire jusqu'à son emplacement définitif.

                Elle retournera un boolean indiquant si le déplacement s'est bien passé.

                Ici placé directement dans un if pour ajuster la suite selon si le fichier a bien été déplacé.
            */
            if(move_uploaded_file($_FILES["superFichier"]["tmp_name"], $target_file))
            {
                // Si tout s'est bien passé, on pourra sauvegarder le nom en BDD.
            }
            else
                $error = "Erreur lors du téléversage";
        }
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