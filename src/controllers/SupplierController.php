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
        $supplier = null;
        include __DIR__ . '/../../templates/suppliers/edit.php';
    }

    public function edit($id) {
        $supplier = $this->supplierModel->getById($id);
        include __DIR__ . '/../../templates/suppliers/edit.php';
    }

    public function save() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $name = $_POST['name'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $email = $_POST['email'] ?? '';

            if (!empty($name) && !empty($email)) {
                if ($id) {
                    $this->supplierModel->update($id, [
                        'name' => $name,
                        'phone' => $phone,
                        'email' => $email
                    ]);
                } else {
                    $this->supplierModel->add([
                        'name' => $name,
                        'phone' => $phone,
                        'email' => $email
                    ]);
                }
                header('Location: index.php?type=supplier');
                exit();
            }
        }
    }
}

