# Quelques commandes pour la cli de symfony

permet de *verifier si l'environnement technique est compatible avec les besoins de symfony*

```shell
symfony check:requirements
```

permet de *verifier les vulnérabilités de sécurité*

```shell
symfony check:security
```

permet de *créer une nouvelle application symfony (remplacer 'my_project_directory' par le nom du site)(retirer '--webapp' si vous souhaitez créer une API)*

```shell
symfony new my_project_directory --webapp
```

permet *la création de la base de donnée (le fichier .env doit être renseigné au préalable)*

```shell
symfony console d:d:c
# ou
symfony console doctrine:database:create
```

permet de *créer un controller*

```shell
symfony console ma:con nomController
# ou
symfony console make:controller nomController
```

permet de *créer une entity*

```shell
symfony console m:e nomEntite
# ou
symfony console make:entity nomEntite
```

permet de *créer une migration*

```shell
symfony console m:mi
# ou
symfony console make:migration
```

permet d'*executer les migrations en attente*

```shell
symfony console d:m:m
# ou
symfony console doctrine:migrations:migrate
```

permet de *vider le cache de symfony*

```shell
symfony console c:c
# ou
symfony console cache:clear
```

permet de *démarrer le serveur web interne symfony*

```shell
symfony server:start
```

permet d'*ouvrir le navigateur sur la page du site symfony*

```shell
symfony open:local
```

permet de *voir les serveur web interne symfony*

```shell
symfony server:log
```

permet de *stopper le serveur web interne symfony*

```shell
symfony server:stop
```
