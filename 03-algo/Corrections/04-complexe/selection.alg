<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description courant="FIN_SI" texte=""/>
    <extension extnom="inactif"/>
    <fonction fctcode="" fctetat="inactif"/>
    <F2 F2defaut="" F2etat="inactif" F2para="" F2lignes=""/>
    <repere repetat="inactif" repcode="-10#10#-10#10#2#2"/>
    <param epaisseurLigne="2" totalBoucles="5000000" maxBoucle="500000" epaisseurPoint="2" totalAffichages="1000" nbDecimales="8" arrondiAuto="vrai"/>
    <item code="200#declarationfonctions" algoitem="FONCTIONS_UTILISEES"/>
    <item code="100#declarationsvariables" algoitem="VARIABLES">
        <item code="1#LISTE#nombres" algoitem="nombres EST_DU_TYPE LISTE"/>
        <item code="1#NOMBRE#i" algoitem="i EST_DU_TYPE NOMBRE"/>
        <item code="1#NOMBRE#j" algoitem="j EST_DU_TYPE NOMBRE"/>
        <item code="1#NOMBRE#tmp" algoitem="tmp EST_DU_TYPE NOMBRE"/>
        <item code="1#NOMBRE#min" algoitem="min EST_DU_TYPE NOMBRE"/>
    </item>
    <item code="101#debutalgo" algoitem="DEBUT_ALGORITHME">
        <item code="19#On crée une liste de 20 nombres aléatoires" algoitem="//On crée une liste de 20 nombres aléatoires"/>
        <item code="12#i#0#19" algoitem="POUR i ALLANT_DE 0 A 19">
            <item code="13#debutpour" algoitem="DEBUT_POUR"/>
            <item code="5#nombres#round(random()*100)#i" algoitem="nombres[i] PREND_LA_VALEUR round(random()*100)"/>
            <item code="3#nombres#0#i" algoitem="AFFICHER nombres[i]"/>
            <item code="4# #0" algoitem="AFFICHER &quot; &quot;"/>
            <item code="14#finpour" algoitem="FIN_POUR"/>
        </item>
        <item code="19#On tri la liste" algoitem="//On tri la liste"/>
        <item code="12#i#0#19" algoitem="POUR i ALLANT_DE 0 A 19">
            <item code="13#debutpour" algoitem="DEBUT_POUR"/>
            <item code="5#min#i#pasliste" algoitem="min PREND_LA_VALEUR i"/>
            <item code="12#j#i+1#19" algoitem="POUR j ALLANT_DE i+1 A 19">
                <item code="13#debutpour" algoitem="DEBUT_POUR"/>
                <item code="6#nombres[j] &lt; nombres[min]" algoitem="SI (nombres[j] &lt; nombres[min]) ALORS">
                    <item code="7#debutsi" algoitem="DEBUT_SI"/>
                    <item code="5#min#j#pasliste" algoitem="min PREND_LA_VALEUR j"/>
                    <item code="8#finsi" algoitem="FIN_SI"/>
                </item>
                <item code="14#finpour" algoitem="FIN_POUR"/>
            </item>
            <item code="5#tmp#nombres[i]#pasliste" algoitem="tmp PREND_LA_VALEUR nombres[i]"/>
            <item code="5#nombres#nombres[min]#i" algoitem="nombres[i] PREND_LA_VALEUR nombres[min]"/>
            <item code="5#nombres#tmp#min" algoitem="nombres[min] PREND_LA_VALEUR tmp"/>
            <item code="14#finpour" algoitem="FIN_POUR"/>
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
