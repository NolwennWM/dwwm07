<?php 
/* 
    Résumons ce que l'on a vu :
        1. Il est important de placer le fichier contenant vos informations de connexion, dans un dossier inaccessible aux utilisateurs.
        2. Au lieu de répéter à chaque fois la connexion à la BDD dans chaque fichiers où vous en avez besoin. 
            On peut se contenter de le faire dans un fichier externe importé.
        3. Si des informations rentrées par l'utilisateur sont requise dans votre requête SQL.
            Il faut faire une requête préparé afin d'éviter les injections SQL.
*/
// connexion à la BDD :
$pdo = new PDO(
    "mysql:host=localhost;port=3306;dbname=bieres;charset=utf8mb4",
    "root",
    "",
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        // PDO::ATTR_EMULATE_PREPARES => false
    ]
);
// Vous retrouverez les commentaires détaillés dans le fichier "_pdo.php";
// * Requête simple :
$sql = $pdo->query("SELECT * FROM couleur");
echo '<pre>'.print_r($sql->fetchAll(), 1).'</pre>';

// * Requête préparé anonyme :
$sql = $pdo->prepare("SELECT * FROM couleur WHERE NOM_COULEUR = ?");
$sql->execute(["Blanche"]);
echo '<pre>'.print_r($sql->fetch(), 1).'</pre>';

// * Requête préparé nommée :
$sql = $pdo->prepare("SELECT * FROM couleur WHERE NOM_COULEUR = :col");
$sql->execute(["col"=>"Brune"]);
echo '<pre>'.print_r($sql->fetch(), 1).'</pre>';
/* 
    Pour la méthode execute, il n'y a que deux types possibles:
        *string ou null.
    Parfois on a besoin de plus de précision.

    Par exemple, si on laisse activé l'émulation des requêtes préparés de PDO.
    On va avoir un problème si on execute un paramètre avec "LIMIT". 
    Ce dernier n'accepte que des chiffres et execute transforme notre chiffre en string.
*/
$sql = $pdo->prepare("SELECT * FROM couleur LIMIT :lim");
// Provoque une erreur si prepare émulé par PDO.
// $sql->execute(["lim"=>10]);
/* 
    Pour passer outre cette erreur, il va falloir indiquer le titre du paramètre.
    Pour cela on va utiliser les méthodes bindValue ou bindParam;
    On peut leur indiquer le type du paramètre via les constantes suivantes :
        - PDO::PARAM_NULL
        - PDO::PARAM_BOOL
        - PDO::PARAM_INT
        - PDO::PARAM_STR
*/
$sql->bindValue("lim", 2, PDO::PARAM_INT);
$sql->execute();
// On ne peut pas à la fois bind des paramètres et en donner à execute.

echo '<pre>'.print_r($sql->fetchAll(), 1).'</pre>';
// La principale différence entre bindValue et bindParam se fera ua niveau de "quand est ce que la valeur sera enregistré".

$couleur = "Blanche";
$sql = $pdo->prepare("SELECT * FROM couleur WHERE NOM_COULEUR = :col");
$sql->bindValue("col", $couleur, PDO::PARAM_STR);
$couleur = "Ambrée";
$sql->execute();
echo '<pre>'.print_r($sql->fetchAll(), 1).'</pre>';
/*  
    bindValue va lier à la requête la valeur de la variable à l'instant où elle est utilisé. 
    Alors que bindParam va lier à la requête la variable et ne récupère sa valeur qu'au moment de l'execute.
*/
$couleur = "Blanche";
$sql = $pdo->prepare("SELECT * FROM couleur WHERE NOM_COULEUR = :col");
$sql->bindParam("col", $couleur, PDO::PARAM_STR);
$couleur = "Ambrée";
$sql->execute();
echo '<pre>'.print_r($sql->fetchAll(), 1).'</pre>';

?>