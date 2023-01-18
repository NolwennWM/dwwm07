<?php 
// le namespace sera expliqué dans la partie 2;
namespace Cours\POO;

/* 
    En programmation procédurale, le code est lu de haut en bas et c'est tout.
    Parfois la procédurale est séparé de la fonctionnelle.
        Le code est lu de haut en bas mais de temps en temps appelle une fonction déclaré ailleurs.
    Puis la Programmation Orientée Objet.
        On instancie (crée) des objets qui contiennent des propriétés (variable) et des méthodes (fonction).
        Ces objets sont instanciés à partir de class(plan de construction)
    
    Pour déclarer une class, on utilisera le mot clef "class";
    Pour instancier une class, on utilisera le mot clef "new";

    Par convention, le nom d'une classe, commencera par une majuscule.
*/
// Je déclare ma classe.
class Chaussette{};
// J'instancie ma classe.
$a = new Chaussette();
/* 
    Comme dit plus haut, une classe peut contenir des propriétés et des méthodes.
    Leurs déclaration ne changent pas d'une déclaration de variable ou de fonction classique, si ce n'est qu'on les fera précédé d'un mot clef indiquant leur accessibilité. 
        - public
        - protected
        - private
*/
class Fruit
{
    public $famille = "végétal";
    public function talk()
    {
        echo "Je suis un fruit ! <br>";
    }
}
$f = new Fruit();
/* 
    Mon objet instancié possède toute les propriétés et méthodes de sa classe.
    Pour faire appelle à une proprité ou une méthode, je ferais suivre mon objet du caractère "->" puis le nom de la propriété ou méthode.
*/
// J'appelle ma méthode talk
$f->talk();
// J'appelle ma propriété famille
echo $f->famille, "<br>";
// Je change ma propriété famille
$f->famille = "être vivant";

# -------------------------THIS et PRIVATE -------------------
/* 
    Mes propriétés et méthodes publics sont accessibles peu importe où est ce qu'on les appelles.

    Or parfois, on a besoin que certaines propriétés et méthodes ne soit pas accessibles, elles sont là pour le fonctionnement interne de l'objet.

    C'est le rôle du mot clef "private", il rend les éléments accessible uniquement à l'interieur de l'objet.

    Pour accèder à une propriété ou méthode privée, on utilisera le mot clef "$this" qui fait référence à l'objet dans lequel il se trouve.
*/
class Humain
{
    private $age;
    public function setAge(int $a):void
    {
        if($a<0)
        {
            /* 
                Lorsqu'on appelle une propriété, 
                que ce soit dans ou hors de la classe, 
                le $ disparaît.
                Seul celui de $this ou de la variable contenant l'objet suffit.
            */
            $this->age = 0;
            return;
        }
        $this->age = $a;
    }
    public function getAge(): int
    {
        return $this->age;
    }
}

$h = new Humain();
// Fatal erreur car privé
// $h->age = 54;
$h->setAge(-25);
echo $h->getAge(), "<br>";

#-------------------CONSTRUCT et DESTRUCT ----------------------
/* 
    Les fonctions "__construct" et "__destruct" sont des fonctions prédéfinies qui se lancent automatiquement à la création et à la destruction de l'objet.

    Lorsque l'on instancie une classe, on utilise des parenthèses.
    Ces parenthèses peuvent être rempli avec des arguments qui seront automatiquement transmit à la fonction "__construct"
*/  
class Humain2
{
    public $nom;
    function __construct(string $nom)
    {
        /* 
            Une propriété non défini, sera automatiquement défini en public si on tente de lui attribuer une valeur.
            Mais il est de bon ton, de les définir.
        */
        $this->nom = $nom;
        echo $this->nom . " est né(e). <br>";
    }
    function __destruct()
    {
        echo $this->nom . " est mort(e). <br>";
    }
}
// Les messages de construct et destruct apparaissent alors que je n'ai appellé aucune méthode.
$h2 = new Humain2("Maurice");
/* 
    Les variables PHP sont automatiquement détruite à la fin de l'execution du code. 
    Donc destruct se fera à la fin.
*/
echo "Bonjour ! <br>";
// en détruisant ma variable moi même, mon message apparaît donc ici.
unset($h2);
echo "Bonsoir ! <br>";

#------------------------Chaînage des méthodes ---------------

/* 
    Si je prend mon fruit qui parle, et que je souhaite utiliser plusieurs fois la méthode talk.
    Je vais devoir écrire :
*/
$f->talk();
$f->talk();
$f->talk();
/* 
    Mais lorsque l'on a une méthode comme celle ci, qui ne retourne aucune valeur, ce qui se fait souvent, c'est de lui faire retourner "$this". 
    De cette façon, l'objet va se retourner lui même, et on va pouvoir enchaîner les méthodes sans réécrire sa variable.
*/
class Fruit2
{
    public function talk(): self
    {
        echo "Je suis un fruit ! <br>";
        return $this;
    }
}
$f2 = new Fruit2();
$f2 ->talk()
    ->talk()
    ->talk();

