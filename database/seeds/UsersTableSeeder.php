<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        App\User::truncate();
        factory('App\User', 3200)->create();
    }
}
