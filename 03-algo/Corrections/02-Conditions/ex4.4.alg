<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description texte="" courant="AFFICHER prix"/>
    <extension extnom="inactif"/>
    <fonction fctcode="" fctetat="inactif"/>
    <F2 F2etat="inactif" F2para="" F2defaut="" F2lignes=""/>
    <repere repcode="-10#10#-10#10#2#2" repetat="inactif"/>
    <param epaisseurLigne="2" arrondiAuto="vrai" nbDecimales="8" maxBoucle="500000" epaisseurPoint="2" totalBoucles="5000000" totalAffichages="1000"/>
    <item code="200#declarationfonctions" algoitem="FONCTIONS_UTILISEES"/>
    <item code="100#declarationsvariables" algoitem="VARIABLES">
        <item code="1#NOMBRE#nbCopie" algoitem="nbCopie EST_DU_TYPE NOMBRE"/>
        <item code="1#NOMBRE#prix" algoitem="prix EST_DU_TYPE NOMBRE"/>
    </item>
    <item code="101#debutalgo" algoitem="DEBUT_ALGORITHME">
        <item code="4#Nombre de photocopies#1" algoitem="AFFICHER &quot;Nombre de photocopies&quot;"/>
        <item code="2#nbCopie#pasliste" algoitem="LIRE nbCopie"/>
        <item code="6#nbCopie &lt;= 10" algoitem="SI (nbCopie &lt;= 10) ALORS">
            <item code="7#debutsi" algoitem="DEBUT_SI"/>
            <item code="5#prix#nbCopie*0.1#pasliste" algoitem="prix PREND_LA_VALEUR nbCopie*0.1"/>
            <item code="8#finsi" algoitem="FIN_SI"/>
            <item code="9#sinon" algoitem="SINON">
                <item code="10#debutsinon" algoitem="DEBUT_SINON"/>
                <item code="6#nbCopie &lt;= 30" algoitem="SI (nbCopie &lt;= 30) ALORS">
                    <item code="7#debutsi" algoitem="DEBUT_SI"/>
                    <item code="5#prix#10 * 0.1 + ( (nbCopie - 10) * 0.09)#pasliste" algoitem="prix PREND_LA_VALEUR 10 * 0.1 + ( (nbCopie - 10) * 0.09)"/>
                    <item code="8#finsi" algoitem="FIN_SI"/>
                    <item code="9#sinon" algoitem="SINON">
                        <item code="10#debutsinon" algoitem="DEBUT_SINON"/>
                        <item code="5#prix#10 * 0.1 + ( 20 * 0.09) + ( (nbCopie -30) * 0.08)#pasliste" algoitem="prix PREND_LA_VALEUR 10 * 0.1 + ( 20 * 0.09) + ( (nbCopie -30) * 0.08)"/>
                        <item code="11#finsinon" algoitem="FIN_SINON"/>
                    </item>
                </item>
                <item code="11#finsinon" algoitem="FIN_SINON"/>
            </item>
        </item>
        <item code="4#Le total est de : #0" algoitem="AFFICHER &quot;Le total est de : &quot;"/>
        <item code="3#prix#1#pasliste" algoitem="AFFICHER prix"/>
    </item>
    <item code="102#finalgo" algoitem="FIN_ALGORITHME"/>
</Algo>
