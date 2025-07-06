<?php

namespace App\Http\Controllers\System\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Product\Family\CreateFamilyRequest;
use App\Service\System\Product\FamilySystemService;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    protected $familySystemService;
    public function __construct(FamilySystemService $familySystemService)
    {
        $this->familySystemService = $familySystemService;
    }

    public function getAll()
    {
        return $this->familySystemService->getAll();
    }

    public function create(CreateFamilyRequest $request)
    {
        return $this->familySystemService->create($request);
    }

    public function getFamilyById(int $id)
    {
        return $this->familySystemService->getFamilyById($id);
    }

    public function updateFamily(int $id, CreateFamilyRequest $request)
    {
        return $this->familySystemService->updateFamily($id, $request);
    }

    public function statusFamily(int $id)
    {
        return $this->familySystemService->statusFamily($id);
    }
}
