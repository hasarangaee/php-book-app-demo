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
    <h1 class="mb-4">Books by <?= htmlspecialchars($category['name']); ?></h1>
    <ul class="list-group">
        <?php foreach ($books as $book): ?>
        <a href="?action=show&id=<?= htmlspecialchars($book['id']); ?>" class="text-decoration-none">
            <li class="list-group-item">
                <strong><?= htmlspecialchars($book['title']); ?></strong>
            </li>
        </a>
        <?php endforeach; ?>
    </ul>
</div>

<!-- Footer -->
<?php include __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>
