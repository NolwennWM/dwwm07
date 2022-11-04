<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description texte="" courant="//On demande à l'utilisateur de rentrer un chiffre"/>
    <extension extnom="inactif"/>
    <fonction fctcode="" fctetat="inactif"/>
    <F2 F2etat="inactif" F2para="" F2lignes="" F2defaut=""/>
    <repere repcode="-10#10#-10#10#2#2" repetat="inactif"/>
    <param epaisseurLigne="2" totalBoucles="5000000" maxBoucle="500000" epaisseurPoint="2" totalAffichages="1000" arrondiAuto="vrai" nbDecimales="8"/>
    <item algoitem="FONCTIONS_UTILISEES" code="200#declarationfonctions"/>
    <item algoitem="VARIABLES" code="100#declarationsvariables">
        <item algoitem="chiffre EST_DU_TYPE NOMBRE" code="1#NOMBRE#chiffre"/>
    </item>
    <item algoitem="DEBUT_ALGORITHME" code="101#debutalgo">
        <item algoitem="//On demande à l'utilisateur de rentrer un chiffre" code="19#On demande à l'utilisateur de rentrer un chiffre"/>
        <item algoitem="LIRE chiffre" code="2#chiffre#pasliste"/>
        <item algoitem="SI (chiffre &lt; 5) ALORS" code="6#chiffre &lt; 5">
            <item algoitem="DEBUT_SI" code="7#debutsi"/>
            <item algoitem="AFFICHER &quot;Ceci est un petit chiffre&quot;" code="4#Ceci est un petit chiffre#1"/>
            <item algoitem="FIN_SI" code="8#finsi"/>
            <item algoitem="SINON" code="9#sinon">
                <item algoitem="DEBUT_SINON" code="10#debutsinon"/>
                <item algoitem="SI (chiffre >5) ALORS" code="6#chiffre >5">
                    <item algoitem="DEBUT_SI" code="7#debutsi"/>
                    <item algoitem="AFFICHER &quot;C'est un grand chiffre&quot;" code="4#C'est un grand chiffre#1"/>
                    <item algoitem="FIN_SI" code="8#finsi"/>
                    <item algoitem="SINON" code="9#sinon">
                        <item algoitem="DEBUT_SINON" code="10#debutsinon"/>
                        <item algoitem="AFFICHER &quot;C'est juste moyen&quot;" code="4#C'est juste moyen#1"/>
                        <item algoitem="FIN_SINON" code="11#finsinon"/>
                    </item>
                </item>
                <item algoitem="FIN_SINON" code="11#finsinon"/>
            </item>
        </item>
    </item>
    <item algoitem="FIN_ALGORITHME" code="102#finalgo"/>
</Algo>
