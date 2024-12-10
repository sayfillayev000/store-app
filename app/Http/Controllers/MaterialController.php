<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaterialRequest;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        return response()->json(Material::all());
    }

    public function show(Material $material)
    {
        return response()->json($material);
    }
    public function store(MaterialRequest $request)
    {
        $material = Material::create($request->all());
        return response()->json($material, 201);
    }

    public function update(MaterialRequest $request, Material $material)
    {
        $material->update($request->all());
        return response()->json($material);
    }

    public function destroy(Material $material)
    {
        $material->delete();
        return response()->json()->noContent();
    }
}
