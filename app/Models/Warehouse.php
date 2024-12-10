<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = [
        'material_id',
        'remainder',
        'price',
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
