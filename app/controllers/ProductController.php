<?php
// On inclut le modèle Product qui gère les interactions avec la base MongoDB
require_once __DIR__ . '/../models/Product.php';

// Contrôleur principal pour gérer les produits
class ProductController
{
    private $model; // Instance du modèle Product

    // Constructeur : initialise le modèle Product
    public function __construct()
    {
        $this->model = new Product();
    }

    
    // Méthode qui affiche tous les produits (page d'accueil)
    public function index()
    {
         // On récupère tous les produits depuis la base
        $products = $this->model->getAll();
         // On affiche la vue index (liste des produits)
  require_once __DIR__ . '/../views/index.php';
    }

    // Méthode qui affiche le formulaire d'ajout + traite l'envoi POST
    public function add()
{
    // Si le formulaire est soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         // On récupère les données envoyées en POST
        $data = [
            'nom' => $_POST['nom'] ?? '',
            'quantite' => (int) ($_POST['quantite'] ?? 0),
            'prix' => (float) ($_POST['prix'] ?? 0)
        ];
         // On insère le produit dans la base
        $this->model->insert($data);

        // On redirige vers la page d'accueil après ajout
        header('Location: /gestion-produits-mongodb/public/');
        exit();
    }
     // Si ce n'est pas un POST, on affiche le formulaire
    require_once __DIR__ . '/../views/add.php'; 
}

    // Méthode pour modifier un produit (affiche le formulaire + traite la modification)
    public function edit($id)
    {
        // Si le formulaire est soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

         // On récupère les données modifiées
            $data = [
                'nom' => $_POST['nom'] ?? '',
                'quantite' => (int) ($_POST['quantite'] ?? 0),
                'prix' => (float) ($_POST['prix'] ?? 0)
            ];
            // On met à jour le produit avec l'ID donné
            $this->model->update($id, $data);
                        // Redirection vers l'accueil après modification

            header('Location: /gestion-produits-mongodb/public/');
            exit();
        }
        // Si ce n'est pas un POST, on récupère les infos du produit à modifier
        $product = $this->model->findById($id);
         // Si le produit n'existe pas, on affiche une erreur 404
        if (!$product) {
            http_response_code(404);
            echo "Produit non trouvé";
            exit();
        }
         // On affiche le formulaire de modification
        require_once __DIR__ . '/../views/edit.php';
    }

      // Méthode pour supprimer un produit
    public function delete($id)
    {
        // On appelle le modèle pour supprimer le produit
        $this->model->delete($id);
        // Redirection vers la page d'accueil après suppression
        header('Location: /gestion-produits-mongodb/public/');
        exit();
    }
}
