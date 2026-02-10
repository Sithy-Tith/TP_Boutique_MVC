<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($produit) ? 'Détails du produit' : 'Produits' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        .container-main {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #2c3e50;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
        }
        .detail-card {
            max-width: 700px;
            margin: 0 auto;
            background: linear-gradient(135deg, #f5f7fa 0%, #f9f9f9 100%);
            border: none;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .detail-item {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        .detail-item:last-child {
            border-bottom: none;
        }
        .detail-label {
            font-weight: 600;
            color: #667eea;
            display: block;
            margin-bottom: 5px;
        }
        .detail-value {
            color: #333;
            font-size: 1.1rem;
        }
        .badge {
            padding: 8px 12px;
            border-radius: 20px;
            font-size: 0.9rem;
        }
        .btn-action {
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            margin: 5px;
            border-radius: 8px;
        }
        .btn-modify {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
        }
        .btn-modify:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(245, 87, 108, 0.4);
            color: white;
        }
        .btn-delete {
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            color: white;
        }
        .btn-delete:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(250, 112, 154, 0.4);
            color: white;
        }
        .btn-back {
            background: #6c757d;
            color: white;
        }
        .btn-back:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(108, 117, 125, 0.3);
            color: white;
        }
        .btn-add {
            margin-bottom: 25px;
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px 30px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
            color: white;
        }
        .table {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }
        .table thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .table th {
            color: white;
            font-weight: 600;
            border: none;
            padding: 15px 10px;
        }
        .table tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid #eee;
        }
        .table tbody tr:hover {
            background-color: #f8f9fa;
            transform: scale(1.01);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .table td {
            padding: 12px 10px;
            vertical-align: middle;
        }
        .alert {
            border-radius: 8px;
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }
        .btn-view {
            background: linear-gradient(135deg, #00b4db 0%, #0083b0 100%);
            color: white;
        }
        .btn-view:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 131, 176, 0.4);
            color: white;
        }
    </style>
</head>
<body>

<div class="container-main">

<?php if (isset($produit)): ?>
    <!-- Affichage des détails d'un produit -->
    <h1>📦 Détails du produit</h1>
    <div class="detail-card card">
        <div class="card-body">
            <div class="detail-item">
                <span class="detail-label">Nom du produit</span>
                <span class="detail-value"><?= htmlspecialchars($produit['name']) ?></span>
            </div>

            <div class="detail-item">
                <span class="detail-label">Description</span>
                <span class="detail-value"><?= htmlspecialchars($produit['description']) ?></span>
            </div>

            <div class="detail-item">
                <span class="detail-label">Fournisseur</span>
                <span class="detail-value"><?= htmlspecialchars($supplier_name) ?></span>
            </div>

            <div class="detail-item">
                <span class="detail-label">Prix</span>
                <span class="detail-value"><?= number_format($produit['price'], 2, ',', ' ') ?> €</span>
            </div>

            <div class="detail-item">
                <span class="detail-label">Quantité en stock</span>
                <span class="badge bg-primary"><?= htmlspecialchars($produit['stock']) ?> u.</span>
            </div>

            <div class="mt-4 text-center">
                <a href="index.php?action=form&id=<?= $produit['id'] ?>" class="btn btn-action btn-modify">✏️ Modifier</a>
                <a href="index.php?action=delete&id=<?= $produit['id'] ?>" class="btn btn-action btn-delete" onclick="return confirm('Confirmer la suppression?')">🗑️ Supprimer</a>
                <a href="index.php" class="btn btn-action btn-back">← Retour</a>
            </div>
        </div>
    </div>

<?php else: ?>
    <!-- Affichage de la liste des produits -->
    <h1>📦 Liste des produits</h1>

    <div class="btn-add text-center">
        <a href="index.php?action=form" class="btn btn-primary btn-lg">
            ➕ Ajouter un produit
        </a>
    </div>

    <?php if (!empty($produits)): ?>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>📝 Produit</th>
                        <th>🏢 Fournisseur</th>
                        <th>💰 Prix</th>
                        <th>📊 Quantité</th>
                        <th class="text-center">⚙️ Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produits as $produit): ?>
                        <tr>
                            <td class="fw-500"><?= htmlspecialchars($produit['name']) ?></td>
                            <td><?= htmlspecialchars($produit['supplier_name']) ?></td>
                            <td class="fw-bold"><?= number_format($produit['price'], 2, ',', ' ') ?> €</td>
                            <td>
                                <span class="badge bg-primary"><?= htmlspecialchars($produit['stock']) ?> u.</span>
                            </td>
                            <td class="text-center">
                                <a href="index.php?action=show&id=<?= $produit['id'] ?>" class="btn btn-sm btn-action btn-view">👁️ Voir</a>
                                <a href="index.php?action=form&id=<?= $produit['id'] ?>" class="btn btn-sm btn-action btn-modify">✏️ Modifier</a>
                                <a href="index.php?action=delete&id=<?= $produit['id'] ?>" class="btn btn-sm btn-action btn-delete" onclick="return confirm('Confirmer la suppression?')">🗑️ Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center" role="alert">
            <h4 class="alert-heading">📭 Aucun produit</h4>
            <p class="mb-0">Aucun produit trouvé. <a href="index.php?action=form">Créez en un maintenant</a></p>
        </div>
    <?php endif; ?>
<?php endif; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
