<?php

namespace App\Models;

use PDO;

class Book
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllBooks()
    {
        $sql = "
        SELECT 
            books.id, 
            books.title, 
            authors.name AS author_name, 
            categories.name AS category_name
        FROM 
            books
        JOIN 
            authors ON books.author_id = authors.id
        JOIN 
            categories ON books.category_id = categories.id";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBookById($id)
    {
        $sql = "
    SELECT 
        books.id, 
        books.title, 
        authors.name AS author_name, 
        categories.name AS category_name
    FROM 
        books
    JOIN 
        authors ON books.author_id = authors.id
    JOIN 
        categories ON books.category_id = categories.id
    WHERE 
        books.id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findOrCreateAuthor($authorName)
    {
        // Check if the author exists
        $stmt = $this->pdo->prepare("SELECT id FROM authors WHERE name = :name");
        $stmt->execute(['name' => $authorName]);
        $author = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($author) {
            return $author['id']; // Return the existing author ID
        } else {
            // Author doesn't exist, create a new one
            $stmt = $this->pdo->prepare("INSERT INTO authors (name) VALUES (:name)");
            $stmt->execute(['name' => $authorName]);
            return $this->pdo->lastInsertId(); // Return the new author ID
        }
    }

    public function findOrCreateCategory($categoryName)
    {
        // Check if the category exists
        $stmt = $this->pdo->prepare("SELECT id FROM categories WHERE name = :name");
        $stmt->execute(['name' => $categoryName]);
        $category = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($category) {
            return $category['id']; // Return the existing category ID
        } else {
            // Category doesn't exist, create a new one
            $stmt = $this->pdo->prepare("INSERT INTO categories (name) VALUES (:name)");
            $stmt->execute(['name' => $categoryName]);
            return $this->pdo->lastInsertId(); // Return the new category ID
        }
    }

    public function createBook($title, $authorId, $categoryId)
    {
        $stmt = $this->pdo->prepare("INSERT INTO books (title, author_id, category_id) VALUES (:title, :author_id, :category_id)");
        return $stmt->execute(['title' => $title, 'author_id' => $authorId, 'category_id' => $categoryId]);
    }

    public function updateBook($bookId, $title, $authorId, $categoryId)
    {
        $stmt = $this->pdo->prepare("
        UPDATE books 
        SET title = :title, author_id = :author_id, category_id = :category_id 
        WHERE id = :id");

        return $stmt->execute([
            'title' => $title,
            'author_id' => $authorId,
            'category_id' => $categoryId,
            'id' => $bookId
        ]);
    }

    public function deleteBook($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM books WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function fetchByAuthor($authorId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM books WHERE author_id = :authorId");
        $stmt->execute(['authorId' => $authorId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchByCategory($categoryId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM books WHERE category_id = :categoryId");
        $stmt->execute(['categoryId' => $categoryId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchBooks($query)
    {
        $stmt = $this->pdo->prepare("
            SELECT * FROM books
            WHERE title LIKE :query
        ");
        $stmt->execute(['query' => '%' . $query . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function search($query)
    {
        $stmt = $this->pdo->prepare("
        SELECT b.*, a.name as author, c.name as category
        FROM books b
        LEFT JOIN authors a ON b.author_id = a.id
        LEFT JOIN categories c ON b.category_id = c.id
        WHERE b.title LIKE :query
        OR a.name LIKE :query
        OR c.name LIKE :query
    ");
        $stmt->execute(['query' => '%' . $query . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}