<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = "sub_categories";
    protected $primaryKey = "sub_category_id";
    protected $guarded = [''];
}
