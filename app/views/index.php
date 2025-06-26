<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des produits</title>
</head>
<body>
    <h1>Liste des produits</h1>
    <?php if (!empty($products)) : ?>
        <table border="1" cellpadding="5">
            <thead>
                <tr><th>Nom</th><th>Quantité</th><th>Prix</th><th>Actions</th></tr>
            </thead>
            <tbody>
                <?php foreach ($products as $p): ?>
                    <tr>
                        <td><?= htmlspecialchars($p['nom']) ?></td>
                        <td><?= htmlspecialchars($p['quantite']) ?></td>
                        <td><?= htmlspecialchars($p['prix']) ?></td>
                        <td>
                            <a href="/gestion-produits-mongodb/public/edit/<?= (string)$p['_id'] ?>">Modifier</a>
                            <a href="/gestion-produits-mongodb/public/delete/<?= $p['_id'] ?>" onclick="return confirm('Confirmer la suppression ?')">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucun produit trouvé.</p>
    <?php endif; ?>
<a href="/gestion-produits-mongodb/public/add" class="btn btn-primary">
    Ajouter un produit
</a>
</body>
</html>