/* 
    Dans les astuces pour développer plus rapidement.
    Il est aussi possible de raccourcir le construct.

    Pour cela on va déclarer directement dans les parenthèses du construct, l'accesseur (public, private...) de notre argument
*/
class Fruit3
{
    function __construct(public string $nom)
    {}
}
$f3 = new Fruit3("Pomme");
/* 
    Je n'ai pas eu besoin de déclarer ma propriété, 
    PHP voyant que dans le construct, on a un accesseur, il a compris que cet argument deviendra une propriété, et l'a donc déclaré lui même.
*/
echo $f3->nom, "<br>";
#----------------------- CONSTANTE et STATIC ----------------------
/* 
    Une classe peut contenir des propriétés constantes représenté par le mot clef "const";
    ainsi que des méthodes statiques représentés  par le mot clef "static";

    Ces propriétés et méthodes ont la particularité d'être accessible sans instancier la classe.

    Pour appeller l'une de celles ci, on n'utilisera pas "->" mais "::"
*/
class Humain3
{
    public const MEMBRES = "2 bras, 2 jambes, un torse et une tête";
    public static function description()
    {
        /* 
            Ici je n'utilise pas le mot clef $this car il fait référence à l'instance de l'objet actuel.
            Or, mon objet n'est pas instancié.
            J'utilise donc le mot clef "self" qui fait référence à la classe.
        */
        echo "Un humain a en général ". self::MEMBRES."<br>";
    }
}
Humain3::description();
echo Humain3::MEMBRES, "<br>";
// On peut aussi les utiliser une fois instancié.
$h3 = new Humain3();
$h3::description();
#------------------------ Héritage ----------------------------
/* 
    Il est possible de faire hériter d'une classe à une nouvelle classe.
    C'est à dire que la nouvelle classe aura accès à toute les méthodes et propriété de son parent.

    Toute, pas exactement, celles qui sont private ne sont pas hérité.

    C'est là qu'entre en jeu le dernier accesseur, "protected"
    Il a le même rôle que "private" si ce n'est que les propriétés et méthodes seront héritées.
*/
class Humain4
{
    private $age = 20;
    protected $nom = "Maurice";
    private function loisir()
    {
        echo "J'aime le bowling depuis mes ". $this->age . " ans.<br>";
    }
    protected function talk()
    {
        echo "Bonjour, je me nomme ". $this->nom . ".<br>";
        $this->loisir();
    }
}
$h4 = new Humain4();
// Comme indiqué, protected à la même rôle que private, cela ne fonctionne donc pas :
// $h4->talk();

/* 
    Pour faire hériter d'une classe, on utilisera le mot clef "extends" suivi de la classe à hériter :
*/
class Pompier extends Humain4
{
    public function presentation()
    {
        echo "Je suis ". $this->nom . " le pompier. <br>";
        $this->talk();
        /* 
            On peut accèder aux propriétés protected
            mais pas aux privates.
        */
        // $this->loisir();
    }
}
$p = new Pompier();
$p->presentation();
/* 
    On peut hériter d'une classe qui a elle même hérité et ainsi de suite.
    La seule limite, est le mot clef "final", une classe avec ce mot clef ne pourra pas être hérité.
*/
final class Apprenti extends Pompier{}
$p2 = new Apprenti();
$p2->presentation();
// Ma classe enfant retourne une erreur car je tente de lui faire hériter d'une classe final.
// class enfant extends Apprenti{};

#----------------------- ABSTRACT ------------------------
/* 
    Les classes abstraites, sont des classes qui ne peuvent pas être instanciées.
    Elles ne servent qu'à être hérité. 
    Utile si plusieurs de vos classes doivent partager les mêmes fonctionnalités.
*/
abstract class Humanity
{
    protected $nom;
    public function talk()
    {
        echo "Je me nomme ". $this->nom."<br>";
    }
    /* 
        Les classes abstraites peuvent contenir des méthodes abstraites.
        Ce sont des méthodes déclaré mais non défini.

        C'est à dire que la classe qui héritera de ma classe abstraite
        se verra obligé à définir une méthode de même nom et avec les mêmes arguments.
    */
    abstract public function setName(string $n):self;
}
// ! Provoque une fatal error car abstraite.
// $nope = new Humanity();

class Policier extends Humanity
{
    /* 
        La seule obligation d'une méthode abstraite, est sur les arguments et le retour. 
        Pour le contenu même de la méthode, je suis libre de le changer d'une classe à une autre.
    */
    public function setName(string $n):self
    {
        $this->nom = $n;
        return $this;
    }
}
$po = new Policier();
$po ->setName("Charle")
    ->talk();

#---------------------- INTERFACES et TRAITS ------------------
/* 
    Une interface est semblable à une classe abstraite, à la différence que :
        Elle ne contient que des méthodes non défini et public;

    Un trait est semblable à une classe abstraite, à la différence que :
        Il ne contient que des propriétés et méthodes définie.

    On utilisera généralement l'interface comme un plan de construction pour une classe.
    Et le trait pour partager un outil en commun avec plusieurs classes.
*/
# Pour déclarer une interface, on utilise le mot clef "interface"
interface Ordinateur
{
    public function youtube(string $url);
    public function excel();
}
# Pour déclarer un trait, on utilise le mot clef "trait"
trait Electricity
{
    protected $volt = 230;
    public function description()
    {
        echo "Je me branche sur du ".$this->volt. " volts.<br>";
    }
}
/* 
    Pour utiliser une interface, on utilisera le mot clef "implements" après le mot clef "extends" si celui ci apparaît.

    Pour utiliser un trait, on utilisera le mot clef "use" à l'interieur même de la classe.
*/
class Asus implements Ordinateur
{
    use Electricity;
    // Sans ces deux fonctions suivantes, j'aurais une erreur à cause de l'interface
    function youtube(string $u)
    {
        echo "Je regarde $u sur youtube.";
    }
    function excel()
    {
        echo "Je fais mes comptes";
    }
}
$pc = new Asus();
$pc->description();
// Un ordinateur et un micro onde ont des rôles totalements différents, mais utilisent un même trait.
class MicroOnde{ use Electricity;}
$mo= new MicroOnde();
$mo->description();

?>