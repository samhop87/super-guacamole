<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seeds a test user
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "",
            'email' => "",
            'password' => ''
        ]);
    }
}
