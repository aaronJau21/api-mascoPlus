<?php

namespace App\Http\Controllers\System\Product;

use App\Http\Controllers\Controller;
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
}
