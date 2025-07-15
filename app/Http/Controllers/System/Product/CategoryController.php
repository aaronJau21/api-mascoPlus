<?php

namespace App\Http\Controllers\System\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Product\Category\CreateCategoryRequest;
use App\Service\System\Product\CategorySystemService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categorySystemService;
    public function __construct(CategorySystemService $categorySystemService)
    {
        $this->categorySystemService = $categorySystemService;
    }

    public function getAll()
    {
        return $this->categorySystemService->getAll();
    }

    public function createCategory(CreateCategoryRequest $request)
    {
        return $this->categorySystemService->createCategory($request);
    }

    public function getCategoryById(int $id)
    {
        return $this->categorySystemService->getCategoryById($id);
    }

    public function updateCategory(int $id, CreateCategoryRequest $request)
    {
        return $this->categorySystemService->updateCategory($id, $request);
    }

    public function updateStatus(int $id, Request $request)
    {
        return $this->categorySystemService->updateStatu($id, $request);
    }
}
