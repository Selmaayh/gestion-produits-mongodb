<?php

// On inclut l'autoloader de Composer pour pouvoir utiliser la bibliothèque MongoDB
require_once __DIR__ . '/../../vendor/autoload.php'; 

use MongoDB\Client;

// Modèle Product : gère les opérations sur les produits dans MongoDB
class Product
{
    private $collection;// Représente la collection MongoDB "produits"

    // Constructeur : se connecte à la base MongoDB et sélectionne la collection "produits"
    public function __construct()
    {
        // Connexion au serveur MongoDB local
        $client = new Client("mongodb://localhost:27017");

        // On choisit la base de données "testdb" et la collection "produits"
        $this->collection = $client->testdb->produits;
    }
// Récupère tous les produits dans la collection
    public function getAll()
    {
        // On utilise find() pour récupérer tous les documents, et on les convertit en tableau
        return $this->collection->find()->toArray();
    }

 // Insère un nouveau produit dans la collection
    public function insert($data)
    {
        $this->collection->insertOne($data);
    }
// Trouve un produit par son identifiant (_id)
    public function findById($id)
    {
        // On transforme l'ID (string) en ObjectId de MongoDB
        return $this->collection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    }
// On transforme l'ID (string) en ObjectId de MongoDB
    public function update($id, $data)
    {
        $this->collection->updateOne(
            ['_id' => new MongoDB\BSON\ObjectId($id)],
            ['$set' => $data]
        );
    }
// Supprime un produit de la collection par son identifiant
    public function delete($id)
    {
        $this->collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    }
}
