<?php

use Illuminate\Database\Seeder;
use App\Model\Subcategory;

class SubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subcategory::insert([
            [
                'sub_category_id' => '1',
                'category_id' => '1',
                'sub_category_name' => 'HP',
                'description' => 'this a simple category',
                'slug' => 'hp',
                'photo' => 'default.png',
                'status' => '1',
            ],
            [
                'sub_category_id' => '2',
                'category_id' => '1',
                'sub_category_name' => 'Lenovo',
                'description' => 'this a simple category',
                'slug' => 'lenovo',
                'photo' => 'default.png',
                'status' => '1',
            ],
            [
                'sub_category_id' => '3',
                'category_id' => '2',
                'sub_category_name' => 'Hamko Kitchenware',
                'description' => 'this a simple category',
                'slug' => 'hamko-kw',
                'photo' => 'default.png',
                'status' => '1',
            ],
            [
                'sub_category_id' => '4',
                'category_id' => '2',
                'sub_category_name' => 'Ikaras Kitchenware',
                'description' => 'this a simple category',
                'slug' => 'ikaras-kw',
                'photo' => 'default.png',
                'status' => '1',
            ],
            [
                'sub_category_id' => '5',
                'category_id' => '3',
                'sub_category_name' => 'Sony Mobile',
                'description' => 'this a simple category',
                'slug' => 'sony',
                'photo' => 'default.png',
                'status' => '1',
            ],
            [
                'sub_category_id' => '6',
                'category_id' => '3',
                'sub_category_name' => 'Apple Mobile',
                'description' => 'this a simple category',
                'slug' => 'apple',
                'photo' => 'default.png',
                'status' => '1',
            ],
        ]);
    }
}
