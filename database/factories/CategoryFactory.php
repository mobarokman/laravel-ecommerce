<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'category_name'          =>  $faker->name,
        'description'   =>  $faker->realText(100),
        'parent_id'     =>  1,
        'menu'          =>  1,
    ];
});
