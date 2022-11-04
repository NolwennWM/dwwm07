<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description texte="" courant="SI ((i == 1) ou (nb > max)) ALORS"/>
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
        <item algoitem="AFFICHER &quot;le programme vous demandera continuellement des nombre(s) tant que la valeur saisie est différente de 0&quot;" code="4#le programme vous demandera continuellement des nombre(s) tant que la valeur saisie est différente de 0#0"/>
        <item algoitem="AFFICHER &quot;ensuite il vous dira quel était le plus grand parmi ces nombres et à quel saisie il correspond&quot;" code="4#ensuite il vous dira quel était le plus grand parmi ces nombres et à quel saisie il correspond#1"/>
        <item algoitem="nb PREND_LA_VALEUR 1" code="5#nb#1#pasliste"/>
        <item algoitem="i PREND_LA_VALEUR 1" code="5#i#1#pasliste"/>
        <item algoitem="TANT_QUE (nb != 0) FAIRE" code="15#nb != 0">
            <item algoitem="DEBUT_TANT_QUE" code="16#debuttantque"/>
            <item algoitem="AFFICHER &quot;saisie n°&quot;" code="4#saisie n°#0"/>
            <item algoitem="AFFICHER i" code="3#i#1#pasliste"/>
            <item algoitem="LIRE nb" code="2#nb#pasliste"/>
            <item algoitem="SI ((i == 1) ou (nb > max)) ALORS" code="6#(i == 1) ou (nb > max)">
                <item algoitem="DEBUT_SI" code="7#debutsi"/>
                <item algoitem="max PREND_LA_VALEUR nb" code="5#max#nb#pasliste"/>
                <item algoitem="position PREND_LA_VALEUR i" code="5#position#i#pasliste"/>
                <item algoitem="FIN_SI" code="8#finsi"/>
            </item>
            <item algoitem="i PREND_LA_VALEUR i + 1" code="5#i#i + 1#pasliste"/>
            <item algoitem="FIN_TANT_QUE" code="17#fintantque"/>
        </item>
        <item algoitem="AFFICHER &quot;la valeur maximum est de &quot;" code="4#la valeur maximum est de #0"/>
        <item algoitem="AFFICHER max" code="3#max#1#pasliste"/>
        <item algoitem="AFFICHER &quot;Il correspond à la saisie n°&quot;" code="4#Il correspond à la saisie n°#0"/>
        <item algoitem="AFFICHER position" code="3#position#0#pasliste"/>
    </item>
    <item algoitem="FIN_ALGORITHME" code="102#finalgo"/>
</Algo>
