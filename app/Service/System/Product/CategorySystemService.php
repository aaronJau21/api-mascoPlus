<?php

namespace App\Service\System\Product;

use App\Exceptions\ConfictException;
use App\Exceptions\NotFoundException;
use App\Http\Requests\System\Product\Category\CreateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class CategorySystemService
{


    public function getAll(): JsonResponse
    {
        $categories = Category::orderBy('id', 'desc')->select(['id', 'name', 'slug', 'active'])->get();
        return response()->json([
            'categories' => $categories
        ]);
    }

    public function createCategory(CreateCategoryRequest $request): JsonResponse
    {
        $data = $request->toDTO();

        if ($this->existsCategory($data->name)) {
            throw new ConfictException("Categoria con el nombre: '{$data->name}' ya existe.");
        }

        $category = Category::create([
            'name' => $data->name,
            'slug' => str_slug($data->name),
            'active' => true,
        ]);

        return response()->json([
            'categoria' => $category,
        ]);
    }

    public function getCategoryById(int $id)
    {
        $category = Category::find($id);

        if (!$category) {
            throw new NotFoundException('Categoria no encontrada.');
        }

        return response()->json([
            'categoria' => $category,
        ]);
    }


    public function updateCategory(int $id, CreateCategoryRequest $request): JsonResponse
    {
        $data = $request->toDTO();

        $category = Category::find($id);

        if (!$category) {
            throw new NotFoundException('Categoria no encontrada.');
        }

        if ($this->existsCategory($data->name) && $category->name !== $data->name) {
            throw new ConfictException("Categoria con el nombre: '{$data->name}' ya existe.");
        }

        $category->update([
            'name' => $data->name,
            'slug' => str_slug($data->name),
            'active' => true,
        ]);

        return response()->json([
            'categoria' => $category,
        ]);
    }


    private function existsCategory(string $name): bool
    {
        return Category::where('name', $name)->exists();
    }


}
