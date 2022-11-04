<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description texte="" courant="FIN_TANT_QUE"/>
    <extension extnom="inactif"/>
    <fonction fctcode="" fctetat="inactif"/>
    <F2 F2para="" F2defaut="" F2etat="inactif" F2lignes=""/>
    <repere repetat="inactif" repcode="-10#10#-10#10#2#2"/>
    <param maxBoucle="500000" nbDecimales="8" totalAffichages="1000" epaisseurPoint="2" totalBoucles="5000000" arrondiAuto="vrai" epaisseurLigne="2"/>
    <item code="200#declarationfonctions" algoitem="FONCTIONS_UTILISEES"/>
    <item code="100#declarationsvariables" algoitem="VARIABLES">
        <item code="1#NOMBRE#target" algoitem="target EST_DU_TYPE NOMBRE"/>
        <item code="1#NOMBRE#play" algoitem="play EST_DU_TYPE NOMBRE"/>
        <item code="1#NOMBRE#guess" algoitem="guess EST_DU_TYPE NOMBRE"/>
        <item code="1#CHAINE#replay" algoitem="replay EST_DU_TYPE CHAINE"/>
        <item code="1#NOMBRE#turn" algoitem="turn EST_DU_TYPE NOMBRE"/>
    </item>
    <item code="101#debutalgo" algoitem="DEBUT_ALGORITHME">
        <item code="5#target#floor(random()*100)#pasliste" algoitem="target PREND_LA_VALEUR floor(random()*100)"/>
        <item code="5#play#1#pasliste" algoitem="play PREND_LA_VALEUR 1"/>
        <item code="5#turn#7#pasliste" algoitem="turn PREND_LA_VALEUR 7"/>
        <item code="4#Choisissez un nombre entre 0 et 100.#1" algoitem="AFFICHER &quot;Choisissez un nombre entre 0 et 100.&quot;"/>
        <item code="15#play==1" algoitem="TANT_QUE (play==1) FAIRE">
            <item code="16#debuttantque" algoitem="DEBUT_TANT_QUE"/>
            <item code="2#guess#pasliste" algoitem="LIRE guess"/>
            <item code="5#turn#turn-1#pasliste" algoitem="turn PREND_LA_VALEUR turn-1"/>
            <item code="6#(guess == target ) OU (turn == 0)" algoitem="SI ((guess == target ) OU (turn == 0)) ALORS">
                <item code="7#debutsi" algoitem="DEBUT_SI"/>
                <item code="6#guess == target" algoitem="SI (guess == target) ALORS">
                    <item code="7#debutsi" algoitem="DEBUT_SI"/>
                    <item code="4#Victoire ! Cela vous a prit #0" algoitem="AFFICHER &quot;Victoire ! Cela vous a prit &quot;"/>
                    <item code="20#7-turn#0" algoitem="AFFICHERCALCUL 7-turn"/>
                    <item code="4# coups.#1" algoitem="AFFICHER &quot; coups.&quot;"/>
                    <item code="8#finsi" algoitem="FIN_SI"/>
                    <item code="9#sinon" algoitem="SINON">
                        <item code="10#debutsinon" algoitem="DEBUT_SINON"/>
                        <item code="4#Perdu ! Vous avez été trop long !#1" algoitem="AFFICHER &quot;Perdu ! Vous avez été trop long !&quot;"/>
                        <item code="11#finsinon" algoitem="FIN_SINON"/>
                    </item>
                </item>
                <item code="4#Voulez vous rejouer? (oui/non)#1" algoitem="AFFICHER &quot;Voulez vous rejouer? (oui/non)&quot;"/>
                <item code="2#replay#pasliste" algoitem="LIRE replay"/>
                <item code="6#replay == &quot;oui&quot;" algoitem="SI (replay == &quot;oui&quot;) ALORS">
                    <item code="7#debutsi" algoitem="DEBUT_SI"/>
                    <item code="5#target#floor(random()*100)#pasliste" algoitem="target PREND_LA_VALEUR floor(random()*100)"/>
                    <item code="5#turn#7#pasliste" algoitem="turn PREND_LA_VALEUR 7"/>
                    <item code="8#finsi" algoitem="FIN_SI"/>
                    <item code="9#sinon" algoitem="SINON">
                        <item code="10#debutsinon" algoitem="DEBUT_SINON"/>
                        <item code="5#play#0#pasliste" algoitem="play PREND_LA_VALEUR 0"/>
                        <item code="11#finsinon" algoitem="FIN_SINON"/>
                    </item>
                </item>
                <item code="8#finsi" algoitem="FIN_SI"/>
                <item code="9#sinon" algoitem="SINON">
                    <item code="10#debutsinon" algoitem="DEBUT_SINON"/>
                    <item code="6#guess > target" algoitem="SI (guess > target) ALORS">
                        <item code="7#debutsi" algoitem="DEBUT_SI"/>
                        <item code="4#Plus petit!#1" algoitem="AFFICHER &quot;Plus petit!&quot;"/>
                        <item code="8#finsi" algoitem="FIN_SI"/>
                        <item code="9#sinon" algoitem="SINON">
                            <item code="10#debutsinon" algoitem="DEBUT_SINON"/>
                            <item code="4#Plus grand !#1" algoitem="AFFICHER &quot;Plus grand !&quot;"/>
                            <item code="11#finsinon" algoitem="FIN_SINON"/>
                        </item>
                    </item>
                    <item code="11#finsinon" algoitem="FIN_SINON"/>
                </item>
            </item>
            <item code="17#fintantque" algoitem="FIN_TANT_QUE"/>
        </item>
    </item>
    <item code="102#finalgo" algoitem="FIN_ALGORITHME"/>
</Algo>
