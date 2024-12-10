<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = ['material_name'];

    public function productMaterials()
    {
        return $this->hasMany(ProductMaterial::class);
    }

    public function warehouses()
    {
        return $this->hasMany(Warehouse::class);
    }
}
