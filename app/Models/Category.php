<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //use SoftDeletes;
    protected $guarded = [];

    public function get_subcategory(){
        return $this->hasMany(Category::class, 'parent_id')->where('status', 1);
    }

    public function get_subchild_category(){
        return $this->hasMany(Category::class, 'subcategory_id')->where('status', 1);
    }
}
