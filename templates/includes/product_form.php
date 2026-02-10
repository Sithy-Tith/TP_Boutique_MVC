<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $produit ? 'Modifier produit' : 'Ajouter produit' ?></title>
    <style>
        form {
            width: 60%;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            margin-left: 10px;
            padding: 10px 20px;
            background: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 3px;
        }

        a:hover {
            background: #5a6268;
        }
    </style>
</head>

<body>

    <h1><?= $produit ? 'Modifier le produit' : 'Ajouter un nouveau produit' ?></h1>

    <form method="POST" action="index.php?action=save">
        <?php if ($produit): ?>
            <input type="hidden" name="id" value="<?= htmlspecialchars($produit['id']) ?>">
        <?php endif; ?>

        <label>Nom du produit:</label>
        <input type="text" name="name" required value="<?= $produit ? htmlspecialchars($produit['name']) : '' ?>">

        <label>Description:</label>
        <textarea name="description" required><?= $produit ? htmlspecialchars($produit['description']) : '' ?></textarea>

        <label>Prix (€):</label>
        <input type="number" step="0.01" name="price" required
            value="<?= $produit ? htmlspecialchars($produit['price']) : '' ?>">

        <label>Quantité en stock:</label>
        <input type="number" name="stock" required value="<?= $produit ? htmlspecialchars($produit['stock']) : '' ?>">

        <label>Fournisseur :</label>
        <select name="fk_supplier" required>
            <option value="">-- Choisir un fournisseur --</option>
            <?php foreach ($fournisseurs as $fournisseur): ?>
                <option value="<?= $fournisseur['id'] ?>" <?= $produit && $produit['fk_supplier'] == $fournisseur['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($fournisseur['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit"><?= $produit ? 'Modifier' : 'Ajouter' ?></button>
        <a href="index.php">Annuler</a>
    </form>

</body>

</html>
