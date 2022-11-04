<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description texte="" courant="AFFICHER reste"/>
    <extension extnom="inactif"/>
    <fonction fctcode="" fctetat="inactif"/>
    <F2 F2etat="inactif" F2para="" F2defaut="" F2lignes=""/>
    <repere repcode="-10#10#-10#10#2#2" repetat="inactif"/>
    <param epaisseurLigne="2" arrondiAuto="vrai" totalBoucles="5000000" nbDecimales="8" epaisseurPoint="2" maxBoucle="500000" totalAffichages="1000"/>
    <item algoitem="FONCTIONS_UTILISEES" code="200#declarationfonctions"/>
    <item algoitem="VARIABLES" code="100#declarationsvariables">
        <item algoitem="prix EST_DU_TYPE NOMBRE" code="1#NOMBRE#prix"/>
        <item algoitem="total EST_DU_TYPE NOMBRE" code="1#NOMBRE#total"/>
        <item algoitem="monnaie EST_DU_TYPE NOMBRE" code="1#NOMBRE#monnaie"/>
        <item algoitem="nb5e EST_DU_TYPE NOMBRE" code="1#NOMBRE#nb5e"/>
        <item algoitem="nb10e EST_DU_TYPE NOMBRE" code="1#NOMBRE#nb10e"/>
        <item algoitem="montant EST_DU_TYPE NOMBRE" code="1#NOMBRE#montant"/>
        <item algoitem="reste EST_DU_TYPE NOMBRE" code="1#NOMBRE#reste"/>
    </item>
    <item algoitem="DEBUT_ALGORITHME" code="101#debutalgo">
        <item algoitem="prix PREND_LA_VALEUR 1" code="5#prix#1#pasliste"/>
        <item algoitem="total PREND_LA_VALEUR 0" code="5#total#0#pasliste"/>
        <item algoitem="nb5e PREND_LA_VALEUR 0" code="5#nb5e#0#pasliste"/>
        <item algoitem="nb10e PREND_LA_VALEUR 0" code="5#nb10e#0#pasliste"/>
        <item algoitem="TANT_QUE (prix != 0) FAIRE" code="15#prix != 0">
            <item algoitem="DEBUT_TANT_QUE" code="16#debuttantque"/>
            <item algoitem="AFFICHER &quot;Entrer le montant (0 pour arreter)&quot;" code="4#Entrer le montant (0 pour arreter)#1"/>
            <item algoitem="LIRE prix" code="2#prix#pasliste"/>
            <item algoitem="total PREND_LA_VALEUR total + prix" code="5#total#total + prix#pasliste"/>
            <item algoitem="FIN_TANT_QUE" code="17#fintantque"/>
        </item>
        <item algoitem="AFFICHER &quot;Vous devez &quot;" code="4#Vous devez #0"/>
        <item algoitem="AFFICHER total" code="3#total#0#pasliste"/>
        <item algoitem="AFFICHER &quot; €&quot;" code="4# €#1"/>
        <item algoitem="AFFICHER &quot;Montant versé : &quot;" code="4#Montant versé : #1"/>
        <item algoitem="LIRE montant" code="2#montant#pasliste"/>
        <item algoitem="reste PREND_LA_VALEUR montant - total" code="5#reste#montant - total#pasliste"/>
        <item algoitem="TANT_QUE (reste > 10) FAIRE" code="15#reste > 10">
            <item algoitem="DEBUT_TANT_QUE" code="16#debuttantque"/>
            <item algoitem="reste PREND_LA_VALEUR reste - 10" code="5#reste#reste - 10#pasliste"/>
            <item algoitem="nb10e PREND_LA_VALEUR nb10e + 1" code="5#nb10e#nb10e + 1#pasliste"/>
            <item algoitem="FIN_TANT_QUE" code="17#fintantque"/>
        </item>
        <item algoitem="TANT_QUE (reste > 5) FAIRE" code="15#reste > 5">
            <item algoitem="DEBUT_TANT_QUE" code="16#debuttantque"/>
            <item algoitem="reste PREND_LA_VALEUR reste - 5" code="5#reste#reste - 5#pasliste"/>
            <item algoitem="nb5e PREND_LA_VALEUR nb5e + 1" code="5#nb5e#nb5e + 1#pasliste"/>
            <item algoitem="FIN_TANT_QUE" code="17#fintantque"/>
        </item>
        <item algoitem="AFFICHER &quot;Rendu de la monnaie : &quot;" code="4#Rendu de la monnaie : #1"/>
        <item algoitem="AFFICHER &quot;billet(s) de 10 € : &quot;" code="4#billet(s) de 10 € : #0"/>
        <item algoitem="AFFICHER nb10e" code="3#nb10e#1#pasliste"/>
        <item algoitem="AFFICHER &quot;billet(s) de 5 € : &quot;" code="4#billet(s) de 5 € : #0"/>
        <item algoitem="AFFICHER nb5e" code="3#nb5e#1#pasliste"/>
        <item algoitem="AFFICHER &quot;Piece(s) de 1 € : &quot;" code="4#Piece(s) de 1 € : #0"/>
        <item algoitem="AFFICHER reste" code="3#reste#1#pasliste"/>
    </item>
    <item algoitem="FIN_ALGORITHME" code="102#finalgo"/>
</Algo>
