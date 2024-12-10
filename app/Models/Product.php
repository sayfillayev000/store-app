<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'product_code',
    ];

    public function productMaterials()
    {
        return $this->hasMany(ProductMaterial::class);
    }
}
