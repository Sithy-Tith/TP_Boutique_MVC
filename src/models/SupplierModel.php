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

    /**
     * Récupérer un fournisseur par son ID
     */
    public function getById(int $id): ?array
    {
        try {
            $stmt = $this->pdo->prepare("
                SELECT id, name, phone, email FROM suppliers WHERE id = ?
            ");
            $stmt->execute([$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ?: null;
        } catch (PDOException $e) {
            throw new PDOException("Erreur SQL (getById) : " . $e->getMessage());
        }
    }

    /**
     * Mettre à jour un fournisseur
     */
    public function update(int $id, array $data): void
    {
        try {
            $stmt = $this->pdo->prepare("
                UPDATE suppliers
                SET name = :name,
                    phone = :phone,
                    email = :email
                WHERE id = :id
            ");

            $stmt->execute([
                ':name' => $data['name'],
                ':phone' => $data['phone'],
                ':email' => $data['email'],
                ':id' => $id
            ]);

        } catch (PDOException $e) {
            throw new PDOException("Erreur SQL (update) : " . $e->getMessage());
        }
    }
}
