<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description texte="" courant="APPELER_FONCTION like(choix)"/>
    <extension extnom="inactif"/>
    <fonction fctcode="" fctetat="inactif"/>
    <F2 F2etat="inactif" F2para="" F2lignes="" F2defaut=""/>
    <repere repcode="-10#10#-10#10#2#2" repetat="inactif"/>
    <param epaisseurLigne="2" totalBoucles="5000000" maxBoucle="500000" epaisseurPoint="2" totalAffichages="1000" arrondiAuto="vrai" nbDecimales="8"/>
    <item algoitem="FONCTIONS_UTILISEES" code="200#declarationfonctions">
        <item algoitem="FONCTION like(food)" code="201#like#food">
            <item algoitem="VARIABLES_FONCTION" code="202#declarationsvariablesfonction">
                <item algoitem="n1 EST_DU_TYPE CHAINE" code="1#CHAINE#n1"/>
            </item>
            <item algoitem="DEBUT_FONCTION" code="203#debutfonction"/>
            <item algoitem="n1 PREND_LA_VALEUR food" code="5#n1#food#pasliste"/>
            <item algoitem="AFFICHER &quot;J'aime les &quot;" code="4#J'aime les #0"/>
            <item algoitem="AFFICHER n1" code="3#n1#1#pasliste"/>
            <item algoitem="FIN_FONCTION" code="204#finfonction"/>
        </item>
    </item>
    <item algoitem="VARIABLES" code="100#declarationsvariables">
        <item algoitem="choix EST_DU_TYPE CHAINE" code="1#CHAINE#choix"/>
    </item>
    <item algoitem="DEBUT_ALGORITHME" code="101#debutalgo">
        <item algoitem="AFFICHER &quot;Choisissez de la nourriture :&quot;" code="4#Choisissez de la nourriture :#1"/>
        <item algoitem="LIRE choix" code="2#choix#pasliste"/>
        <item algoitem="APPELER_FONCTION like(choix)" code="206#like(choix)"/>
        <item algoitem="AFFICHER &quot;Encore&quot;" code="4#Encore#1"/>
        <item algoitem="LIRE choix" code="2#choix#pasliste"/>
        <item algoitem="APPELER_FONCTION like(choix)" code="206#like(choix)"/>
    </item>
    <item algoitem="FIN_ALGORITHME" code="102#finalgo"/>
</Algo>
