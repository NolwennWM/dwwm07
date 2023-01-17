<?php 
/* 
    Include et require permettent d'inclure d'autres fichiers dans notre code.

    Nous avons créé plusieurs fichiers commençant par un "_".
    C'est juste une convention de nommage pour indiquer que ce sont des fichiers à inclure, ils ne doivent pas être ouvert seul.

    require et include peuvent ou non prendre des parenthèses.
*/
$title = "Include et Require";
$mainClass = "includeNav";
/* 
    Les variables déclaré avant un include sont utilisable dans le fichier inclu.
*/
require "../ressources/template/_header.php";
/* 
    Principale différence entre require et include :
        require en cas d'erreur provoque une fatal error et met fin à votre code.
        include provoque un warning et continue de votre code.
*/
include "../ressources/template/_nav.php";
?>
<div>
    <p id="para1">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem obcaecati iste qui cupiditate quia placeat mollitia, quaerat aperiam harum explicabo, corrupti at ad suscipit! Iure eius odit iusto accusamus necessitatibus!
    </p>
    <p id="para2">
        Beatae, modi odit numquam quo assumenda facilis dolore aspernatur perferendis minus soluta earum tempore vero doloremque doloribus minima dolorum illo incidunt repellendus tenetur obcaecati nobis. Animi commodi optio deserunt laborum.
    </p>
    <p id="para3">
        Non, enim itaque. Rem repellat dolore dicta reiciendis, temporibus amet id quia? Explicabo blanditiis voluptatibus, pariatur porro rem numquam, sequi debitis accusamus fugiat earum repellendus. Cupiditate ipsam velit quibusdam labore.
    </p>
    <p id="para4">
        Minus autem hic eligendi officia rerum corporis itaque cupiditate. Fuga minima, alias autem nisi harum quia et non excepturi nesciunt iure dicta tempora beatae dolorem cum quod. Esse, laudantium harum.
    </p>
    <p id="para5">
        Cum dignissimos ipsa sint rem facere numquam ipsam, atque expedita consectetur necessitatibus esse nam saepe iure exercitationem ullam natus. Architecto corrupti magni repudiandae illo voluptatibus eum quisquam deserunt rem distinctio.
    </p>
</div>
<?php 
    /* 
        Dans le cas d'une application complexe avec plusieurs inclusions.
        Les chemins relatifs peuvent ne plus être bon.
        Pour éviter cela on peut utiliser la constante "__DIR__"
        Cette constante donne le chemin absolu du fichier dans lequel elle est appelé.
        (elle ne termine pas par un "/" donc pensez à commencer votre chemin par un "/")
    */
    echo __DIR__."/../ressources/template/_footer.php";
    require __DIR__."/../ressources/template/_footer.php"; 
    /* 
        include_once et require_once sont un peu plus lent car ils vérifient avant d'inclure si l'élément n'a pas déjà été inclu.
    */
    require_once "../ressources/template/_footer.php"; 
?>