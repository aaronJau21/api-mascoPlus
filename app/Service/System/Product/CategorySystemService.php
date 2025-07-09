<?php

namespace App\Service\System\Product;

use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategorySystemService
{


    public function getAll(): JsonResponse
    {
        $categories = Category::orderBy('id', 'desc')->select(['id', 'name', 'slug', 'active'])->get();
        return response()->json([
            'categories' => $categories
        ]);
    }
}
