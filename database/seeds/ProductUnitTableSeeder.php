<?php

use App\Model\ProductUnit;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductUnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductUnit::insert([
            [
                'unit_id' => 1,
                'unit_name' => 'kg',
                'details' => 'this is about inche',
                'status' => 1,
                'created_at' => Carbon::now('GMT+6'),
            ],
            [
                'unit_id' => 2,
                'unit_name' => 'ltr',
                'details' => 'this is about inche',
                'status' => 1,
                'created_at' => Carbon::now('GMT+6'),
            ],
            [
                'unit_id' => 3,
                'unit_name' => 'pice',
                'details' => 'this is about inche',
                'status' => 1,
                'created_at' => Carbon::now('GMT+6'),
            ],
            [
                'unit_id' => 4,
                'unit_name' => 'packet',
                'details' => 'this is about inche',
                'status' => 1,
                'created_at' => Carbon::now('GMT+6'),
            ],
        ]);
    }
}
