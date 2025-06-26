<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un produit</title>
</head>
<body>
    <h1>Ajouter un produit</h1>
     <!-- Formulaire pour ajouter un nouveau produit -->
    <form method="POST" action="/gestion-produits-mongodb/public/add">
        <div>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div>
            <label for="quantite">Quantité:</label>
            <input type="number" id="quantite" name="quantite" required min="0">
        </div>
        <div>
            <label for="prix">Prix:</label>
            <input type="number" id="prix" name="prix" required min="0" step="0.01">
        </div>
        <button type="submit">Ajouter</button>
    </form>
      <!-- Lien pour retourner à la page d'accueil -->
    <p><a href="/gestion-produits-mongodb/public/">Retour à la liste</a></p>
</body>
</html>