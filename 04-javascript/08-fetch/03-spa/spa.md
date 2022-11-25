# Construire une SPA en JS #

Une SPA ou Single Page Application est une façon très moderne de construire un site internet.
Des tas de site très connus sont en SPA, youtube, twitter et j'en passe.
Ils sont reconnaissable au fait que lorsque l'on clique sur un lien, au lieu de déclencher le chargement d'une nouvelle page, seulement une partie du site change.

La totalité ou du moins la majorité du site fonctionne sur une seule et unique page qui change selon les actions de l'utilisateur.

## 0. settings ##

Il va nous falloir paramètrer quelques points pour bien faire fonctionner notre spa.

En premier lieu, ouvrez une nouvelle fenêtre de vsCode dans laquelle vous allez ouvrir uniquement le dossier de votre spa.

On fait cela car pour "*live-server*" la racine de votre site est votre dossier de travail. Or pour notre SPA on a besoin que la racine du serveur soit le dossier de notre SPA.

En second lieu, on va changer le paramètre de "live serveur" suivant :

```json
"liveServer.settings.file": "index.html"
```

Cela va permètre de rediriger toute les erreurs 404 de notre serveur vers le fichier "index.html";

## 1. La page HTML ##

Créez un index.html contenant au moins :

- Un header et son h1
- Une nav avec un ul contenant 3 li ayant chacun un lien avec pour href :
  - "*/*"
  - "*/contact*"
  - "*/about*"
- Un main vide.

Créez les 4 pages suivantes avec seulement le contenu que devrait contenir le main.  
Pas de "*head*" ni de balise "*body*", "*html*" ou "*doctype*".

- "*404.html*" indique juste que c'est une erreur 404.
- "*about.html*" contient une petite description et une vidéo.
- "*contact.html*" contient un petit formulaire.
- "*home.html*" contient au moins une section avec un titre et un p avec du lorem.

## 2. CSS ##

Comme notre seul head est dans le fichier index.html, nous allons intégrer notre CSS dans ce fichier uniquement.

Faites une structure de page telle que le header soit en haut, la nav à gauche et le main à droite.

Bien qu'elle ne soit pour l'instant pas affiché, préparez du CSS pour que la vidéo ne soit pas trop grande.

## 3. Javascript ##

On rentre maintenant dans le vif du sujet, pour créer notre SPA il va en premier lieu désactiver nos liens.

- Déclarez une fonction "*setLinks*" prenant un argument.
  Utilisez cet argument pour selectionner tous les liens qu'il contient.
  Ajoutez un écouteur d'évènement à ces liens qui renverra vers une fonction "*router*" qui sera déclaré plus tard.
  Optionnellement on peut selectionner tous les liens qui ne contiennent pas "*http*"
- Appelez une première fois la fonction setLinks en lui donnant l'objet "*document*" en argument.
- Selectionnez votre main.
- créez une constante "routes" qui contiendra un objet ayant en "*propriété*" les même string que l'on a mit dans nos "href" et en "*valeur*" des string contenant le chemin réel vers nos fichiers.
  Exemple : "*/*" mène vers "*main.html*"
  Ainsi que la propriété 404 qui mènera vers le fichier 404.html.
- Déclarez une fonction "*router*" qui fera les actions suivantes :
  - Prévenir l'action par défaut de l'évènement.
  - Utilisera la méthode "**pushState()**" de l'objet "history" pour changer l'url de la page par le href du lien que l'on vient de cliquer.
  - Enfin on lancera la fonction "*loadPage*" qu'on déclarera par la suite.
- Déclarez la fonction "*loadPage*" dans laquelle on fera ce qui suis :
  - Déclarer une constante "*path*" qui contiendra la propriété "**pathname**" de l'objet "location".
  Celui ci contient le chemin de l'url de la page en cours.
  - Déclarez une constante "*route*" qui contiendra la propriété de l'objet "*routes*" correspondant à la constante "*path*".
  Si cette propriété n'existe pas, alors route prendra la valeur "*routes[404]*"
  - Faites un fetch sur "*route*" puis si tout s'est bien passé, utilisez la non pas la méthode "*json()*" mais la méthode "**text()**"
    - Dans le "*.then()*" qui suis la méthode "*text()*" on va changer le html de main par celui que l'on récupère de la méthode "*text()*" puis appeler encore une fois notre fonction "*setLinks()*" en lui donnant en argument notre main. Cela nous permettra de prendre en compte les liens qui auraient pu être ajouté.
- Enfin on appellera une première fois notre fonction "*loadPage()*" au chargement de la page, hors de toute fonction.

## 4. Bonus ##

Faire un bouton semi transparent qui va venir se placer sur notre vidéo, et lors du clique sur ce bouton, la vidéo va se placer dans le header ou la nav et se rétrécir.

N'étant plus dans le main, si on change de page, la vidéo continuera de se jouer sans se recharger.
