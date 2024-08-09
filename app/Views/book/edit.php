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
    <div class="row">
        <!-- Edit Book Column -->
        <div class="col-md-6">
            <h1 class="mb-4">Edit Book</h1>
            <form action="?action=edit" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars($book->getId()); ?>">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" class="form-control" value="<?= htmlspecialchars($book->getTitle()); ?>" required>
                </div>
                <div class="form-group">
                    <label for="author">Author:</label>
                    <input type="text" id="author" name="author" class="form-control" value="<?= htmlspecialchars($book->getAuthor()); ?>" required>
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <input type="text" id="category" name="category" class="form-control" value="<?= htmlspecialchars($book->getCategory()); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="?action=list" class="btn btn-secondary">Back to List</a>
            </form>
        </div>

        <!-- Book Details Column -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($book->getTitle()); ?></h5>
                    <p class="card-text"><strong>Author:</strong> <?= htmlspecialchars($book->getAuthor()); ?></p>
                    <p class="card-text"><strong>Category:</strong> <?= htmlspecialchars($book->getCategory()); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>

