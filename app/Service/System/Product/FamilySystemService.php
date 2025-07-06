<?php

namespace App\Service\System\Product;

use App\Models\Family;
use Illuminate\Http\JsonResponse;
use App\Dto\System\Product\FamilyDto;
use App\Exceptions\NotFoundException;
use App\Http\Requests\System\Product\Family\CreateFamilyRequest;

class FamilySystemService
{
    public function getAll(): JsonResponse
    {

        $families = Family::orderBy('id', 'desc')->get();
        return response()->json([
            'families' => $families
        ]);
    }

    public function create(CreateFamilyRequest $request)
    {
        $data = new FamilyDto(...$request->validated());

        $family = Family::create([
            'name' => $data->name,
            'slug' => str_slug($data->name),
            'active' => true,
        ]);


        return response()->json([
            'message' => 'Family created successfully',
            'family' => $family
        ], 201);
    }

    public function getFamilyById(int $id): JsonResponse
    {
        $family = Family::find($id);

        if (!isset($family)) {
            throw new NotFoundException('La Familia con el id:' . $id . 'no existe');
        }

        return response()->json([
            'family' => $family
        ]);
    }

    public function updateFamily(int $id, CreateFamilyRequest $request)
    {
        $family = Family::find($id);

        if (!isset($family)) {
            throw new NotFoundException('La Familia con el id:' . $id . 'no existe');
        }

        $data = new FamilyDto(...$request->validated());

        $family->update([
            'name' => $data->name,
            'slug' => str_slug($data->name),
            'active' => true,
        ]);

        return response()->json([
            'message' => 'Family updated successfully',
            'family' => $family
        ]);
    }

    public function statusFamily(int $id)
    {
        $family  = $this->findFamilyById($id);
        $family->active = !$family->active;
        $family->save();

        return response()->json([
            'message' => 'Family status updated successfully',
            'family' => $family
        ]);
    }

    private function findFamilyById(int $id): Family
    {
        $family = Family::find($id);

        if (!isset($family)) {
            throw new NotFoundException('La Familia con el id:' . $id . 'no existe');
        }

        return $family;
    }
}
