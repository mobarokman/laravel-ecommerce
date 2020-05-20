<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = "shipping_address";
    protected $primaryKey = "shipping_id";
    protected $guarded = [];

}
