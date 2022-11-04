<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description texte="" courant="//On affiche la liste trié"/>
    <extension extnom="inactif"/>
    <fonction fctcode="" fctetat="inactif"/>
    <F2 F2etat="inactif" F2lignes="" F2defaut="" F2para=""/>
    <repere repcode="-10#10#-10#10#2#2" repetat="inactif"/>
    <param totalBoucles="5000000" epaisseurPoint="2" epaisseurLigne="2" nbDecimales="8" maxBoucle="500000" arrondiAuto="vrai" totalAffichages="1000"/>
    <item code="200#declarationfonctions" algoitem="FONCTIONS_UTILISEES"/>
    <item code="100#declarationsvariables" algoitem="VARIABLES">
        <item code="1#LISTE#nombres" algoitem="nombres EST_DU_TYPE LISTE"/>
        <item code="1#NOMBRE#changed" algoitem="changed EST_DU_TYPE NOMBRE"/>
        <item code="1#NOMBRE#i" algoitem="i EST_DU_TYPE NOMBRE"/>
        <item code="1#NOMBRE#tmp" algoitem="tmp EST_DU_TYPE NOMBRE"/>
    </item>
    <item code="101#debutalgo" algoitem="DEBUT_ALGORITHME">
        <item code="5#changed#1#pasliste" algoitem="changed PREND_LA_VALEUR 1"/>
        <item code="19#On crée une liste de 20 nombres aléatoires" algoitem="//On crée une liste de 20 nombres aléatoires"/>
        <item code="12#i#0#19" algoitem="POUR i ALLANT_DE 0 A 19">
            <item code="13#debutpour" algoitem="DEBUT_POUR"/>
            <item code="5#nombres#round(random()*100)#i" algoitem="nombres[i] PREND_LA_VALEUR round(random()*100)"/>
            <item code="3#nombres#0#i" algoitem="AFFICHER nombres[i]"/>
            <item code="4# #0" algoitem="AFFICHER &quot; &quot;"/>
            <item code="14#finpour" algoitem="FIN_POUR"/>
        </item>
        <item code="19#On tri la liste" algoitem="//On tri la liste"/>
        <item code="15#changed" algoitem="TANT_QUE (changed) FAIRE">
            <item code="16#debuttantque" algoitem="DEBUT_TANT_QUE"/>
            <item code="5#changed#0#pasliste" algoitem="changed PREND_LA_VALEUR 0"/>
            <item code="12#i#0#18" algoitem="POUR i ALLANT_DE 0 A 18">
                <item code="13#debutpour" algoitem="DEBUT_POUR"/>
                <item code="6#nombres[i] > nombres[i+1]" algoitem="SI (nombres[i] > nombres[i+1]) ALORS">
                    <item code="7#debutsi" algoitem="DEBUT_SI"/>
                    <item code="5#tmp#nombres[i]#pasliste" algoitem="tmp PREND_LA_VALEUR nombres[i]"/>
                    <item code="5#nombres#nombres[i+1]#i" algoitem="nombres[i] PREND_LA_VALEUR nombres[i+1]"/>
                    <item code="5#nombres#tmp#i+1" algoitem="nombres[i+1] PREND_LA_VALEUR tmp"/>
                    <item code="5#changed#1#pasliste" algoitem="changed PREND_LA_VALEUR 1"/>
                    <item code="8#finsi" algoitem="FIN_SI"/>
                </item>
                <item code="14#finpour" algoitem="FIN_POUR"/>
            </item>
            <item code="17#fintantque" algoitem="FIN_TANT_QUE"/>
        </item>
        <item code="19#On affiche la liste trié" algoitem="//On affiche la liste trié"/>
        <item code="4# #1" algoitem="AFFICHER &quot; &quot;"/>
        <item code="4#Après le tri :#1" algoitem="AFFICHER &quot;Après le tri :&quot;"/>
        <item code="12#i#0#19" algoitem="POUR i ALLANT_DE 0 A 19">
            <item code="13#debutpour" algoitem="DEBUT_POUR"/>
            <item code="3#nombres#0#i" algoitem="AFFICHER nombres[i]"/>
            <item code="4# #0" algoitem="AFFICHER &quot; &quot;"/>
            <item code="14#finpour" algoitem="FIN_POUR"/>
        </item>
    </item>
    <item code="102#finalgo" algoitem="FIN_ALGORITHME"/>
</Algo>
