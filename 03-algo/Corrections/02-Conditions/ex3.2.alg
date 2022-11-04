<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description texte="" courant="FIN_SINON"/>
    <extension extnom="inactif"/>
    <fonction fctetat="inactif" fctcode=""/>
    <F2 F2para="" F2defaut="" F2etat="inactif" F2lignes=""/>
    <repere repetat="inactif" repcode="-10#10#-10#10#2#2"/>
    <param arrondiAuto="vrai" maxBoucle="500000" totalBoucles="5000000" nbDecimales="8" epaisseurLigne="2" totalAffichages="1000" epaisseurPoint="2"/>
    <item code="200#declarationfonctions" algoitem="FONCTIONS_UTILISEES"/>
    <item code="100#declarationsvariables" algoitem="VARIABLES">
        <item code="1#NOMBRE#nb" algoitem="nb EST_DU_TYPE NOMBRE"/>
        <item code="1#NOMBRE#nb2" algoitem="nb2 EST_DU_TYPE NOMBRE"/>
    </item>
    <item code="101#debutalgo" algoitem="DEBUT_ALGORITHME">
        <item code="4#Saisissez une valeur pour nb :#1" algoitem="AFFICHER &quot;Saisissez une valeur pour nb :&quot;"/>
        <item code="2#nb#pasliste" algoitem="LIRE nb"/>
        <item code="4#Saisissez une valeur pour nb2 :#1" algoitem="AFFICHER &quot;Saisissez une valeur pour nb2 :&quot;"/>
        <item code="2#nb2#pasliste" algoitem="LIRE nb2"/>
        <item code="19# +*+ = +  et -*-=+ ;)" algoitem="// +*+ = +  et -*-=+ ;)"/>
        <item code="6#(a>0 ET b>0) OU (a&lt;0 ET b&lt;0)" algoitem="SI ((a>0 ET b>0) OU (a&lt;0 ET b&lt;0)) ALORS">
            <item code="7#debutsi" algoitem="DEBUT_SI"/>
            <item code="4#Nombre positif#0" algoitem="AFFICHER &quot;Nombre positif&quot;"/>
            <item code="8#finsi" algoitem="FIN_SI"/>
            <item code="9#sinon" algoitem="SINON">
                <item code="10#debutsinon" algoitem="DEBUT_SINON"/>
                <item code="4#Nombre  négatif#1" algoitem="AFFICHER &quot;Nombre  négatif&quot;"/>
                <item code="11#finsinon" algoitem="FIN_SINON"/>
            </item>
        </item>
    </item>
    <item code="102#finalgo" algoitem="FIN_ALGORITHME"/>
</Algo>
