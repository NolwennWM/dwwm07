# Exercices sur Symfony #

## 1. To Do List en Session ##

Nous allons créer une todolist qui sauvegarde les données dans un tableau associatif en session.

![screenshot todolist](../ressources/images/symfony-todolist.PNG)

Par exemple la route "**/todo/add/coder/faire la todolist avec symfony**" devra créer dans notre tableau en session ceci :

```php
["coder"=>"faire la todolist avec symfony"];
```

cela va de même pour l'update et le delete.

Pour cela vous allez devoir :

- Créer un contrôleur "**ToDoController.php**".
- Créer un CRUD todo + un reset (5 méthodes avec 5 routes).
- Vous devrez utiliser les paramètres des routes pour passer les informations.
- Stocker les informations dans un tableau en session.
- Utiliser des flash Message pour indiquer ce qui a été fait ou non.
- Optionnellement j'ai utilisé un CDN bootstrap pour mettre en forme la page.

## 2. blog ##

Nous avions appelé notre BDD "Symfony blog" il me semble, il est temps de refaire notre blog précédent mais avec symfony.

- Ajouter les entités "**message**" et "**categorie**".
- Faites le crud pour les deux entités.
- Seul les administrateurs doivent pouvoir voir les pages Create, Update et delete de Catégorie.
- Seul l'utilisateur connecté peut ajouter des messages.
- L'utilisateur connecté ne peut modifier et supprimer que ses propres messages.
- En cliquant sur une catégorie dans le Read de catégorie, on doit pouvoir voir tous les messages de cette catégorie.

## 3. Bundle ##

Essayez d'installer et d'utiliser seul un bundle de Symfony, savoir lire la documentation est important. Voici quelques exemples :

- Easyadmin, très pratique pour faire une zone administrateur rapidement.
- LiipImagineBundle, permet la manipulation d'image.
- FOSCKEditorBundle, intègre un Wysisyg, pratique pour la mise en forme de message.

Et plein d'autres sont disponible.
