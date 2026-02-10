<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/services/Database.php';

use Dotenv\Dotenv;
use App\controllers\ProductController;
use App\controllers\SupplierController;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$type = $_GET['type'] ?? 'product';
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

if ($type === 'supplier') {
    $controller = new SupplierController($pdo);
    switch ($action) {
        case 'create':
            $controller->create();
            break;

        case 'save':
            $controller->save();
            break;
        
        case 'index':
        default:
            $controller->index();
    }
} else {
    $controller = new ProductController($pdo);
    switch ($action) {
        case 'form':
            $controller->form($id);
            break;

        case 'show':
            $controller->show($id);
            break;

        case 'save':
            $controller->save();
            break;

        case 'delete':
            $controller->delete($id);
            break;

        default:
            $controller->index();
    }
}
