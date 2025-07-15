<?php

namespace App\Http\Controllers\Client\Product;

use App\Http\Controllers\Controller;
use App\Service\Client\Product\FamilyService;
use Illuminate\Http\Request;

class FamilyController extends Controller
{


    private $familyService;

    public function __construct()
    {
        $this->familyService = app(FamilyService::class);
    }

    public function index()
    {
        return $this->familyService->getFamily();
    }
}
