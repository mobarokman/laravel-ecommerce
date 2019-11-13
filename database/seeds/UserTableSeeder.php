<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'Develop Admin',
                'email' => 'admin@email.com',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'Develop Admin',
                'email' => 'user@email.com',
                'password' => bcrypt('admin'),
            ],
        ]);
    }
}
