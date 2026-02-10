<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un fournisseur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
            background: linear-gradient(135deg, rgba(0, 47, 255, 1) 0%, #000000ff 100%);
            min-height: 100vh;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }
        h1 {
            color: #2c3e50;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            font-weight: 600;
            color: #555;
            margin-bottom: 8px;
        }
        .form-control {
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            outline: none;
        }
        .btn-submit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }
        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
            color: white;
        }
        .btn-cancel {
            background: #6c757d;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        .btn-cancel:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(108, 117, 125, 0.3);
            color: white;
        }
        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        .btn-group a, .btn-group button {
            flex: 1;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h1>Ajouter un fournisseur</h1>

    <form method="POST" action="index.php?type=supplier&action=save">
        <div class="form-group">
            <label for="name" class="form-label">Nom du fournisseur</label>
            <input type="text" id="name" name="name" class="form-control" required placeholder="Ex: Random Corporation">
        </div>

        <div class="form-group">
            <label for="phone" class="form-label">Téléphone</label>
            <input type="tel" id="phone" name="phone" class="form-control" placeholder="Ex: +33 9 99 99 99 99">
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" required placeholder="Ex: contact@mail.com">
        </div>

        <div class="btn-group">
            <button type="submit" class="btn-submit">✓ Enregistrer</button>
            <a href="index.php?type=supplier" class="btn-cancel">✕ Annuler</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
