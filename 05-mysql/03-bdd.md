# Gestion des bases de données #

Maintenant qu'on a accès à **mysql** avec l'utilisateur voulu, parlons **BDD**, une base de donnée c'est un ensemble de **table** (tableau) contenant des informations dans différentes **colonnes**.

On aura généralement une BDD par projet, mais techniquement rien ne nous empêche de séparer notre projet en plusieurs BDD.
Pour des questions d'organisation, on évitera simplement de prendre une seule BDD pour plusieurs projets différents. (Sauf si ils partagents un même sujet, par exemple plusieurs projets ayant besoin d'une BDD de film.)

Créons une BDD :

```sql
CREATE DATABASE firstBDD;
```

Ici on a tout simplement le mot clef "**CREATE**" suivi de ce que l'on souhaite créer "**DATABASE**"
Enfin le nom donné à notre bdd. (ici firstBDD)

si on fait :

```sql
SHOW DATABASES;
```

Nous verrons toute nos bdd, certaine déjà présente ne sont pas à toucher et servent au bon fonctionnement d'outil accompagnant xampp.

On remarquera aussi que notre "**firstBDD**" se voit transformé en "**firstbdd**" les majuscules
sont ignoré, mais cela peut dépendre de la configuration de votre serveur.
On évitera les caractères "**/**", "**\\**" et "**.**" mais pour les autres cela dépend de votre serveur.

Le mieux est de faire simple et de rester en dessous de 255 caractères.

Si on souhaite supprimer une bdd ce sera :

```sql
DROP DATABASE firstbdd;
```

"**DROP**" indique que l'on souhaite jeter quelque chose, notre "**DATABASE**" suivi de son nom.

Il nous faudra ensuite indiquer quelle BDD on souhaite utiliser pour nos prochaines commandes :

```sql
USE firstbdd;
```

on utilise "**USE**" pour indiquer la BDD que l'on souhaite utiliser.
Son nom nous sera indiqué juste à côté de nos inputs.

```shell
MariaDB [firstbdd]>
```
