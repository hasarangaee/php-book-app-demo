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
    <h1 class="mb-4">Search Results (<?= count($books) ?>)</h1>

    <?php if ($books): ?>
        <ul class="list-group mb-4">
            <?php foreach ($books as $book): ?>
            <a href="?action=show&id=<?= htmlspecialchars($book['id']); ?>" class="text-decoration-none">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <?= htmlspecialchars($book['title']); ?>
                    </div>
                    <div class="ml-auto text-right">
                        <span class="text-muted"><?= htmlspecialchars($book['author']); ?></span> /
                        <span class="text-muted"><?= htmlspecialchars($book['category']); ?></span>
                    </div>
                </li>
            </a>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No books found.</p>
    <?php endif; ?>
    <a href="/" class="btn btn-secondary mt-3" style="margin-bottom: 10px">Back to Home</a>
</div>

<!-- Footer -->
<?php include __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>
