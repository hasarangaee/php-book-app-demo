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
    <h1 class="mb-4">Authors List</h1>
    <div class="card">
        <div class="card-body">
            <ul class="list-group">
                <?php foreach ($authors as $author): ?>
                    <a href="?action=book-author&id=<?= htmlspecialchars($author['id']); ?>" class="text-decoration-none">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?= htmlspecialchars($author['name']); ?>
                            <span class="book-count">(<?= htmlspecialchars($author['book_count']); ?> books)</span>
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
