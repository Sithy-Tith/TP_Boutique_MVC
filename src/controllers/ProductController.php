<?php

namespace App\controllers;

use App\models\ProductModel;
use App\models\SupplierModel;
use PDOException;

class ProductController
{
    private $model;
    private $pdo;
    
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->model = new ProductModel($pdo);
    }

    // Afficher la liste des produits
    public function index()
    {
        $produits = $this->model->getAll();
        include __DIR__ . '/../../templates/products/index.php';
    }

    // Formulaire d'ajout/modification
    public function form($id = null)
    {
        $produit = $id ? $this->model->getById($id) : null;
        $supplierModel = new SupplierModel($this->pdo);
        $fournisseurs = $supplierModel->getAll();
        include __DIR__ . '/../../templates/products/edit.php';
    }
    public function save()
    {
        $data = $_POST;
        if (!empty($_POST['id'])) {
            $this->model->update($_POST['id'], $data);
        } else {
            $this->model->add($data);
        }
        header('Location: index.php');
    }
    public function show($id)
    {
        $produit = $this->model->getById($id);
        $supplierModel = new SupplierModel($this->pdo);
        $suppliers = $supplierModel->getAll();
        $supplier_name = '';
        foreach ($suppliers as $supplier) {
            if ($supplier['id'] == $produit['fk_supplier']) {
                $supplier_name = $supplier['name'];
                break;
            }
        }
        include __DIR__ . '/../../templates/products/show.php';
    }
    
    public function delete($id)
    {
        $this->model->delete($id);
        header('Location: index.php');
    }

}

