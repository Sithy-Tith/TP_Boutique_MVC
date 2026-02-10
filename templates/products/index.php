<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            padding: 20px; 
            background: linear-gradient(135deg, #a03939ff 0%, #ffffffff 100%);
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
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }
        .btn-add { 
            margin-bottom: 25px; 
            text-align: center;
        }
        .btn-add .btn { 
            padding: 12px 30px; 
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }
        .btn-add .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 123, 255, 0.4);
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
        .badge { 
            padding: 8px 12px; 
            font-size: 0.9rem;
            border-radius: 20px;
        }
        .btn-action { 
            padding: 6px 12px; 
            font-size: 0.85rem;
            transition: all 0.3s ease;
            border: none;
            font-weight: 500;
        }
        .btn-info { 
            background: linear-gradient(135deg, #00b4db 0%, #0083b0 100%);
            color: white;
        }
        .btn-info:hover { 
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 131, 176, 0.4);
            color: white;
        }
        .btn-warning { 
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
        }
        .btn-warning:hover { 
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(245, 87, 108, 0.4);
            color: white;
        }
        .btn-danger { 
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            color: white;
        }
        .btn-danger:hover { 
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(250, 112, 154, 0.4);
            color: white;
        }
        .alert { 
            border-radius: 8px; 
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }
        .alert-info { 
            background: linear-gradient(135deg, #e0f7ff 0%, #f0f9ff 100%);
            color: #0083b0;
        }
        .alert-info a {
            color: #0083b0;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="container-main">
    <h1 class="mb-4">Liste des produits</h1>
    
    <div class="btn-add">
        <a href="index.php?action=form" class="btn btn-primary btn-lg">
            ➕ Ajouter un produit
        </a>
    </div>

    <div class="btn-add">
        <a href="index.php?type=supplier" class="btn btn-primary btn-lg">
            Liste des fournisseurs
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
                                <a href="index.php?action=show&id=<?= $produit['id'] ?>" class="btn btn-sm btn-info btn-action">
                                    👁️ Voir
                                </a>
                                <a href="index.php?action=form&id=<?= $produit['id'] ?>" class="btn btn-sm btn-warning btn-action">
                                    ✏️ Modifier
                                </a>
                                <a href="index.php?action=delete&id=<?= $produit['id'] ?>" class="btn btn-sm btn-danger btn-action" onclick="return confirm('Confirmer la suppression?')">
                                    🗑️ Supprimer
                                </a>
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
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
