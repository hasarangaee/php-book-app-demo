<?php

namespace App\Controllers;

use App\Services\AuthorService;
use App\Services\BookService;

class AuthorController
{
    private $authorService;
    private $bookService;

    public function __construct(AuthorService $authorService, BookService $bookService)
    {
        $this->authorService = $authorService;
        $this->bookService = $bookService;
    }

    public function listAuthors()
    {
        $authors = $this->authorService->getAllAuthorsWithBookCount();
        include __DIR__ . '/../Views/author/list.php';
    }

    public function showAuthorBooks($authorId)
    {
        $author = $this->authorService->getAuthorById($authorId);
        $books = $this->bookService->getBooksByAuthor($authorId);
        include __DIR__ . '/../Views/author/book.php';
    }
}
