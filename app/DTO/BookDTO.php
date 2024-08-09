<?php

namespace App\DTO;

class BookDTO {
    private $id;
    private $title;
    private $author;
    private $category;

    public function __construct($id, $title, $author, $category) {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->category = $category;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getCategory() {
        return $this->category;
    }
}