<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductIsAvailableController extends Controller
{
    public function product_is_available(Request $request)
    {
        $option = [];
        $warehouses = [true, true, true, true, true, true];

        for ($i = 0; $i < count($request->all()); $i++) {

            $product = Product::where('product_name', $request[$i]['product_name'])->first();

            $result = [];

            foreach ($product->productMaterials as $productMaterial) {

                $material = $productMaterial->material;

                $remainder = $request[$i]['product_qty'] * $productMaterial->quantity;

                foreach ($material->warehouses as $value) {

                    if ($value->remainder <= $remainder) {

                        if ($warehouses[$value->id - 1] === true) {

                            $warehouses[$value->id - 1] = 0;

                            $remainder -= $value->remainder;

                            $result[] =  [
                                "warehouse_id" => $value->id,
                                "material_name" => $productMaterial->material->material_name,
                                "qty" => $value->remainder,
                                "price" => $value->price
                            ];
                        } elseif ($warehouses[$value->id - 1] === 0) {
                            continue;
                        } elseif ($value->remainder - $warehouses[$value->id - 1] < $remainder) {

                            $result[] =  [
                                "warehouse_id" => $value->id,
                                "material_name" => $productMaterial->material->material_name,
                                "qty" =>  $value->remainder - $warehouses[$value->id - 1],
                                "price" => $value->price
                            ];

                            $result[] =  [
                                "warehouse_id" => null,
                                "material_name" => $productMaterial->material->material_name,
                                "qty" => $remainder - $value->remainder - $warehouses[$value->id - 1],
                                "price" => null
                            ];
                        } else {
                            $result[] =  [
                                "warehouse_id" => $value->id,
                                "material_name" => $productMaterial->material->material_name,
                                "qty" => $value->remainder - $warehouses[$value->id - 1],
                                "price" => $value->price
                            ];
                        }
                    } else {
                        $warehouses[$value->id - 1] = $remainder;

                        $result[] =  [
                            "warehouse_id" => $value->id,
                            "material_name" => $productMaterial->material->material_name,
                            "quantity" => $remainder,
                            "price" => $value->price
                        ];
                    }
                }
            }
            $option[]  =  [
                "product_name" => $product->product_name,
                "product_qty" => $request[$i]['product_qty'],
                "product_materials" => $result,
            ];
        }

        return response()->json(['result' => $option]);
    }
}
