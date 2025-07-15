<?php

namespace App\Service\Client\Product;

use App\Http\Resources\Client\Product\FamilyResource;
use App\Models\Family;
use Illuminate\Http\JsonResponse;

class FamilyService
{
    public function getFamily(): JsonResponse
    {
        $data = Family::where('active', true)->get();
        return response()->json([
            'data' => FamilyResource::collection($data),
        ]);
    }
}
