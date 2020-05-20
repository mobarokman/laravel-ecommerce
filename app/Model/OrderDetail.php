<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = "order_details";
    protected $primaryKey = "order_detail_id";
    protected $guarded = [];
}
