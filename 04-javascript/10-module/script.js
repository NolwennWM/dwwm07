"use strict";

/* 
    Ecmascript permet l'export et l'import de fonctions et objets entre autre choses.
    Cela va permettre de pouvoir diviser notre code sans avoir à devoir ajouter les fichiers dans le bon ordre dans le head de notre HTML.

    Pour cela la première chose à faire est d'ajouter l'attribut suivant à notre balise script :
        * type="module"
    ?----------------------- Export --------------------------
    Pour importer du code, il faut avant tout l'exporter, 
    pour cela rendons nous dans le fichier contenant ce que l'on souhaite exporter.

    On va ajouter l'un des mots clefs suivant devant ce que l'on va exporter :
        * export
        * export default
    On peut exporter autant d'élément que l'on souhaite, mais seul l'un d'entre eux peut profiter de "export default".
    ?------------------------ Import ----------------------------
    Par défaut, l'import ne peut se trouver qu'au "top level" du fichier
    C'est à dire que l'on ne peut pas le placer dans un block. (boucle, condition, fonction...)

    L'import va suivre la syntaxe suivante:
        le mot clef "import", suivi d'accolade, contenant l'élément ou les éléments que l'on souhaite importer (séparé d'une virgule)
        puis le mot clef "from" et enfin un string contenant le chemin vers le fichier à importer.
            * import {salut, coucou} from "./salutation.js";
        Si notre fichier contient un export default, on peut le récupérer en plaçant un nom avant les accolades.
        Ce nom n'a pas besoin d'être le même que celui de la fonction.
            * import b, {salut, coucou} from "./salutation.js";
        Dans le cas de l'importation de nombreux fichier, il n'est pas rare de se retrouver avec des fonctions de même nom (ou de nom trop long).
        il est alors possible de les renommer grâce au mot clef "as".
            * import b, {salut, coucou as c} from "./salutation.js";
        Si il y a de nombreuses choses à importer, au lieu de les lister on peut toute les importer d'un coup  grâce à "* as nomDeVariable":
            * import * as salutations from "./salutation.js";
            On obtient alors un objet contenant tous nos exports.
            L'export default est rangé dans "default" et non via son nom.
*/
import * as salutations from "./salutation.js";
console.log(salutations);
salutations.salut();
salutations.coucou("Maurice");
salutations.default();

window.addEventListener("keyup",e=>{if(e.key=="Enter")hello()});

/* 
    Pour importer des éléments situationnellement (dans un block par exemple).
    On ne peut pas utiliser le mot clef "import" qui doit être au top level du module.
    On va donc utiliser la fonction "import()" qui prend en argument le chemin vers le fichier et retourne une promesse.
    Cette promesse nous rendra un objet contenant tous les éléments exporté comme dans l'exemple précédent avec "* as"
*/
async function hello()
{
    const s = await import("./salutation.js");
    console.log(s);
    s.coucou("Charlotte")
    s.salut()
    s.default()
}
/* 
    On notera que le console log qui vient du fichier importé n'est lancé que la première fois.
    JS lorsque l'on tente d'importer plusieurs fois le même fichier.
    N'interprête le script que la première fois.
*/