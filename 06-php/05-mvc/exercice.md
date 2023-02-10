# Exercices sur le MVC #

Nous avons créer le CRUD de l'utilisateur en MVC ensemble.

Maintenant c'est à vous de jouer.  
(pensez bien au routeur)

## 1. Authentification ##

Nos utilisateurs peuvent s'inscrire mais pas encore se connecter et se déconnecter. pour cela on aura besoin des fichiers suivants :

    - controller/authController.php
    - view/connexion.php (ou view/auth/connexion.php)

On pourra utiliser le model des utilisateurs pour les requêtes "SQL".

## 2. Messages ##

Dans le cours sur le CRUD, vous aviez eu comme exercice de créer le CRUD pour les messages utilisateur.  
Et bien c'est repartie, à vous de refaire ce CRUD avec une structure MVC.

Pour cela vous aurez besoin des fichiers :

    - controller/messageController.php
    - model/messageModel.php
    - view/message/ ... [read.php, update.php] et optionnellement le delete.php et le create.php

Pensez à gérer les categories de vos messages, pas besoin d'ajouter un CRUD mais un model sera utile :

    - model/categorieModel.php