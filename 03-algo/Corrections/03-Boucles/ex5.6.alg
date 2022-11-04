<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description courant="AFFICHER factorielle" texte="factorielle non recursif"/>
    <extension extnom="inactif"/>
    <fonction fctetat="inactif" fctcode=""/>
    <F2 F2para="" F2lignes="" F2etat="inactif" F2defaut=""/>
    <repere repcode="-10#10#-10#10#2#2" repetat="inactif"/>
    <param totalBoucles="5000000" arrondiAuto="vrai" nbDecimales="8" maxBoucle="500000" epaisseurPoint="2" epaisseurLigne="2" totalAffichages="1000"/>
    <item code="200#declarationfonctions" algoitem="FONCTIONS_UTILISEES"/>
    <item code="100#declarationsvariables" algoitem="VARIABLES">
        <item code="1#NOMBRE#nb" algoitem="nb EST_DU_TYPE NOMBRE"/>
        <item code="1#NOMBRE#i" algoitem="i EST_DU_TYPE NOMBRE"/>
        <item code="1#NOMBRE#factorielle" algoitem="factorielle EST_DU_TYPE NOMBRE"/>
    </item>
    <item code="101#debutalgo" algoitem="DEBUT_ALGORITHME">
        <item code="5#factorielle#1#pasliste" algoitem="factorielle PREND_LA_VALEUR 1"/>
        <item code="4#Quelle factorielle voulez vous calculer?#1" algoitem="AFFICHER &quot;Quelle factorielle voulez vous calculer?&quot;"/>
        <item code="2#nb#pasliste" algoitem="LIRE nb"/>
        <item code="12#i#1#nb" algoitem="POUR i ALLANT_DE 1 A nb">
            <item code="13#debutpour" algoitem="DEBUT_POUR"/>
            <item code="5#factorielle#factorielle*i#pasliste" algoitem="factorielle PREND_LA_VALEUR factorielle*i"/>
            <item code="3#i#0#pasliste" algoitem="AFFICHER i"/>
            <item code="6#i==nb" algoitem="SI (i==nb) ALORS">
                <item code="7#debutsi" algoitem="DEBUT_SI"/>
                <item code="4# = #0" algoitem="AFFICHER &quot; = &quot;"/>
                <item code="8#finsi" algoitem="FIN_SI"/>
                <item code="9#sinon" algoitem="SINON">
                    <item code="10#debutsinon" algoitem="DEBUT_SINON"/>
                    <item code="4# * #0" algoitem="AFFICHER &quot; * &quot;"/>
                    <item code="11#finsinon" algoitem="FIN_SINON"/>
                </item>
            </item>
            <item code="14#finpour" algoitem="FIN_POUR"/>
        </item>
        <item code="3#factorielle#1#pasliste" algoitem="AFFICHER factorielle"/>
    </item>
    <item code="102#finalgo" algoitem="FIN_ALGORITHME"/>
</Algo>
