<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description texte="" courant="LIRE chiffre"/>
    <extension extnom="inactif"/>
    <fonction fctcode="" fctetat="inactif"/>
    <F2 F2etat="inactif" F2para="" F2lignes="" F2defaut=""/>
    <repere repetat="inactif" repcode="-10#10#-10#10#2#2"/>
    <param nbDecimales="8" maxBoucle="500000" arrondiAuto="vrai" epaisseurPoint="2" totalBoucles="5000000" totalAffichages="1000" epaisseurLigne="2"/>
    <item algoitem="FONCTIONS_UTILISEES" code="200#declarationfonctions"/>
    <item algoitem="VARIABLES" code="100#declarationsvariables">
        <item algoitem="chiffre EST_DU_TYPE NOMBRE" code="1#NOMBRE#chiffre"/>
    </item>
    <item algoitem="DEBUT_ALGORITHME" code="101#debutalgo">
        <item algoitem="AFFICHER &quot;Entrer un nombre en compris entre 10 et 20&quot;" code="4#Entrer un nombre en compris entre 10 et 20#1"/>
        <item algoitem="LIRE chiffre" code="2#chiffre#pasliste"/>
        <item algoitem="TANT_QUE (chiffre&lt;10 OU chiffre>20) FAIRE" code="15#chiffre&lt;10 OU chiffre>20">
            <item algoitem="DEBUT_TANT_QUE" code="16#debuttantque"/>
            <item algoitem="SI (chiffre&lt;10) ALORS" code="6#chiffre&lt;10">
                <item algoitem="DEBUT_SI" code="7#debutsi"/>
                <item algoitem="AFFICHER &quot;Plus grand !&quot;" code="4#Plus grand !#1"/>
                <item algoitem="FIN_SI" code="8#finsi"/>
                <item algoitem="SINON" code="9#sinon">
                    <item algoitem="DEBUT_SINON" code="10#debutsinon"/>
                    <item algoitem="AFFICHER &quot;Plus petit !&quot;" code="4#Plus petit !#1"/>
                    <item algoitem="FIN_SINON" code="11#finsinon"/>
                </item>
            </item>
            <item algoitem="LIRE chiffre" code="2#chiffre#pasliste"/>
            <item algoitem="FIN_TANT_QUE" code="17#fintantque"/>
        </item>
        <item algoitem="AFFICHER &quot;Merci de votre coopération&quot;" code="4#Merci de votre coopération#0"/>
    </item>
    <item algoitem="FIN_ALGORITHME" code="102#finalgo"/>
</Algo>
