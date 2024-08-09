<?php

namespace App\Controllers;

use App\Services\BookService;
use App\Services\AuthorService;
use App\Services\CategoryService;

class SearchController
{
    private $bookService;
    private $authorService;
    private $categoryService;

    public function __construct(BookService $bookService, AuthorService $authorService, CategoryService $categoryService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
        $this->categoryService = $categoryService;
    }

    public function search($query)
    {
        $books = $this->bookService->search($query);

        include __DIR__ . '/../Views/search/results.php';
    }
}
