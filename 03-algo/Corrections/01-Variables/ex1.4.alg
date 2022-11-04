<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description courant="AFFICHER c" texte=""/>
    <extension extnom="inactif"/>
    <fonction fctetat="inactif" fctcode=""/>
    <F2 F2lignes="" F2para="" F2defaut="" F2etat="inactif"/>
    <repere repetat="inactif" repcode="-10#10#-10#10#2#2"/>
    <param totalBoucles="5000000" nbDecimales="8" totalAffichages="1000" epaisseurLigne="2" epaisseurPoint="2" arrondiAuto="vrai" maxBoucle="500000"/>
    <item code="200#declarationfonctions" algoitem="FONCTIONS_UTILISEES"/>
    <item code="100#declarationsvariables" algoitem="VARIABLES">
        <item code="1#NOMBRE#a" algoitem="a EST_DU_TYPE NOMBRE"/>
        <item code="1#NOMBRE#b" algoitem="b EST_DU_TYPE NOMBRE"/>
        <item code="1#NOMBRE#c" algoitem="c EST_DU_TYPE NOMBRE"/>
    </item>
    <item code="101#debutalgo" algoitem="DEBUT_ALGORITHME">
        <item code="5#a#3#pasliste" algoitem="a PREND_LA_VALEUR 3"/>
        <item code="5#b#10#pasliste" algoitem="b PREND_LA_VALEUR 10"/>
        <item code="5#c#a + b#pasliste" algoitem="c PREND_LA_VALEUR a + b"/>
        <item code="5#b#a + b#pasliste" algoitem="b PREND_LA_VALEUR a + b"/>
        <item code="5#a#c#pasliste" algoitem="a PREND_LA_VALEUR c"/>
        <item code="4#Valeur A : #0" algoitem="AFFICHER &quot;Valeur A : &quot;"/>
        <item code="3#a#1#pasliste" algoitem="AFFICHER a"/>
        <item code="4#Valeur B : #0" algoitem="AFFICHER &quot;Valeur B : &quot;"/>
        <item code="3#b#1#pasliste" algoitem="AFFICHER b"/>
        <item code="4#Valeur C : #0" algoitem="AFFICHER &quot;Valeur C : &quot;"/>
        <item code="3#c#0#pasliste" algoitem="AFFICHER c"/>
    </item>
    <item code="102#finalgo" algoitem="FIN_ALGORITHME"/>
</Algo>
