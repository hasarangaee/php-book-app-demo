<?php

namespace App\Controllers;

use App\Services\BookService;

class BookController
{
    private $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function listBooks()
    {
        $books = $this->bookService->getAllBooks();
        include __DIR__ . '/../Views/book/list.php';
    }

    public function showBook($id)
    {
        $book = $this->bookService->getBookById($id);
        include __DIR__ . '/../Views/book/show.php';
    }

    public function createBook($title, $author, $category)
    {
        $this->bookService->createBook($title, $author, $category);
        header('Location: /?action=list');
    }

    public function editBook($id)
    {
        $book = $this->bookService->getBookById($id);
        include __DIR__ . '/../Views/book/edit.php';
    }

    public function updateBook($id, $title, $author, $category)
    {
        $this->bookService->updateBook($id, $title, $author, $category);
        header('Location: /?action=edit&id=' . $id);
    }

    public function deleteBook($id)
    {
        $this->bookService->deleteBook($id);
        header('Location: /?action=list');
    }
}
