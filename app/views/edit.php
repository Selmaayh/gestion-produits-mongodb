<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un produit</title>
</head>
<body>
    <h1>Modifier un produit</h1>
    <!-- Formulaire de modification, pré-rempli avec les données du produit -->
    <form method="POST" action="/gestion-produits-mongodb/public/edit/<?= (string)$product['_id'] ?>">
        <div>
            <label for="name">Nom:</label>
            <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($product['nom'] ?? '') ?>" required>
        </div>
        <div>
            <label for="quantity">Quantité:</label>
            <input type="number" id="quantite" name="quantite" value="<?= htmlspecialchars($product['quantite'] ?? 0) ?>" required min="0">
        </div>
        <div>
            <label for="price">Prix:</label>
            <input type="number" id="prix" name="prix" value="<?= htmlspecialchars($product['prix'] ?? 0) ?>" required min="0" step="0.01">
        </div>
        <button type="submit">Enregistrer</button>
    </form>
    <!-- Retour à la liste des produits -->
    <p><a href="/gestion-produits-mongodb/public/">Retour à la liste</a></p>
</body>
</html>
