# Gestion des Utilisateurs #

> **Date** : 09/01/2023
> **XAMPP Version** : 8.1.10
> **Control Panel Version** : 3.3.0
> **Type de serveur** : MariaDB
> **Version du serveur** : 10.4.25-MariaDB

## Se connecter à MySQL ##

Une fois mysql installé sur votre serveur (dans notre cas via Xampp) on pourra se rendre dans une invite de commande (terminal) et nous rendre dans le dossier de mysql :
(ici : `c:/xampp/mysql/bin`) ou alors ajouter ce même dossier à nos "**path**" dans les "**variables d'environnement**" de l'ordinateur.

Cela fait on pourra lancer la commande suivante :

```shell
mysql -u root -p
```

Elle indique d'utiliser "**mysql**" puis de se connecter avec un utilisateur ("**-u**") nommé "**root**" et qu'il faudra entrer un mot de passe("**-p**").
(Avec Xampp, le mot de passe par défaut de l'utilisateur root est "" rien du tout)

On verra notre **input** remplacé par :

```shell
MariaDB [(none)]>
```

## GESTION DES UTILISATEURS ##

C'est donc ici que seront rentré nos premières commandes.

### Créer un utilisateur ###

On va commencer par créer un nouvel utilisateur plus sécurisé :

```sql
CREATE USER "Nolwenn"@"localhost" IDENTIFIED BY "chaussette";
```

> **Convention** : Les mots clef utilisé en sql sont écrit en majuscule.
> **Règle** : Chaque ligne de code est terminé par un ";".

Ici on trouve les mots-clefs :

- "**CREATE**" qui indique que l'on va créer quelque chose
- "**USER**" qui indique que l'on crée un utilisateur.
- Entre guillemet le nom de l'utilisateur, suivi de "**@**" puis de "**l'hôte**" de l'utilisateur. Nous travaillons en local, donc "**localhost**" sera suffisant.
(dans un cas contraire cela pourrait être une adresse IP ou un URL).
- "**IDENTIFIED BY**" indique que l'on va donner un mot de passe puis entre guillemet le mot de passe.

### Gestions des droits ###

Actuellement notre utilisateur n'a aucun droit, si il se connecte, il ne pourra rien faire.
On va alors lui donner des droits :

```sql
GRANT ALL PRIVILEGES ON * . * TO "Nolwenn"@"localhost";
```

Les mots-clefs sont :

- "**GRANT**" indique que l'on va donner des droits.
- "**ALL PRIVILEGES**" On donne tous les droits.
- "**ON**" Précise sur quel élément il a ces droits.
- "**\* . \***" on indique les BDD, puis un "**.**" suvi des table sur lesquels on a les droits. ("**\***" signifie "**tout**")
- "**TO**" précède l'utilisateur auquel on donne les droits.

Ici on a donné *tous les droits*, sur *toute les BDD* et *toute les tables* à notre utilisateur.

Une fois tout les privileges paramétrés, il est bon d'envoyer le tout avec :

```sql
FLUSH PRIVILEGES;
```

(cela peut marcher sans, mais il vaut mieux faire les choses bien)

Ici on est dans un cas très précis où on veut pouvoir accèder à tout, mais dans le cas d'une entreprise on donnera sûrement accès à nos utilisateurs qu'à certaines BDD, certaines tables ou encore certains droits. Par exemple :

```sql
GRANT CREATE, DROP, DELETE ON truc . * TO "Maurice"@"localhost";
```

(On donne le droit de créer, de jeter ou de supprimer sur toute les tables de la bdd "truc")

Pareillement on peut retirer des droits avec :

```sql
REVOKE DROP, DELETE ON truc . * FROM "Maurice"@"localhost";
```

(On retire les droits de jeter et supprimer sur toute les tables de la bdd "truc")

Selon la version de mysql, cela peut entrainer des erreurs de droit d'accès si ce n'est pas root qui lance cela.

On peut vérifier les droits d'un utilisateur avec :

```sql
SHOW GRANTS FOR "Maurice"@"localhost";
```

- Le mot clef "**SHOW**" indique que l'on veut voir quelque chose.
- On indique ensuite ce qu'on veut voir, ici "**GRANTS**".
- Puis pour qui avec "**FOR**"

### Supprimer et Modifier un Utilisateur ###

Supprimer un utilisateur est possible avec :

```sql
DROP USER "Maurice"@"localhost";
```

On souhaite jeter "**DROP**" un utilisateur.

Pour modifier un mot de passe existant :

```sql
ALTER USER "Maurice"@"localhost" IDENTIFIED BY "machin";
```

- le mot clef "**ALTER**" signifie que l'on va modifier quelque chose.

Enfin, si on souhaite changer d'utilisateur on va devoir quitter MySQL et se reconnecter, pour quitter on utilisera :

```sql
quit;
```
