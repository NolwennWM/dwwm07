<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description texte="" courant="AFFICHER c"/>
    <extension extnom="inactif"/>
    <fonction fctetat="inactif" fctcode=""/>
    <F2 F2etat="inactif" F2lignes="" F2defaut="" F2para=""/>
    <repere repetat="inactif" repcode="-10#10#-10#10#2#2"/>
    <param epaisseurPoint="2" totalBoucles="5000000" epaisseurLigne="2" nbDecimales="8" arrondiAuto="vrai" maxBoucle="500000" totalAffichages="1000"/>
    <item code="200#declarationfonctions" algoitem="FONCTIONS_UTILISEES"/>
    <item code="100#declarationsvariables" algoitem="VARIABLES">
        <item code="1#CHAINE#a" algoitem="a EST_DU_TYPE CHAINE"/>
        <item code="1#CHAINE#b" algoitem="b EST_DU_TYPE CHAINE"/>
        <item code="1#CHAINE#c" algoitem="c EST_DU_TYPE CHAINE"/>
    </item>
    <item code="101#debutalgo" algoitem="DEBUT_ALGORITHME">
        <item code="5#a#&quot;423&quot;#pasliste" algoitem="a PREND_LA_VALEUR &quot;423&quot;"/>
        <item code="5#b#&quot;12&quot;#pasliste" algoitem="b PREND_LA_VALEUR &quot;12&quot;"/>
        <item code="5#c#a + b#pasliste" algoitem="c PREND_LA_VALEUR a + b"/>
        <item code="4#Valeur A: #1" algoitem="AFFICHER &quot;Valeur A: &quot;"/>
        <item code="3#a#1#pasliste" algoitem="AFFICHER a"/>
        <item code="4#Valeur B: #1" algoitem="AFFICHER &quot;Valeur B: &quot;"/>
        <item code="3#b#1#pasliste" algoitem="AFFICHER b"/>
        <item code="4#Valeur C: #1" algoitem="AFFICHER &quot;Valeur C: &quot;"/>
        <item code="3#c#1#pasliste" algoitem="AFFICHER c"/>
    </item>
    <item code="102#finalgo" algoitem="FIN_ALGORITHME"/>
</Algo>
