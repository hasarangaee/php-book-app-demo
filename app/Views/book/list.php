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
    <h1 class="mb-4">Books List</h1>
    <div class="list-group">
        <?php foreach ($books as $book): ?>
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-1"><span class="font-weight-bold"><?= htmlspecialchars($book->getTitle()); ?></span></p>
                    <p class="mb-0"><span class="text-muted">by <?= htmlspecialchars($book->getAuthor()); ?></span></p>
                </div>
                <span>
                    <a href="?action=show&id=<?= htmlspecialchars($book->getId()); ?>" class="btn btn-info btn-sm mr-2">View</a>
                    <a href="?action=edit&id=<?= htmlspecialchars($book->getId()); ?>" class="btn btn-warning btn-sm mr-2">Edit</a>
                    <a href="?action=delete&id=<?= htmlspecialchars($book->getId()); ?>" class="btn btn-danger btn-sm">Delete</a>
                </span>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Footer -->
<?php include __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>
