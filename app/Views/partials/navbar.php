<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand mx-auto" href="/">BOOK STORE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="?action=list">All Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?action=category">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?action=author">Author</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?action=about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary text-white add-book-btn" href="?action=create">Add New Book</a>
                </li>
            </ul>
            <form class="form-inline ml-auto" action="/" method="GET">
                <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search" aria-label="Search">
                <label> <input style="display: none" name="action" value="search"> </label>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

