<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Subcategory;

class Category extends Model
{
    protected $table = "categories";
    protected $primaryKey = "category_id";
    protected $guarded = [];

    public function subcategories() {
        return $this->hasMany('App\Model\Subcategory', 'category_id');
    }
}
