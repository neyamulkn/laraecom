<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFeature extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    public function get_attribute(){
        return $this->hasMany(ProductAttribute::class, 'id', 'attribute_id');
    }
}
