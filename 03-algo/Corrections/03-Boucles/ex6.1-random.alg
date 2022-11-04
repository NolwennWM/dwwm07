<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description texte="" courant="tableau[i] PREND_LA_VALEUR floor(random()*100)"/>
    <extension extnom="inactif"/>
    <fonction fctcode="" fctetat="inactif"/>
    <F2 F2etat="inactif" F2para="" F2lignes="" F2defaut=""/>
    <repere repetat="inactif" repcode="-10#10#-10#10#2#2"/>
    <param nbDecimales="8" maxBoucle="500000" arrondiAuto="vrai" epaisseurPoint="2" totalBoucles="5000000" totalAffichages="1000" epaisseurLigne="2"/>
    <item algoitem="FONCTIONS_UTILISEES" code="200#declarationfonctions"/>
    <item algoitem="VARIABLES" code="100#declarationsvariables">
        <item algoitem="tableau EST_DU_TYPE LISTE" code="1#LISTE#tableau"/>
        <item algoitem="i EST_DU_TYPE NOMBRE" code="1#NOMBRE#i"/>
    </item>
    <item algoitem="DEBUT_ALGORITHME" code="101#debutalgo">
        <item algoitem="POUR i ALLANT_DE 0 A 19" code="12#i#0#19">
            <item algoitem="DEBUT_POUR" code="13#debutpour"/>
            <item algoitem="tableau[i] PREND_LA_VALEUR floor(random()*100)" code="5#tableau#floor(random()*100)#i"/>
            <item algoitem="AFFICHER &quot;la case n° &quot;" code="4#la case n° #0"/>
            <item algoitem="AFFICHER i" code="3#i#0#pasliste"/>
            <item algoitem="AFFICHER &quot; vaut &quot;" code="4# vaut #0"/>
            <item algoitem="AFFICHER tableau[i]" code="3#tableau#1#i"/>
            <item algoitem="// cecci est un commmetaire" code="19# cecci est un commmetaire"/>
            <item algoitem="FIN_POUR" code="14#finpour"/>
        </item>
    </item>
    <item algoitem="FIN_ALGORITHME" code="102#finalgo"/>
</Algo>
