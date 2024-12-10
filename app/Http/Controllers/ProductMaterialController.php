<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductMaterialRequest;
use App\Models\ProductMaterial;

class ProductMaterialController extends Controller
{
    public function index()
    {
        return response()->json(ProductMaterial::all());
    }

    public function show(ProductMaterial $productMaterial)
    {
        return response()->json($productMaterial);
    }
    public function store(ProductMaterialRequest $request)
    {
        $productMaterial = ProductMaterial::create($request->all());
        return response()->json($productMaterial, 201);
    }

    public function update(ProductMaterialRequest $request, ProductMaterial $productMaterial)
    {
        $productMaterial->update($request->all());
        return response()->json($productMaterial);
    }

    public function destroy(ProductMaterial $productMaterial)
    {
        $productMaterial->delete();
        return response()->json()->noContent();
    }
}
