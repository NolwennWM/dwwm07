<?php 
echo "<h1> WHILE </h1>";

$x = 0;
// Tant que la condition entre parenthèse est "true", l'action entre accolade sera répété.
while($x<5)
{
    echo $x, "<br>";
    $x++;
}
// syntaxe sans accolade :
while($x<10):
    echo $x, "<br>";
    $x++;
endwhile;
// syntaxe sur une seule ligne :
while($x<15)
    echo $x++, "<br>";

echo "<h2> DO WHILE </h2>";
// ici l'instruction sera réalisé au moins une fois, puis il vérifiera après si il doit la répéter.
do{
    echo $x, "<br>";
    $x++;
}while($x<5);
// syntaxe sur une seule ligne :
do
echo $x++, "<br>";
while($x<5);
#-----------------------------------------
echo "<h2> FOR </h2>";

/* 
    la boucle for est particulièrement adapté aux boucles numériques.
    elle est structuré ainsi :
        for(expr1;expr2;expr3){instruction à répéter}
    
    expr1 sera évalué avant de commencer la boucle.
    expr2 sera évalué au début de chaque itération et décidera si la boucle doit continuer ou non.
    expr3 sera évaué à la fin de chaque itération.
*/
for($y = 0; $y <5; $y++)
{
    echo $y, "<br>";
}
// structure en ":" et "end"
for($y = 0; $y <5; $y++):
    echo $y, "<br>";
endfor;
// structure sur une seule ligne :
for($y = 0; $y <5; $y++)
    echo $y, "<br>";
# -------------------------------------------
echo "<h2> FOREACH </h2>";
$a = ["spaghetti", "thon", "mayonnaise", "oignon"];
/* 
    foreach est spécialement adapté aux tableaux.
    Il fera une itération pour chaque élément du tableau.
    plaçant cet élément dans une variable.

    On utilisera le mot clef "as" pour indiquer quelle sera la variable qui accueillera les éléments du tableau.
*/
foreach($a as $food)
{
    echo $food, "<br>";
}
/* 
    En précisant deux variables séparé de "=>" après le as, on récupère 
    la clef en plus de la valeur.
    Cela peut être particulièrement utile sur un tableau associatif.
*/
foreach($a as $key => $value)
{
    echo $key . " : " . $value . " <br>";
}
// structure avec ":" et "end"
foreach($a as $v):
    echo $v, "<br>";
endforeach;
// structure sur une seule ligne 
foreach($a as $v)
    echo $v, "<br>";
# -------------------------------------------------
echo "<h2> CONTINUE et BREAK </h2>";
/* 
    les mots clef continue et break fonctionnent sur n'importe quel type de boucle.
    Continue met fin à l'itération actuel et passe à la suivante.
    Break met fin à la boucle.
*/
foreach($a as $food)
{
    if($food === "spaghetti") continue;
    if($food === "mayonnaise") break;
    echo $food, "<br>";
}
?>