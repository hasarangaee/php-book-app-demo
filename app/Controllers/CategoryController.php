<?php

namespace App\Controllers;

use App\Services\CategoryService;
use App\Services\BookService;

class CategoryController
{
    private $categoryService;
    private $bookService;

    public function __construct(CategoryService $categoryService, BookService $bookService)
    {
        $this->categoryService = $categoryService;
        $this->bookService = $bookService;
    }

    public function listCategories()
    {
        $categories = $this->categoryService->getAllCategories();
        include __DIR__ . '/../Views/category/list.php';
    }

    public function showCategoryBooks($categoryId)
    {
        $category = $this->categoryService->getCategoryById($categoryId);
        $books = $this->bookService->getBooksByCategory($categoryId);
        include __DIR__ . '/../Views/category/book.php';
    }
}
