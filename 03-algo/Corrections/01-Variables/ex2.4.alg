<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description courant="AFFICHER partie3" texte=""/>
    <extension extnom="inactif"/>
    <fonction fctetat="inactif" fctcode=""/>
    <F2 F2lignes="" F2para="" F2defaut="" F2etat="inactif"/>
    <repere repetat="inactif" repcode="-10#10#-10#10#2#2"/>
    <param totalBoucles="5000000" nbDecimales="8" totalAffichages="1000" epaisseurLigne="2" epaisseurPoint="2" arrondiAuto="vrai" maxBoucle="500000"/>
    <item code="200#declarationfonctions" algoitem="FONCTIONS_UTILISEES"/>
    <item code="100#declarationsvariables" algoitem="VARIABLES">
        <item code="1#CHAINE#partie1" algoitem="partie1 EST_DU_TYPE CHAINE"/>
        <item code="1#CHAINE#partie2" algoitem="partie2 EST_DU_TYPE CHAINE"/>
        <item code="1#CHAINE#partie3" algoitem="partie3 EST_DU_TYPE CHAINE"/>
        <item code="1#CHAINE#partie4" algoitem="partie4 EST_DU_TYPE CHAINE"/>
    </item>
    <item code="101#debutalgo" algoitem="DEBUT_ALGORITHME">
        <item code="5#partie1#&quot; belle marquise&quot;#pasliste" algoitem="partie1 PREND_LA_VALEUR &quot; belle marquise&quot;"/>
        <item code="5#partie2#&quot; vos beaux yeux&quot;#pasliste" algoitem="partie2 PREND_LA_VALEUR &quot; vos beaux yeux&quot;"/>
        <item code="5#partie3#&quot; me font mourir&quot;#pasliste" algoitem="partie3 PREND_LA_VALEUR &quot; me font mourir&quot;"/>
        <item code="5#partie4#&quot; d'amour&quot;#pasliste" algoitem="partie4 PREND_LA_VALEUR &quot; d'amour&quot;"/>
        <item code="19# AFFICHER* partie1 &amp; partie2 &amp; partie3 &amp; partie4" algoitem="// AFFICHER* partie1 &amp; partie2 &amp; partie3 &amp; partie4"/>
        <item code="19# AFFICHER* partie3 &amp; partie2 &amp; partie4 &amp; partie1" algoitem="// AFFICHER* partie3 &amp; partie2 &amp; partie4 &amp; partie1"/>
        <item code="19# AFFICHER* partie2 &amp; partie3 &amp; partie1 &amp; partie4" algoitem="// AFFICHER* partie2 &amp; partie3 &amp; partie1 &amp; partie4"/>
        <item code="19# AFFICHER* partie4 &amp; partie1 &amp; partie2 &amp; partie3" algoitem="// AFFICHER* partie4 &amp; partie1 &amp; partie2 &amp; partie3"/>
        <item code="19#1er variante" algoitem="//1er variante"/>
        <item code="3#partie1#0#pasliste" algoitem="AFFICHER partie1"/>
        <item code="3#partie2#0#pasliste" algoitem="AFFICHER partie2"/>
        <item code="3#partie3#0#pasliste" algoitem="AFFICHER partie3"/>
        <item code="3#partie4#1#pasliste" algoitem="AFFICHER partie4"/>
        <item code="19#2eme variante" algoitem="//2eme variante"/>
        <item code="3#partie3#0#pasliste" algoitem="AFFICHER partie3"/>
        <item code="3#partie2#0#pasliste" algoitem="AFFICHER partie2"/>
        <item code="3#partie4#0#pasliste" algoitem="AFFICHER partie4"/>
        <item code="3#partie1#1#pasliste" algoitem="AFFICHER partie1"/>
        <item code="19#3eme variante" algoitem="//3eme variante"/>
        <item code="3#partie2#0#pasliste" algoitem="AFFICHER partie2"/>
        <item code="3#partie3#0#pasliste" algoitem="AFFICHER partie3"/>
        <item code="3#partie1#0#pasliste" algoitem="AFFICHER partie1"/>
        <item code="3#partie4#1#pasliste" algoitem="AFFICHER partie4"/>
        <item code="19#4eme variante" algoitem="//4eme variante"/>
        <item code="3#partie4#0#pasliste" algoitem="AFFICHER partie4"/>
        <item code="3#partie1#0#pasliste" algoitem="AFFICHER partie1"/>
        <item code="3#partie2#0#pasliste" algoitem="AFFICHER partie2"/>
        <item code="3#partie3#0#pasliste" algoitem="AFFICHER partie3"/>
    </item>
    <item code="102#finalgo" algoitem="FIN_ALGORITHME"/>
</Algo>
