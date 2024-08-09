<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    private $categoryModel;

    public function __construct(Category $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    public function getAllCategories()
    {
        return $this->categoryModel->fetchAll();
    }

    public function getCategoryById($id)
    {
        return $this->categoryModel->fetchById($id);
    }

    public function searchCategories($query)
    {
        return $this->categoryModel->search($query);
    }
}