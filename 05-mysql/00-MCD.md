# Diagramme de base de données #

On peut voir une BDD comme tout un tas de fichiers excel.
Chaque BDD contient une à plusieurs tables.
Ces tables sont des tableaux avec des colonnes dont chaque ligne est une nouvelle entrée sauvegardé dans notre BDD.

Les professionnels de la BDD vont, avant de se lancer dans la création de celle ci, la schématiser.
C'est ce qui est nommé un MCD (Modèle Conceptuel de Données).

Il existe plusieurs façon de faire, les plus connus sont "UML" et "MERISE" ou "ER".

Mais le principe que l'on va retrouver dans chacun d'entre eux est le suivant :

1. Dessiner nos différentes tables.
2. Inscrire les colonnes que contiennent nos tables et leurs types.
3. Indiquer les clefs primaires et étrangères.
4. Indiquer les types de relation qui les lies.

Une **clef primaire**, est une colonne qui servira d'identifiant à nos lignes, chaque clef primaire est unique dans la table.

Une **clef étrangère**, est une colonne qui indique à quel autre table, une ligne de notre table est liée.

Les types de relations sont :

1. "One to One" indiquant que :
    - chaque entrée de "T1" ne peut être lié qu'à une entrée de "T2"
    - chaque entrée de "T2" ne peut être lié qu'à une entrée de "T1"
2. "One to Many" indiquant que :
    - chaque entrée de "T1" peut être lié à plusieurs entrées de "T2"
    - chaque entrée de "T2" ne peut être lié qu'à une entrée de "T1"
3. "Many to One" qui est juste l'inverse de "One to Many".
4. "Many to Many" indiquant que :
    - chaque entrée de "T1" peut être lié à plusieurs entrées de "T2"
    - chaque entrée de "T2" peut être lié à plusieurs entrées de "T1"
    (Cette façon de faire sera souvent accompagné d'une nouvelle table servant à faire la liaison.)

On prendra en exemple:

1. "One to One" :
    - Chaque Client à seulement une seule carte bancaire
    - Chaque carte bancaire appartient à un seul client
2. "One to Many" :
    - Chaque Client peut envoyer plusieurs messages.
    - Chaque message à seulement un autheur.
3. "Many to Many" :
    - Chaque client peut mettre en favoris plusieurs produits.
    - Chaque produit peut être mit en favoris par plusieurs clients.

Selon le type de schéma plus ou moins d'autres façons de faire pourront être décrite.

Par exemple "Merise" se base sur l'utilisation de verbe indiquant le lien entre les tables.
"UML" et "Merise" indiqueront les liens de façon chiffré par exemple `1:1` pour un "one to one".
Alors que "ER" l'indiquera de façon fleché `-|---------|-` pour un "one to one".

Vous pouvez retrouver des exemples de diagramme dans le dossier "**ressources/Bieres**".

Pour pousser plus loin l'étude des diagrammes, voir les PDF dans "**ressources/merise**".
