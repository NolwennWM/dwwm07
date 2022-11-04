<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description texte="" courant="FIN_SI"/>
    <extension extnom="inactif"/>
    <fonction fctcode="" fctetat="inactif"/>
    <F2 F2para="" F2defaut="" F2etat="inactif" F2lignes=""/>
    <repere repetat="inactif" repcode="-10#10#-10#10#2#2"/>
    <param maxBoucle="500000" nbDecimales="8" totalAffichages="1000" epaisseurPoint="2" totalBoucles="5000000" arrondiAuto="vrai" epaisseurLigne="2"/>
    <item code="200#declarationfonctions" algoitem="FONCTIONS_UTILISEES"/>
    <item code="100#declarationsvariables" algoitem="VARIABLES">
        <item code="1#NOMBRE#age" algoitem="age EST_DU_TYPE NOMBRE"/>
    </item>
    <item code="101#debutalgo" algoitem="DEBUT_ALGORITHME">
        <item code="4#Entrer l'age de l'enfant#1" algoitem="AFFICHER &quot;Entrer l'age de l'enfant&quot;"/>
        <item code="2#age#pasliste" algoitem="LIRE age"/>
        <item code="6#age>=12" algoitem="SI (age>=12) ALORS">
            <item code="7#debutsi" algoitem="DEBUT_SI"/>
            <item code="4#Cadet#0" algoitem="AFFICHER &quot;Cadet&quot;"/>
            <item code="8#finsi" algoitem="FIN_SI"/>
        </item>
        <item code="6#age>=10" algoitem="SI (age>=10) ALORS">
            <item code="7#debutsi" algoitem="DEBUT_SI"/>
            <item code="4#Minime#0" algoitem="AFFICHER &quot;Minime&quot;"/>
            <item code="8#finsi" algoitem="FIN_SI"/>
        </item>
        <item code="6#age>=8" algoitem="SI (age>=8) ALORS">
            <item code="7#debutsi" algoitem="DEBUT_SI"/>
            <item code="4#Pupille#0" algoitem="AFFICHER &quot;Pupille&quot;"/>
            <item code="8#finsi" algoitem="FIN_SI"/>
        </item>
        <item code="6#age&lt;=7" algoitem="SI (age&lt;=7) ALORS">
            <item code="7#debutsi" algoitem="DEBUT_SI"/>
            <item code="4#Poussin#0" algoitem="AFFICHER &quot;Poussin&quot;"/>
            <item code="8#finsi" algoitem="FIN_SI"/>
        </item>
    </item>
    <item code="102#finalgo" algoitem="FIN_ALGORITHME"/>
</Algo>
