<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description courant="AFFICHER mot" texte=""/>
    <extension extnom="inactif"/>
    <fonction fctcode="" fctetat="inactif"/>
    <F2 F2defaut="" F2etat="inactif" F2para="" F2lignes=""/>
    <repere repetat="inactif" repcode="-10#10#-10#10#2#2"/>
    <param maxBoucle="500000" epaisseurLigne="2" totalAffichages="1000" epaisseurPoint="2" nbDecimales="8" arrondiAuto="vrai" totalBoucles="5000000"/>
    <item algoitem="FONCTIONS_UTILISEES" code="200#declarationfonctions"/>
    <item algoitem="VARIABLES" code="100#declarationsvariables">
        <item algoitem="mot EST_DU_TYPE CHAINE" code="1#CHAINE#mot"/>
        <item algoitem="mot2 EST_DU_TYPE CHAINE" code="1#CHAINE#mot2"/>
    </item>
    <item algoitem="DEBUT_ALGORITHME" code="101#debutalgo">
        <item algoitem="mot PREND_LA_VALEUR &quot;Ananas&quot;" code="5#mot#&quot;Ananas&quot;#pasliste"/>
        <item algoitem="AFFICHER mot" code="3#mot#1#pasliste"/>
        <item algoitem="LIRE mot2" code="2#mot2#pasliste"/>
        <item algoitem="AFFICHER &quot;J'aime la &quot;" code="4#J'aime la #0"/>
        <item algoitem="AFFICHER mot2" code="3#mot2#0#pasliste"/>
        <item algoitem="AFFICHER &quot; à l'&quot;" code="4# à l'#0"/>
        <item algoitem="AFFICHER mot" code="3#mot#1#pasliste"/>
    </item>
    <item algoitem="FIN_ALGORITHME" code="102#finalgo"/>
</Algo>
