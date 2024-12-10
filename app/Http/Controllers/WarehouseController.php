<?php

namespace App\Http\Controllers;

use App\Http\Requests\WarehouseRequest;
use App\Models\Warehouse;

class WarehouseController extends Controller
{
    public function index()
    {
        return response()->json(Warehouse::all());
    }

    public function show(Warehouse $warehouse)
    {
        return response()->json($warehouse);
    }
    public function store(WarehouseRequest $request)
    {
        $warehouse = Warehouse::create($request->all());
        return response()->json($warehouse, 201);
    }

    public function update(WarehouseRequest $request, Warehouse $warehouse)
    {
        $warehouse->update($request->all());
        return response()->json($warehouse);
    }

    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();
        return response()->json()->noContent();
    }
}
