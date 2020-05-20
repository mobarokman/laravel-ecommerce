<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $primaryKey = "product_id";
    protected $guarded = ['photo',];

    public function subcategory()
    {
        return $this->hasOne('App\Model\Subcategory', 'sub_category_id');
    }
}
