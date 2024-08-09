<?php

namespace App\Services;

use App\Models\Book;
use App\DTO\BookDTO;

class BookService
{
    private $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function getAllBooks()
    {
        $books = $this->book->getAllBooks();
        $bookDTOs = [];
        foreach ($books as $book) {
            $bookDTOs[] = new BookDTO($book['id'], $book['title'], $book['author_name'], $book['category_name']);
        }

        return $bookDTOs;
    }

    public function getBookById($id)
    {
        $book = $this->book->getBookById($id);
        return new BookDTO($book['id'], $book['title'], $book['author_name'], $book['category_name']);
    }

    public function createBook($title, $authorName, $categoryName)
    {
        $authorId = $this->book->findOrCreateAuthor($authorName);
        $categoryId = $this->book->findOrCreateCategory($categoryName);
        return $this->book->createBook($title, $authorId, $categoryId);
    }

    public function updateBook($id, $title, $authorName, $categoryName)
    {
        $authorId = $this->book->findOrCreateAuthor($authorName);
        $categoryId = $this->book->findOrCreateCategory($categoryName);
        return $this->book->updateBook($id, $title, $authorId, $categoryId);
    }

    public function deleteBook($id)
    {
        return $this->book->deleteBook($id);
    }

    public function getBooksByAuthor($authorId)
    {
        return $this->book->fetchByAuthor($authorId);
    }

    public function getBooksByCategory($categoryId)
    {
        return $this->book->fetchByCategory($categoryId);
    }

    public function searchBooks($query)
    {
        return $this->book->searchBooks($query);
    }

    public function search($query)
    {
        return $this->book->search($query);
    }
}
