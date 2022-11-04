<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description texte="" courant="AFFICHER &quot; minute(s)&quot;"/>
    <extension extnom="inactif"/>
    <fonction fctcode="" fctetat="inactif"/>
    <F2 F2etat="inactif" F2para="" F2defaut="" F2lignes=""/>
    <repere repcode="-10#10#-10#10#2#2" repetat="inactif"/>
    <param epaisseurLigne="2" arrondiAuto="vrai" totalBoucles="5000000" nbDecimales="8" epaisseurPoint="2" maxBoucle="500000" totalAffichages="1000"/>
    <item algoitem="FONCTIONS_UTILISEES" code="200#declarationfonctions"/>
    <item algoitem="VARIABLES" code="100#declarationsvariables">
        <item algoitem="minute EST_DU_TYPE NOMBRE" code="1#NOMBRE#minute"/>
        <item algoitem="heure EST_DU_TYPE NOMBRE" code="1#NOMBRE#heure"/>
    </item>
    <item algoitem="DEBUT_ALGORITHME" code="101#debutalgo">
        <item algoitem="AFFICHER &quot;Saisissez les heures : &quot;" code="4#Saisissez les heures : #1"/>
        <item algoitem="LIRE heure" code="2#heure#pasliste"/>
        <item algoitem="AFFICHER &quot;Saisissez les minutes : &quot;" code="4#Saisissez les minutes : #1"/>
        <item algoitem="LIRE minute" code="2#minute#pasliste"/>
        <item algoitem="//on avance d'une minute" code="19#on avance d'une minute"/>
        <item algoitem="minute PREND_LA_VALEUR  minute + 1" code="5#minute# minute + 1#pasliste"/>
        <item algoitem="//fin de l'heure?" code="19#fin de l'heure?"/>
        <item algoitem="SI (minute==60) ALORS" code="6#minute==60">
            <item algoitem="DEBUT_SI" code="7#debutsi"/>
            <item algoitem="minute PREND_LA_VALEUR 0" code="5#minute#0#pasliste"/>
            <item algoitem="heure PREND_LA_VALEUR heure+1" code="5#heure#heure+1#pasliste"/>
            <item algoitem="FIN_SI" code="8#finsi"/>
        </item>
        <item algoitem="//fin de la journée?" code="19#fin de la journée?"/>
        <item algoitem="SI (heure==24) ALORS" code="6#heure==24">
            <item algoitem="DEBUT_SI" code="7#debutsi"/>
            <item algoitem="heure PREND_LA_VALEUR 0" code="5#heure#0#pasliste"/>
            <item algoitem="FIN_SI" code="8#finsi"/>
        </item>
        <item algoitem="AFFICHER &quot;Dans une minute il sera  &quot;" code="4#Dans une minute il sera  #0"/>
        <item algoitem="AFFICHER heure" code="3#heure#0#pasliste"/>
        <item algoitem="AFFICHER &quot; heure(s) et &quot;" code="4# heure(s) et #0"/>
        <item algoitem="AFFICHER minute" code="3#minute#0#pasliste"/>
        <item algoitem="AFFICHER &quot; minute(s)&quot;" code="4# minute(s)#1"/>
    </item>
    <item algoitem="FIN_ALGORITHME" code="102#finalgo"/>
</Algo>
