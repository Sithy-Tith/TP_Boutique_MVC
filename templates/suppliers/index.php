<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fournisseurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            padding: 20px; 
            background: linear-gradient(135deg, #0066ffff 0%, #c3cfe2 100%);
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
        .alert {
            border-radius: 8px;
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }
        .btn-back {
            background: #6c757d;
            color: white;
            padding: 12px 30px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            text-decoration: none;
            border-radius: 8px;
            display: inline-block;
        }
        .btn-back:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(108, 117, 125, 0.3);
            color: white;
        }
    </style>
</head>
<body>

<div class="container-main">
    <h1>🏢 Liste des fournisseurs</h1>

    <div class="btn-add">
        <a href="index.php?type=supplier&action=create" class="btn btn-primary btn-lg">
            ➕ Ajouter un fournisseur
        </a>
    </div>

    <div class="btn-add">
        <a href="index.php" class="btn-back">← Retour aux produits</a>
    </div>

    <?php if (!empty($fournisseurs)): ?>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>👤 Nom</th>
                        <th>📞 Téléphone</th>
                        <th>📧 Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($fournisseurs as $fournisseur): ?>
                        <tr>
                            <td class="fw-500"><?= htmlspecialchars($fournisseur['name']) ?></td>
                            <td><?= htmlspecialchars($fournisseur['phone']) ?></td>
                            <td><?= htmlspecialchars($fournisseur['email']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center" role="alert">
            <h4 class="alert-heading">📭 Aucun fournisseur</h4>
            <p class="mb-0">Aucun fournisseur trouvé.</p>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>