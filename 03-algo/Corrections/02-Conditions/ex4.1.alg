<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description texte="" courant="AFFICHER tutu"/>
    <extension extnom="inactif"/>
    <fonction fctcode="" fctetat="inactif"/>
    <F2 F2defaut="" F2para="" F2lignes="" F2etat="inactif"/>
    <repere repcode="-10#10#-10#10#2#2" repetat="inactif"/>
    <param maxBoucle="500000" epaisseurLigne="2" epaisseurPoint="2" nbDecimales="8" totalBoucles="5000000" totalAffichages="1000" arrondiAuto="vrai"/>
    <item code="200#declarationfonctions" algoitem="FONCTIONS_UTILISEES"/>
    <item code="100#declarationsvariables" algoitem="VARIABLES">
        <item code="1#NOMBRE#tutu" algoitem="tutu EST_DU_TYPE NOMBRE"/>
        <item code="1#NOMBRE#toto" algoitem="toto EST_DU_TYPE NOMBRE"/>
        <item code="1#CHAINE#tata" algoitem="tata EST_DU_TYPE CHAINE"/>
    </item>
    <item code="101#debutalgo" algoitem="DEBUT_ALGORITHME">
        <item code="5#tutu#10#pasliste" algoitem="tutu PREND_LA_VALEUR 10"/>
        <item code="5#toto#5#pasliste" algoitem="toto PREND_LA_VALEUR 5"/>
        <item code="5#tata#&quot;pas ok&quot;#pasliste" algoitem="tata PREND_LA_VALEUR &quot;pas ok&quot;"/>
        <item code="6#tutu&lt;=toto+4 ET tata&lt;>&quot;ok&quot;" algoitem="SI (tutu&lt;=toto+4 ET tata&lt;>&quot;ok&quot;) ALORS">
            <item code="7#debutsi" algoitem="DEBUT_SI"/>
            <item code="5#tutu#tutu - 1#pasliste" algoitem="tutu PREND_LA_VALEUR tutu - 1"/>
            <item code="8#finsi" algoitem="FIN_SI"/>
            <item code="9#sinon" algoitem="SINON">
                <item code="10#debutsinon" algoitem="DEBUT_SINON"/>
                <item code="5#tutu#tutu + 1#pasliste" algoitem="tutu PREND_LA_VALEUR tutu + 1"/>
                <item code="11#finsinon" algoitem="FIN_SINON"/>
            </item>
        </item>
        <item code="3#tutu#1#pasliste" algoitem="AFFICHER tutu"/>
    </item>
    <item code="102#finalgo" algoitem="FIN_ALGORITHME"/>
</Algo>
