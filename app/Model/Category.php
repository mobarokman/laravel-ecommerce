<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $primaryKey = "category_id";
    protected $guarded = [];
    // protected $casts = [
    //     'parent_id' => 'integer',
    //     'featured' => 'boolean',
    //     'menu' => 'boolean',
    // ];


    // public function parent()
    // {
    //     return $this->belongsTo(Category::class, 'parent_id');
    // }

    // public function children()
    // {
    //     return $this->hasMany(Category::class, 'parent_id');
    // }
}
