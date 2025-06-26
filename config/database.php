<?php

// === FICHIER: config/database.php ===
// Ce fichier gère la connexion à la base de données MongoDB

// On charge l'autoloader de Composer pour accéder à la classe MongoDB\Client
require_once __DIR__ . '/../vendor/autoload.php';

use MongoDB\Client;
// Classe Database : fournit une connexion unique à la base MongoDB
class Database {
    // Variable statique pour stocker le client MongoDB (singleton)
    private static $client = null;
// Méthode statique qui retourne la connexion à la base de données "testdb"
    public static function getConnection() {
        // Si la connexion n'existe pas encore, on la crée
        if (self::$client === null) {
            $uri = "mongodb://localhost:27017";// Adresse du serveur MongoDB local
            self::$client = new Client($uri);// Connexion au serveur
        }
         // On retourne la base de données "testdb"
        return self::$client->testdb;
    }
}