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
    <h1 class="mb-4">Book Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($book->getTitle()); ?></h5>
            <p class="card-text"><strong>Author:</strong> <?= htmlspecialchars($book->getAuthor()); ?></p>
            <p class="card-text"><strong>Category:</strong> <?= htmlspecialchars($book->getCategory()); ?></p>
            <a href="?action=edit&id=<?= htmlspecialchars($book->getId()); ?>" class="btn btn-warning">Edit</a>
            <a href="?action=delete&id=<?= htmlspecialchars($book->getId()); ?>" class="btn btn-danger">Delete</a>
            <a href="?action=list" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>
