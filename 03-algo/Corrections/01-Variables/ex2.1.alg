<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description courant="AFFICHER double" texte=""/>
    <extension extnom="inactif"/>
    <fonction fctetat="inactif" fctcode=""/>
    <F2 F2lignes="" F2para="" F2defaut="" F2etat="inactif"/>
    <repere repetat="inactif" repcode="-10#10#-10#10#2#2"/>
    <param totalBoucles="5000000" nbDecimales="8" totalAffichages="1000" epaisseurLigne="2" epaisseurPoint="2" arrondiAuto="vrai" maxBoucle="500000"/>
    <item code="200#declarationfonctions" algoitem="FONCTIONS_UTILISEES"/>
    <item code="100#declarationsvariables" algoitem="VARIABLES">
        <item code="1#NOMBRE#val" algoitem="val EST_DU_TYPE NOMBRE"/>
        <item code="1#NOMBRE#double" algoitem="double EST_DU_TYPE NOMBRE"/>
    </item>
    <item code="101#debutalgo" algoitem="DEBUT_ALGORITHME">
        <item code="4#Entrer une valeur : #1" algoitem="AFFICHER &quot;Entrer une valeur : &quot;"/>
        <item code="19#  val PREND_LA_VALEUR  231" algoitem="//  val PREND_LA_VALEUR  231"/>
        <item code="2#val#pasliste" algoitem="LIRE val"/>
        <item code="5#double#val * 2#pasliste" algoitem="double PREND_LA_VALEUR val * 2"/>
        <item code="3#val#1#pasliste" algoitem="AFFICHER val"/>
        <item code="3#double#0#pasliste" algoitem="AFFICHER double"/>
    </item>
    <item code="102#finalgo" algoitem="FIN_ALGORITHME"/>
</Algo>
