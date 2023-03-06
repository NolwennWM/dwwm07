# Les CMS #

Détail du cours :

- **Date**: 03/2023
- **WordPress**: 6.1.1
- **PHP**: 8.2
- **OS**: win32 x64
- **Inspiration** : <https://capitainewp.io>

Un CMS est un content management system, un système de gestion de contenu. C'est un outil développé dans un langage donné. (PHP pour WordPress et PrestaShop par exemple). et qui permet à des utilisateurs ne comprenant absolument rien au développement, de créer leurs propres sites internet.

Nous allons voir comment créer un site avec wordpress et découvrir ce qu'un développeur peut faire de plus avec cet outil.

Chaque CMS à ses spécialités, PrestaShop est fait pour des sites e-commerce, Piwigo pour des galeries photo, Wordpress est fait pour des blogs.  
Enfin sur le papier car avec ses nombreuses extensions, il est possible avec Wordpress de créer toute sorte de site. (vitrine, e-commerce et j'en passe)

## Installation de Wordpress ##

Les CMS se veulent tout publique, donc généralement l'installation est des plus simples. Ici on va commencer par télécharger Wordpress directement depuis le site, pas de ligne de commande ou autre.

<https://wordpress.org/download/>

Ensuite on va extraire le dossier et le déplacer à la racine de notre serveur. (En utilisant un vhost ou non).

Puis on crée une nouvelle BDD qui servira à accueillir les données (nombreuse) de Wordpress. (Pour l'exemple présent, je vais juste l'appeler "*wordpress*")

Enfin il ne nous reste plus qu'à nous rendre sur notre dossier wordpress via notre navigateur favoris. Il nous demande alors plusieurs choses comme :

- la langue voulu.
- Il nous prévient alors de ce dont on aura besoin pour l'installation.
- Il nous demande alors les informations de la bdd:
  - le nom de la BDD.
  - l'identifiant pour s'y connecter.
  - le mot de passe.
  - l'adresse de la BDD.
  - et avec quoi vous souhaiter préfixer les tables de la BDD. (utile si on a plusieurs projet wordpress sur une même bdd).
- On peut donc lancer l'installation du site.
- Il nous demande de nouvelles informations :
  - Le titre du site.
  - L'identifiant de l'administrateur.
  - son mot de passe (il vous en propose un aléatoire)
  - une adresse email.
  - Et si on souhaite cacher ce site aux moteurs de recherche.

Nous voilà sur la page de connexion, elle est accessible par une de ces deux adresses au choix :

- "/wp-login.php"
- "/admin"

Une fois connecté nous avons accès au back office de wordpress. L'installation est terminé.
