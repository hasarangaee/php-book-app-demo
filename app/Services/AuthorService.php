<?php

namespace App\Services;

use App\Models\Author;

class AuthorService
{
    private $authorModel;

    public function __construct(Author $authorModel)
    {
        $this->authorModel = $authorModel;
    }

    public function getAllAuthorsWithBookCount()
    {
        return $this->authorModel->fetchAllWithBookCount();
    }

    public function getAuthorById($id)
    {
        return $this->authorModel->fetchById($id);
    }

    public function searchAuthors($query)
    {
        return $this->authorModel->search($query);
    }
}
