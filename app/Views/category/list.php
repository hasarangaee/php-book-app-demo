<!DOCTYPE html>
<html lang="en">
<head>
    <title>Books List</title>
    <?php include __DIR__ . '/../partials/head.php'; ?>
</head>
<body>

<!-- Navigation Bar -->
<?php include __DIR__ . '/../partials/navbar.php'; ?>

<!-- Main Content -->
<div class="container mt-5">
    <h1 class="mb-4">Categories List</h1>
    <div class="card">
        <div class="card-body">
            <ul class="list-group">
                <?php foreach ($categories as $category): ?>
                <a href="?action=book-category&id=<?= htmlspecialchars($category['id']); ?>" class="text-decoration-none">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?= htmlspecialchars($category['name']); ?>
                        <span class="book-count">(<?= htmlspecialchars($category['book_count']); ?> books)</span>
                    </li>
                </a>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>
