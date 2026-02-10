<?php

namespace App\models;

use PDO;
use PDOException;

class SupplierModel
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Récupérer tous les fournisseurs
     */
    public function getAll(): array
    {
        try {
            $stmt = $this->pdo->query("
                SELECT id, name, phone, email FROM suppliers ORDER BY name
            ");

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            throw new PDOException("Erreur SQL (getAll) : " . $e->getMessage());
        }
    }

    /**
     * Ajouter un nouveau fournisseur
     */
    public function add(array $data): void
    {
        try {
            $stmt = $this->pdo->prepare("
                INSERT INTO suppliers (name, phone, email)
                VALUES (:name, :phone, :email)
            ");

            $stmt->execute([
                ':name' => $data['name'],
                ':phone' => $data['phone'],
                ':email' => $data['email']
            ]);

        } catch (PDOException $e) {
            throw new PDOException("Erreur SQL (add) : " . $e->getMessage());
        }
    }
}
