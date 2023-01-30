<?php 
// Je démarre la session à laquelle je peux optionnellement donnée une durée de vie.
session_start();
/* 
    Une page connexion n'est censé être accessible que si on est déconnecté. 
    On va donc rediriger l'utilisateur si il est connecté
*/
if(isset($_SESSION["logged"]) && $_SESSION["logged"] === true)
{
    header("Location: /");
    exit;
}
$email = $password = "";
$error = [];

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login']))
{
    // Je vérifie l'email
    if(empty($_POST["email"]))
        $error["email"] = "Veuillez entrer un email";
    else
        $email = trim($_POST["email"]);
    // Je vérifie le mot de passe.
    if(empty($_POST["password"]))
        $error["password"] = "Veuillez entrer un password";
    else
        $password = trim($_POST["password"]);
    
    if(empty($error))
    {
        /* 
            Normalement on devrait se servir d'une BDD mais cet exemple utilisera un fichier JSON.

            "file_get_content" va nous permettre de récupérer le contenu du fichier donné en argument.

            Le fichier étant de type json, on va utiliser "json_decode" pour récupérer les informations du fichier.
                Ce dernier rend les informations sous forme d'objet.
                Mais si on préfère traiter l'information sous forme de tableau associatif, on peut lui donner un boolean à true en second argument.
            
            On ne l'utilisera pas ici, mais pour transformer des données php en json, c'est "json_encode"
        */
        $data = file_get_contents("../ressources/users.json");
        // var_dump($data);
        $users = json_decode($data, true);
        // var_dump($users);
        // On vérifie si on a un utilisateur avec l'adresse fourni par le formulaire.
        $user = $users[$email]?? false;
        // Si on a trouvé un utilisateur alors :
        if($user)
        {
            /* 
                Si on regarde les différents mots de passe de nos utilisateurs, on remarquera qu'ils commencent tous de la même manière.
                Cela est dû au fait qu'ils ont tous été hashé avec le même algorythme.

                Cs infos vont suffire à la fonction "password_verify" pour comparer le mot de passe en clair avec le mot de passe hashé. 

                Elle nous rendra un boolean, indiquant si cela correspond ou non.
            */
            if(password_verify($password, $user["password"]))
            {
                /* 
                    Si le mot de passe est bon, on va pouvoir enregistrer notre utilisateur comme connecté. 
                    Pour cela on va enregistrer en session une propriété "logged" à true.

                    Puis si on a besoin d'utiliser des informations de notre utilisateur, ailleurs sur le site, on peut aussi les sauvegardes en session.

                    Et optionnellement, on peut ajouter une durée de vie à la connexion.
                */
                $_SESSION["logged"] = true;
                $_SESSION["username"] = $user["username"];
                $_SESSION["expire"] = time() + (60*60);
                // Enfin nous redirigeons notre utilisateur, vers une autre page.
                header("location: /");
                exit;
            }
            else
                $error["login"] = "Email ou Mot de Passe incorrecte (password)";
        }
        else
            $error["login"] = "Email ou Mot de passe incorrecte. ( TODO: retirer cette parenthèse email)";
    }
}

$title = "Connexion";
require "../ressources/template/_header.php";
?>
<form action="" method="post">
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    <br>
    <span class="error"><?php echo $error["email"]??"" ?></span>
    <br>
    <label for="password">Mot de Passe</label>
    <input type="password" name="password" id="password">
    <br>
    <span class="error"><?php echo $error["password"]??"" ?></span>
    <br>
    <input type="submit" value="Connexion" name="login">
    <br>
    <span class="error"><?php echo $error["login"]??"" ?></span>
</form>
<?php 
require "../ressources/template/_footer.php";
?>