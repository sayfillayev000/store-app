<?php

namespace Database\Seeders;

use App\Models\Material;
use App\Models\Product;
use App\Models\ProductMaterial;
use App\Models\Warehouse;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $product_kuylak = Product::create([
            'product_name' => "Ko'ylak",
            'product_code' => 472025655
        ]);

        $product_shim = Product::create([
            'product_name' => "Shim",
            'product_code' => 472025656
        ]);

        $material = Material::create([
            "material_name" => "Mato"
        ]);

        Warehouse::create([
            'material_id' => $material->id,
            'remainder' => 12,
            'price' => 1500
        ]);

        Warehouse::create([
            'material_id' => $material->id,
            'remainder' => 200,
            'price' => 1600
        ]);

        ProductMaterial::create([
            'product_id' => $product_kuylak->id,
            'material_id' => $material->id,
            'quantity' => 0.8,
        ]);

        ProductMaterial::create([
            'product_id' => $product_shim->id,
            'material_id' => $material->id,
            'quantity' => 1.4,
        ]);

        $material = Material::create([
            "material_name" => "Tugma"
        ]);

        Warehouse::create([
            'material_id' => $material->id,
            'remainder' => 500,
            'price' => 300
        ]);

        ProductMaterial::create([
            'product_id' => $product_kuylak->id,
            'material_id' => $material->id,
            'quantity' => 5,
        ]);

        $material =  Material::create([
            "material_name" => "Ip"
        ]);

        ProductMaterial::create([
            'product_id' => $product_kuylak->id,
            'material_id' => $material->id,
            'quantity' => 10,
        ]);

        ProductMaterial::create([
            'product_id' => $product_shim->id,
            'material_id' => $material->id,
            'quantity' => 15,
        ]);

        Warehouse::create([
            'material_id' => $material->id,
            'remainder' => 40,
            'price' => 500
        ]);

        Warehouse::create([
            'material_id' => $material->id,
            'remainder' => 300,
            'price' => 550
        ]);

        $material = Material::create([
            "material_name" => "Zamok"
        ]);

        ProductMaterial::create([
            'product_id' => $product_shim->id,
            'material_id' => $material->id,
            'quantity' => 1,
        ]);

        Warehouse::create([
            'material_id' => $material->id,
            'remainder' => 1000,
            'price' => 2000
        ]);
    }
}
