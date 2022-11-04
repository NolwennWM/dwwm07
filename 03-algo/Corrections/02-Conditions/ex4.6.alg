<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description courant="FIN_SINON" texte=""/>
    <extension extnom="inactif"/>
    <fonction fctcode="" fctetat="inactif"/>
    <F2 F2defaut="" F2lignes="" F2para="" F2etat="inactif"/>
    <repere repetat="inactif" repcode="-10#10#-10#10#2#2"/>
    <param totalAffichages="1000" arrondiAuto="vrai" maxBoucle="500000" epaisseurLigne="2" epaisseurPoint="2" totalBoucles="5000000" nbDecimales="8"/>
    <item code="200#declarationfonctions" algoitem="FONCTIONS_UTILISEES"/>
    <item code="100#declarationsvariables" algoitem="VARIABLES">
        <item code="1#NOMBRE#a" algoitem="a EST_DU_TYPE NOMBRE"/>
        <item code="1#NOMBRE#b" algoitem="b EST_DU_TYPE NOMBRE"/>
        <item code="1#NOMBRE#c" algoitem="c EST_DU_TYPE NOMBRE"/>
        <item code="1#NOMBRE#d" algoitem="d EST_DU_TYPE NOMBRE"/>
    </item>
    <item code="101#debutalgo" algoitem="DEBUT_ALGORITHME">
        <item code="4#Entrer les scores des pretendant#1" algoitem="AFFICHER &quot;Entrer les scores des pretendant&quot;"/>
        <item code="2#a#pasliste" algoitem="LIRE a"/>
        <item code="2#b#pasliste" algoitem="LIRE b"/>
        <item code="2#c#pasliste" algoitem="LIRE c"/>
        <item code="2#d#pasliste" algoitem="LIRE d"/>
        <item code="6#a > 50" algoitem="SI (a > 50) ALORS">
            <item code="7#debutsi" algoitem="DEBUT_SI"/>
            <item code="4#Elu au premier tour#1" algoitem="AFFICHER &quot;Elu au premier tour&quot;"/>
            <item code="8#finsi" algoitem="FIN_SI"/>
        </item>
        <item code="6#(b>50 OU c > 50 OU d>50) OU (a &lt;12.5" algoitem="SI ((b>50 OU c > 50 OU d>50) OU (a &lt;12.5) ALORS">
            <item code="7#debutsi" algoitem="DEBUT_SI"/>
            <item code="4#Battu au 1er tour, nul!#1" algoitem="AFFICHER &quot;Battu au 1er tour, nul!&quot;"/>
            <item code="8#finsi" algoitem="FIN_SI"/>
        </item>
        <item code="6#(b>50 OU c > 50 OU d>50) OU (a &lt;12.5" algoitem="SI ((b>50 OU c > 50 OU d>50) OU (a &lt;12.5) ALORS">
            <item code="7#debutsi" algoitem="DEBUT_SI"/>
            <item code="4#Battu au 1er tour, nul!#1" algoitem="AFFICHER &quot;Battu au 1er tour, nul!&quot;"/>
            <item code="8#finsi" algoitem="FIN_SI"/>
        </item>
        <item code="6#a>=b ET a>=c ET a>=d" algoitem="SI (a>=b ET a>=c ET a>=d) ALORS">
            <item code="7#debutsi" algoitem="DEBUT_SI"/>
            <item code="4#Ballotage favorable#1" algoitem="AFFICHER &quot;Ballotage favorable&quot;"/>
            <item code="8#finsi" algoitem="FIN_SI"/>
            <item code="9#sinon" algoitem="SINON">
                <item code="10#debutsinon" algoitem="DEBUT_SINON"/>
                <item code="4#Ballotage défavorable#1" algoitem="AFFICHER &quot;Ballotage défavorable&quot;"/>
                <item code="11#finsinon" algoitem="FIN_SINON"/>
            </item>
        </item>
    </item>
    <item code="102#finalgo" algoitem="FIN_ALGORITHME"/>
</Algo>
