<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description texte="" courant="FIN_SINON"/>
    <extension extnom="inactif"/>
    <fonction fctetat="inactif" fctcode=""/>
    <F2 F2para="" F2etat="inactif" F2lignes="" F2defaut=""/>
    <repere repcode="-10#10#-10#10#2#2" repetat="inactif"/>
    <param nbDecimales="8" epaisseurPoint="2" totalBoucles="5000000" arrondiAuto="vrai" totalAffichages="1000" maxBoucle="500000" epaisseurLigne="2"/>
    <item code="200#declarationfonctions" algoitem="FONCTIONS_UTILISEES"/>
    <item code="100#declarationsvariables" algoitem="VARIABLES">
        <item code="1#CHAINE#nom" algoitem="nom EST_DU_TYPE CHAINE"/>
        <item code="1#CHAINE#nom2" algoitem="nom2 EST_DU_TYPE CHAINE"/>
        <item code="1#CHAINE#nom3" algoitem="nom3 EST_DU_TYPE CHAINE"/>
    </item>
    <item code="101#debutalgo" algoitem="DEBUT_ALGORITHME">
        <item code="4#nom n°1#1" algoitem="AFFICHER &quot;nom n°1&quot;"/>
        <item code="2#nom#pasliste" algoitem="LIRE nom"/>
        <item code="4#nom n°2#1" algoitem="AFFICHER &quot;nom n°2&quot;"/>
        <item code="2#nom2#pasliste" algoitem="LIRE nom2"/>
        <item code="4#nom n°3#1" algoitem="AFFICHER &quot;nom n°3&quot;"/>
        <item code="2#nom3#pasliste" algoitem="LIRE nom3"/>
        <item code="6#(nom&lt;nom2) ET (nom2&lt;nom3)" algoitem="SI ((nom&lt;nom2) ET (nom2&lt;nom3)) ALORS">
            <item code="7#debutsi" algoitem="DEBUT_SI"/>
            <item code="4#ranger par ordre alphabetique#1" algoitem="AFFICHER &quot;ranger par ordre alphabetique&quot;"/>
            <item code="8#finsi" algoitem="FIN_SI"/>
            <item code="9#sinon" algoitem="SINON">
                <item code="10#debutsinon" algoitem="DEBUT_SINON"/>
                <item code="4#non ranger par ordre alphabetique#1" algoitem="AFFICHER &quot;non ranger par ordre alphabetique&quot;"/>
                <item code="11#finsinon" algoitem="FIN_SINON"/>
            </item>
        </item>
    </item>
    <item code="102#finalgo" algoitem="FIN_ALGORITHME"/>
</Algo>
