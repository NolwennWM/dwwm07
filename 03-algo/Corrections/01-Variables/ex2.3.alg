<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description texte="" courant="AFFICHER ttc"/>
    <extension extnom="inactif"/>
    <fonction fctcode="" fctetat="inactif"/>
    <F2 F2defaut="" F2lignes="" F2etat="inactif" F2para=""/>
    <repere repcode="-10#10#-10#10#2#2" repetat="inactif"/>
    <param arrondiAuto="vrai" epaisseurLigne="2" nbDecimales="8" epaisseurPoint="2" totalBoucles="5000000" totalAffichages="1000" maxBoucle="500000"/>
    <item algoitem="FONCTIONS_UTILISEES" code="200#declarationfonctions"/>
    <item algoitem="VARIABLES" code="100#declarationsvariables">
        <item algoitem="prixHT EST_DU_TYPE NOMBRE" code="1#NOMBRE#prixHT"/>
        <item algoitem="qte EST_DU_TYPE NOMBRE" code="1#NOMBRE#qte"/>
        <item algoitem="tva EST_DU_TYPE NOMBRE" code="1#NOMBRE#tva"/>
        <item algoitem="ttc EST_DU_TYPE NOMBRE" code="1#NOMBRE#ttc"/>
    </item>
    <item algoitem="DEBUT_ALGORITHME" code="101#debutalgo">
        <item algoitem="AFFICHER &quot;Prix HT ?&quot;" code="4#Prix HT ?#1"/>
        <item algoitem="LIRE prixHT" code="2#prixHT#pasliste"/>
        <item algoitem="AFFICHER &quot;Quantité ?&quot;" code="4#Quantité ?#1"/>
        <item algoitem="LIRE qte" code="2#qte#pasliste"/>
        <item algoitem="AFFICHER &quot;TVA ?&quot;" code="4#TVA ?#1"/>
        <item algoitem="LIRE tva" code="2#tva#pasliste"/>
        <item algoitem="ttc PREND_LA_VALEUR (prixHT * qte) * (1 + tva)" code="5#ttc#(prixHT * qte) * (1 + tva)#pasliste"/>
        <item algoitem="AFFICHER &quot;Prix TTC&quot;" code="4#Prix TTC#1"/>
        <item algoitem="AFFICHER ttc" code="3#ttc#1#pasliste"/>
    </item>
    <item algoitem="FIN_ALGORITHME" code="102#finalgo"/>
</Algo>
