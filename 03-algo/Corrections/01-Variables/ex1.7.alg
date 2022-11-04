<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description texte="" courant="AFFICHER c"/>
    <extension extnom="inactif"/>
    <fonction fctcode="" fctetat="inactif"/>
    <F2 F2defaut="" F2lignes="" F2etat="inactif" F2para=""/>
    <repere repcode="-10#10#-10#10#2#2" repetat="inactif"/>
    <param arrondiAuto="vrai" epaisseurLigne="2" nbDecimales="8" epaisseurPoint="2" totalBoucles="5000000" totalAffichages="1000" maxBoucle="500000"/>
    <item algoitem="FONCTIONS_UTILISEES" code="200#declarationfonctions"/>
    <item algoitem="VARIABLES" code="100#declarationsvariables">
        <item algoitem="a EST_DU_TYPE NOMBRE" code="1#NOMBRE#a"/>
        <item algoitem="b EST_DU_TYPE NOMBRE" code="1#NOMBRE#b"/>
        <item algoitem="c EST_DU_TYPE NOMBRE" code="1#NOMBRE#c"/>
        <item algoitem="d EST_DU_TYPE NOMBRE" code="1#NOMBRE#d"/>
    </item>
    <item algoitem="DEBUT_ALGORITHME" code="101#debutalgo">
        <item algoitem="a PREND_LA_VALEUR 10" code="5#a#10#pasliste"/>
        <item algoitem="b PREND_LA_VALEUR 20" code="5#b#20#pasliste"/>
        <item algoitem="c PREND_LA_VALEUR 30" code="5#c#30#pasliste"/>
        <item algoitem="d PREND_LA_VALEUR c&#x9;&#x9;&#x9;// d prend la valeur de c (30)" code="5#d#c&#x9;&#x9;&#x9;// d prend la valeur de c (30)#pasliste"/>
        <item algoitem="c PREND_LA_VALEUR b&#x9;&#x9;&#x9;// c prend la valeur de b (20)" code="5#c#b&#x9;&#x9;&#x9;// c prend la valeur de b (20)#pasliste"/>
        <item algoitem="b PREND_LA_VALEUR a&#x9;&#x9;&#x9;// b prend la valeur de a (10)" code="5#b#a&#x9;&#x9;&#x9;// b prend la valeur de a (10)#pasliste"/>
        <item algoitem="a PREND_LA_VALEUR d&#x9;&#x9;&#x9;// a prend la valeur de d (30)" code="5#a#d&#x9;&#x9;&#x9;// a prend la valeur de d (30)#pasliste"/>
        <item algoitem="AFFICHER &quot;Valeur pour a : &quot;" code="4#Valeur pour a : #1"/>
        <item algoitem="AFFICHER a" code="3#a#1#pasliste"/>
        <item algoitem="AFFICHER &quot;Valeur pour b : &quot;" code="4#Valeur pour b : #1"/>
        <item algoitem="AFFICHER b" code="3#b#1#pasliste"/>
        <item algoitem="AFFICHER &quot;Valeur pour c : &quot;" code="4#Valeur pour c : #1"/>
        <item algoitem="AFFICHER c" code="3#c#1#pasliste"/>
    </item>
    <item algoitem="FIN_ALGORITHME" code="102#finalgo"/>
</Algo>
