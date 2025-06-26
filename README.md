# Gestion de Produits avec PHP (MVC) et MongoDB

## Description

Ce projet est une application simple de gestion de produits réalisée en PHP avec une architecture MVC manuelle.  
Les données sont stockées dans une base NoSQL MongoDB, accessible via l’extension `php_mongodb` et la bibliothèque officielle MongoDB pour PHP.
## Fonctionnalités

- Affichage de la liste des produits
- Ajout d’un produit (nom, quantité, prix)
- Modification d’un produit existant
- Suppression d’un produit
- Utilisation de MongoDB comme base de données NoSQL
- ## Structure du projet

- `public/index.php` : point d’entrée, gestion des routes simples
- `app/Controllers/ProductController.php` : logique métier et gestion des requêtes
- `app/models/Product.php` : accès à la collection MongoDB
- `app/views/` : templates HTML (liste, ajout, modification)
- `config/database.php` : configuration de la connexion à MongoDB
- ## Connexion PHP à MongoDB

Le projet utilise l’extension PHP `php_mongodb` et la bibliothèque MongoDB via Composer (`mongodb/mongodb`).  
La connexion est créée avec :
```php
use MongoDB\Client;

$client = new Client("mongodb://localhost:27017");
$collection = $client->testdb->produits;
