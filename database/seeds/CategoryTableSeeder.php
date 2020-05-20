<?php

use Illuminate\Database\Seeder;
use App\Model\Category;
use Illuminate\Support\Str;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */ 
    
     
    public function run()
    {
        Category::create([
            'category_name'          =>  'Root',
            'description'   =>  'This is the root category, don\'t delete this one',
            'parent_id'     =>  null,
            'menu'          =>  0,
        ]);
 
        factory('App\Model\Category', 10)->create();
    }
}
