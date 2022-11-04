<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description texte="" courant="FIN_SINON"/>
    <extension extnom="inactif"/>
    <fonction fctcode="" fctetat="inactif"/>
    <F2 F2etat="inactif" F2para="" F2defaut="" F2lignes=""/>
    <repere repcode="-10#10#-10#10#2#2" repetat="inactif"/>
    <param epaisseurLigne="2" arrondiAuto="vrai" nbDecimales="8" maxBoucle="500000" epaisseurPoint="2" totalBoucles="5000000" totalAffichages="1000"/>
    <item code="200#declarationfonctions" algoitem="FONCTIONS_UTILISEES"/>
    <item code="100#declarationsvariables" algoitem="VARIABLES">
        <item code="1#NOMBRE#age" algoitem="age EST_DU_TYPE NOMBRE"/>
        <item code="1#CHAINE#sexe" algoitem="sexe EST_DU_TYPE CHAINE"/>
    </item>
    <item code="101#debutalgo" algoitem="DEBUT_ALGORITHME">
        <item code="4#Entrer l'age#1" algoitem="AFFICHER &quot;Entrer l'age&quot;"/>
        <item code="2#age#pasliste" algoitem="LIRE age"/>
        <item code="4#Entrer le sexe (M/F)#1" algoitem="AFFICHER &quot;Entrer le sexe (M/F)&quot;"/>
        <item code="2#sexe#pasliste" algoitem="LIRE sexe"/>
        <item code="6#(sexe == &quot;m&quot; ET age > 20) OU (sexe == &quot;f&quot; ET (age > 18 ET age &lt; 35))" algoitem="SI ((sexe == &quot;m&quot; ET age > 20) OU (sexe == &quot;f&quot; ET (age > 18 ET age &lt; 35))) ALORS">
            <item code="7#debutsi" algoitem="DEBUT_SI"/>
            <item code="4#Imposable#1" algoitem="AFFICHER &quot;Imposable&quot;"/>
            <item code="8#finsi" algoitem="FIN_SI"/>
            <item code="9#sinon" algoitem="SINON">
                <item code="10#debutsinon" algoitem="DEBUT_SINON"/>
                <item code="4#Non imposable#1" algoitem="AFFICHER &quot;Non imposable&quot;"/>
                <item code="11#finsinon" algoitem="FIN_SINON"/>
            </item>
        </item>
    </item>
    <item code="102#finalgo" algoitem="FIN_ALGORITHME"/>
</Algo>
