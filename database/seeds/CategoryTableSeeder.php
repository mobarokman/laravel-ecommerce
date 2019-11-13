<?php

use Illuminate\Database\Seeder;
use App\Model\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            [
                'category_id' => '1',
                'category_name' => 'Computer',
                'description' => 'this a simple category',
                'slug' => 'computer',
                'photo' => 'default.png',
                'status' => '1',
            ],
            [
                'category_id' => '2',
                'category_name' => 'Kitchen Ware',
                'description' => 'this a simple category',
                'slug' => 'kitchen-ware',
                'photo' => 'default.png',
                'status' => '1',
            ],
            [
                'category_id' => '3',
                'category_name' => 'Mobile',
                'description' => 'this a simple category',
                'slug' => 'mobile',
                'photo' => 'default.png',
                'status' => '1',
            ],
        ]);
    }
}
