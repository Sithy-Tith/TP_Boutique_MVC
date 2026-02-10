<?php

namespace App\controllers;

use App\models\SupplierModel;

class SupplierController {
    private $supplierModel;

    public function __construct($pdo) {
        $this->supplierModel = new SupplierModel($pdo);
    }

    public function index() {
        $fournisseurs = $this->supplierModel->getAll();
        include __DIR__ . '/../../templates/suppliers/index.php';
    }

    public function create() {
        include __DIR__ . '/../../templates/suppliers/create.php';
    }

    public function save() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $email = $_POST['email'] ?? '';

            if (!empty($name) && !empty($email)) {
                $this->supplierModel->add([
                    'name' => $name,
                    'phone' => $phone,
                    'email' => $email
                ]);
                header('Location: index.php?type=supplier');
                exit();
            }
        }
    }
}

