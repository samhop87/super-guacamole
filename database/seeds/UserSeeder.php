<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name' => env('ADMIN_USER'),
            'email' => env('ADMIN_EMAIL'),
            'password' => Hash::make(env('ADMIN_PW'))
        ]);
    }
}
