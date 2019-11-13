<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Category;

class Subcategory extends Model
{
    protected $table = "sub_categories";
    protected $primaryKey = "sub_category_id";
    protected $guarded = [];

    public function category() {
        return $this->belongsTo('App\Model\Category');
    }
}
