<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description texte="" courant="start PREND_LA_VALEUR round(random()*100)"/>
    <extension extnom="inactif"/>
    <fonction fctcode="" fctetat="inactif"/>
    <F2 F2etat="inactif" F2para="" F2lignes="" F2defaut=""/>
    <repere repcode="-10#10#-10#10#2#2" repetat="inactif"/>
    <param epaisseurLigne="2" totalBoucles="5000000" maxBoucle="500000" epaisseurPoint="2" totalAffichages="1000" arrondiAuto="vrai" nbDecimales="8"/>
    <item algoitem="FONCTIONS_UTILISEES" code="200#declarationfonctions">
        <item algoitem="FONCTION addition(x,y)" code="201#addition#x,y">
            <item algoitem="VARIABLES_FONCTION" code="202#declarationsvariablesfonction">
                <item algoitem="total EST_DU_TYPE NOMBRE" code="1#NOMBRE#total"/>
            </item>
            <item algoitem="DEBUT_FONCTION" code="203#debutfonction"/>
            <item algoitem="total PREND_LA_VALEUR x+y" code="5#total#x+y#pasliste"/>
            <item algoitem="RENVOYER total" code="205#total"/>
            <item algoitem="FIN_FONCTION" code="204#finfonction"/>
        </item>
    </item>
    <item algoitem="VARIABLES" code="100#declarationsvariables">
        <item algoitem="start EST_DU_TYPE NOMBRE" code="1#NOMBRE#start"/>
    </item>
    <item algoitem="DEBUT_ALGORITHME" code="101#debutalgo">
        <item algoitem="start PREND_LA_VALEUR round(random()*100)" code="5#start#round(random()*100)#pasliste"/>
        <item algoitem="SI (start>0) ALORS" code="6#start>0">
            <item algoitem="DEBUT_SI" code="7#debutsi"/>
            <item algoitem="TANT_QUE (start&lt;10000) FAIRE" code="15#start&lt;10000">
                <item algoitem="DEBUT_TANT_QUE" code="16#debuttantque"/>
                <item algoitem="start PREND_LA_VALEUR addition(start, start)" code="5#start#addition(start, start)#pasliste"/>
                <item algoitem="AFFICHER start" code="3#start#1#pasliste"/>
                <item algoitem="FIN_TANT_QUE" code="17#fintantque"/>
            </item>
            <item algoitem="FIN_SI" code="8#finsi"/>
        </item>
    </item>
    <item algoitem="FIN_ALGORITHME" code="102#finalgo"/>
</Algo>
