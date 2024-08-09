<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Book</title>
    <?php include __DIR__ . '/../partials/head.php'; ?>
</head>
<body>

<!-- Include the Navigation Bar -->
<?php include __DIR__ . '/../partials/navbar.php'; ?>

<!-- Main Content -->
<div class="container mt-5 mb-5 main-content">
    <div class="main-content">
        <h1 class="mb-4">Create Book</h1>
        <form action="?action=create" method="POST">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" id="author" name="author" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <input type="text" id="category" name="category" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="?action=list" class="btn btn-secondary">Back to List</a>
        </form>
    </div>
</div>

<!-- Include the Footer -->
<?php include __DIR__ . '/../partials/footer.php'; ?>

</body>
</html>

