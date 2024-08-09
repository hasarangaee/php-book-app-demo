<?php
require_once __DIR__ . '/../app/Config/DatabaseConfig.php';
require_once __DIR__ . '/../app/Services/DatabaseConnection.php';
require_once __DIR__ . '/../app/Models/Book.php';
require_once __DIR__ . '/../app/Services/BookService.php';
require_once __DIR__ . '/../app/Controllers/BookController.php';
require_once __DIR__ . '/../app/DTO/BookDTO.php';

require_once __DIR__ . '/../app/Models/Category.php';
require_once __DIR__ . '/../app/Services/CategoryService.php';
require_once __DIR__ . '/../app/Controllers/CategoryController.php';

require_once __DIR__ . '/../app/Models/Author.php';
require_once __DIR__ . '/../app/Services/AuthorService.php';
require_once __DIR__ . '/../app/Controllers/AuthorController.php';

require_once __DIR__ . '/../app/Controllers/SearchController.php';


// Autoload classes
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/../app/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

$config = new \App\Config\DatabaseConfig();
$dbConnection = new \App\Services\DatabaseConnection($config);
$bookModel = new \App\Models\Book($dbConnection->getPdo());
$bookService = new \App\Services\BookService($bookModel);
$bookController = new \App\Controllers\BookController($bookService);

$categoryModel = new \App\Models\Category($dbConnection->getPdo());
$categoryService = new \App\Services\CategoryService($categoryModel);
$categoryController = new \App\Controllers\CategoryController($categoryService, $bookService);

$authorModel = new \App\Models\Author($dbConnection->getPdo());
$authorService = new \App\Services\AuthorService($authorModel);
$authorController = new \App\Controllers\AuthorController($authorService, $bookService);

$searchController = new \App\Controllers\SearchController($bookService, $authorService, $categoryService);

// Routing
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'list':
            $bookController->listBooks();
            break;
        case 'show':
            $bookController->showBook($_GET['id']);
            break;
        case 'create':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $bookController->createBook($_POST['title'], $_POST['author'], $_POST['category']);
            } else {
                include __DIR__ . '/../app/Views/book/create.php';
            }
            break;
        case 'edit':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $bookController->updateBook($_POST['id'], $_POST['title'], $_POST['author'], $_POST['category']);
            } else {
                $bookController->editBook($_GET['id']);
            }
            break;
        case 'delete':
            $bookController->deleteBook($_GET['id']);
            break;
        case 'about':
            include __DIR__ . '/../app/Views/book/about.php';
            break;
        case 'category':
            $categoryController->listCategories();
            break;
        case 'author':
            $authorController->listAuthors();
            break;
        case 'book-author':
            $authorController->showAuthorBooks($_GET['id']);
            break;
        case 'book-category':
            $categoryController->showCategoryBooks($_GET['id']);
            break;
        case 'search':
            $searchController->search($_GET['query']);
            break;
        default:
            $bookController->listBooks();
            break;
    }
} else {
    $bookController->listBooks();
}