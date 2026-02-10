<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $produit ? 'Modifier produit' : 'Ajouter produit' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
            background: linear-gradient(135deg, #000000ff 0%, #f8f9fa 100%);
            min-height: 100vh;
        }
        .container-main {
            max-width: 700px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }
        h1 {
            color: #2c3e50;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
        }
        .form-label {
            font-weight: 600;
            color: #495057;
            margin-top: 15px;
            margin-bottom: 8px;
        }
        .form-control, .form-select {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 10px 15px;
            transition: all 0.3s ease;
        }
        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .btn-container {
            margin-top: 30px;
            display: flex;
            gap: 10px;
            justify-content: center;
        }
        .btn-submit {
            color: white;
            background: linear-gradient(135deg, #000000ff 0%, #000000ff 100%);
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
            color: white;
        }
        .btn-cancel {
            background: #6c757dff;
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            display: inline-block;
        }
        .btn-cancel:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(108, 117, 125, 0.3);
            color: white;
        }
    </style>
</head>
<body>

<div class="container-main">
    <h1><?= $produit ? 'Modifier le produit' : '➕ Ajouter un nouveau produit' ?></h1>

    <form method="POST" action="index.php?type=product&action=save">
        <?php if ($produit): ?>
            <input type="hidden" name="id" value="<?= htmlspecialchars($produit['id']) ?>">
        <?php endif; ?>

        <label for="name" class="form-label">Nom du produit</label>
        <input type="text" class="form-control" id="name" name="name" required value="<?= $produit ? htmlspecialchars($produit['name']) : '' ?>">

        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" required><?= $produit ? htmlspecialchars($produit['description']) : '' ?></textarea>

        <label for="price" class="form-label">Prix (€)</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price" required value="<?= $produit ? htmlspecialchars($produit['price']) : '' ?>">

        <label for="stock" class="form-label">Quantité en stock</label>
        <input type="number" class="form-control" id="stock" name="stock" required value="<?= $produit ? htmlspecialchars($produit['stock']) : '' ?>">

        <label for="supplier" class="form-label">Fournisseur</label>
        <select class="form-select" id="supplier" name="fk_supplier" required>
            <option value="">-- Choisir un fournisseur --</option>
            <?php foreach ($fournisseurs as $fournisseur): ?>
                <option value="<?= $fournisseur['id'] ?>" <?= $produit && $produit['fk_supplier'] == $fournisseur['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($fournisseur['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <div class="btn-container">
            <button type="submit" class="btn btn-submit"><?= $produit ? '✓ Modifier' : '✓ Ajouter' ?></button>
            <a href="index.php" class="btn-cancel">✕ Annuler</a>
        </div>
    </form>
</div>



</html>