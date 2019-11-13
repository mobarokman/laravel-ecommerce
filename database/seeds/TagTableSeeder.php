<?php

use Illuminate\Database\Seeder;
use App\Model\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::insert([
            [
                'tag_id' => '1',
                'tag_name' => 'mobile',
                'slug' => 'mobile',
            ],
            [
                'tag_id' => '2',
                'tag_name' => 'camera',
                'slug' => 'camera',
            ],
            [
                'tag_id' => '3',
                'tag_name' => 'computer',
                'slug' => 'computer',
            ],
        ]);
    }
}
