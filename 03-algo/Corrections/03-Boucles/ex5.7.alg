<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description texte="" courant="AFFICHER &quot;ensuite il vous dira quel était le plus grand parmi ces 5 nombres&quot;"/>
    <extension extnom="inactif"/>
    <fonction fctcode="" fctetat="inactif"/>
    <F2 F2etat="inactif" F2para="" F2lignes="" F2defaut=""/>
    <repere repetat="inactif" repcode="-10#10#-10#10#2#2"/>
    <param nbDecimales="8" maxBoucle="500000" arrondiAuto="vrai" epaisseurPoint="2" totalBoucles="5000000" totalAffichages="1000" epaisseurLigne="2"/>
    <item algoitem="FONCTIONS_UTILISEES" code="200#declarationfonctions"/>
    <item algoitem="VARIABLES" code="100#declarationsvariables">
        <item algoitem="i EST_DU_TYPE NOMBRE" code="1#NOMBRE#i"/>
        <item algoitem="nb EST_DU_TYPE NOMBRE" code="1#NOMBRE#nb"/>
        <item algoitem="max EST_DU_TYPE NOMBRE" code="1#NOMBRE#max"/>
        <item algoitem="position EST_DU_TYPE NOMBRE" code="1#NOMBRE#position"/>
    </item>
    <item algoitem="DEBUT_ALGORITHME" code="101#debutalgo">
        <item algoitem="AFFICHER &quot;le programme demande vous demandera successivement 5 nombre&quot;" code="4#le programme demande vous demandera successivement 5 nombre#1"/>
        <item algoitem="AFFICHER &quot;ensuite il vous dira quel était le plus grand parmi ces 5 nombres&quot;" code="4#ensuite il vous dira quel était le plus grand parmi ces 5 nombres#1"/>
        <item algoitem="max PREND_LA_VALEUR 0" code="5#max#0#pasliste"/>
        <item algoitem="POUR i ALLANT_DE 1 A 5" code="12#i#1#5">
            <item algoitem="DEBUT_POUR" code="13#debutpour"/>
            <item algoitem="AFFICHER &quot;saisie n°&quot;" code="4#saisie n°#0"/>
            <item algoitem="AFFICHER i" code="3#i#1#pasliste"/>
            <item algoitem="LIRE nb" code="2#nb#pasliste"/>
            <item algoitem="SI ((i==1) OU (nb > max)) ALORS" code="6#(i==1) OU (nb > max)">
                <item algoitem="DEBUT_SI" code="7#debutsi"/>
                <item algoitem="max PREND_LA_VALEUR nb" code="5#max#nb#pasliste"/>
                <item algoitem="position PREND_LA_VALEUR i" code="5#position#i#pasliste"/>
                <item algoitem="FIN_SI" code="8#finsi"/>
            </item>
            <item algoitem="FIN_POUR" code="14#finpour"/>
        </item>
        <item algoitem="AFFICHER &quot;la valeur maximum est de &quot;" code="4#la valeur maximum est de #0"/>
        <item algoitem="AFFICHER max" code="3#max#1#pasliste"/>
        <item algoitem="AFFICHER &quot;Il correspond à la saisie n°&quot;" code="4#Il correspond à la saisie n°#0"/>
        <item algoitem="AFFICHER position" code="3#position#0#pasliste"/>
    </item>
    <item algoitem="FIN_ALGORITHME" code="102#finalgo"/>
</Algo>
