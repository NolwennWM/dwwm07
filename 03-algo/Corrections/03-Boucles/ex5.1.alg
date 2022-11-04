<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description texte="" courant="AFFICHER &quot;Merci de votre coopération&quot;"/>
    <extension extnom="inactif"/>
    <fonction fctcode="" fctetat="inactif"/>
    <F2 F2defaut="" F2para="" F2lignes="" F2etat="inactif"/>
    <repere repcode="-10#10#-10#10#2#2" repetat="inactif"/>
    <param maxBoucle="500000" epaisseurLigne="2" epaisseurPoint="2" nbDecimales="8" totalBoucles="5000000" totalAffichages="1000" arrondiAuto="vrai"/>
    <item code="200#declarationfonctions" algoitem="FONCTIONS_UTILISEES"/>
    <item code="100#declarationsvariables" algoitem="VARIABLES">
        <item code="1#NOMBRE#chiffre" algoitem="chiffre EST_DU_TYPE NOMBRE"/>
    </item>
    <item code="101#debutalgo" algoitem="DEBUT_ALGORITHME">
        <item code="4#Entrer un chiffre en compris entre 1 et 3#1" algoitem="AFFICHER &quot;Entrer un chiffre en compris entre 1 et 3&quot;"/>
        <item code="2#chiffre#pasliste" algoitem="LIRE chiffre"/>
        <item code="15#chiffre&lt;1 OU chiffre>3" algoitem="TANT_QUE (chiffre&lt;1 OU chiffre>3) FAIRE">
            <item code="16#debuttantque" algoitem="DEBUT_TANT_QUE"/>
            <item code="4#Merci d'entrer un chiffre en compris entre 1 et 3 cette fois#1" algoitem="AFFICHER &quot;Merci d'entrer un chiffre en compris entre 1 et 3 cette fois&quot;"/>
            <item code="2#chiffre#pasliste" algoitem="LIRE chiffre"/>
            <item code="17#fintantque" algoitem="FIN_TANT_QUE"/>
        </item>
        <item code="4#Merci de votre coopération#0" algoitem="AFFICHER &quot;Merci de votre coopération&quot;"/>
    </item>
    <item code="102#finalgo" algoitem="FIN_ALGORITHME"/>
</Algo>
