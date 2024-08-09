<?php

namespace App\Models;

use PDO;

class Author
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchAllWithBookCount()
    {
        $stmt = $this->pdo->query("
            SELECT a.id, a.name, COUNT(b.id) AS book_count
            FROM authors a
            LEFT JOIN books b ON a.id = b.author_id
            GROUP BY a.id, a.name
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM authors WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function search($query)
    {
        $stmt = $this->pdo->prepare("
            SELECT * FROM authors
            WHERE name LIKE :query
        ");
        $stmt->execute(['query' => '%' . $query . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
