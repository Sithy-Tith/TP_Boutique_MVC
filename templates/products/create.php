<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { padding: 20px; background-color: #f8f9fa; }
        .container-main { max-width: 1200px; margin: 0 auto; }
        h1 { color: #333; font-weight: bold; margin-bottom: 30px; text-align: center; }
        .btn-add { margin-bottom: 20px; }
        .table-hover tbody tr:hover { background-color: #f5f5f5; }
        .table th { background-color: #007bff; color: white; }
        .btn-action { padding: 5px 10px; font-size: 0.875rem; }
    </style>
</head>
<body>

<div class="container-main">
    <h1 class="mb-4">Liste des produits</h1>
    
    <div class="btn-add">
        <a href="index.php?action=form" class="btn btn-primary btn-lg">
            <i class="bi bi-plus-circle"></i> Ajouter un produit
        </a>
    </div>

    <?php if (!empty($produits)): ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Produit</th>
                        <th>Fournisseur</th>
                        <th>Prix (€)</th>
                        <th>Quantité</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produits as $produit): ?>
                        <tr>
                            <td><?= htmlspecialchars($produit['name']) ?></td>
                            <td><?= htmlspecialchars($produit['supplier_name']) ?></td>
                            <td><?= number_format($produit['price'], 2, ',', ' ') ?> €</td>
                            <td>
                                <span class="badge bg-info text-dark"><?= htmlspecialchars($produit['stock']) ?></span>
                            </td>
                            <td class="text-center">
                                <a href="index.php?action=form&id=<?= $produit['id'] ?>" class="btn btn-sm btn-warning btn-action">
                                    Modifier
                                </a>
                                <a href="index.php?action=delete&id=<?= $produit['id'] ?>" class="btn btn-sm btn-danger btn-action" onclick="return confirm('Confirmer la suppression?')">
                                    Supprimer
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center" role="alert">
            <h4 class="alert-heading">Aucun produit</h4>
            <p>Aucun produit trouvé.</p>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
