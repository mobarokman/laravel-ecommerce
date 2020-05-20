<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "carts";
    protected $primaryKey = "cart_id";
    protected $guarded = [];

    public function products()
    {
        return $this->hasOne('App\Model\Product', 'product_id', 'product_id');
       //$this->hasOne('App\Phone', 'foreign_key', 'local_key');
    }

}
