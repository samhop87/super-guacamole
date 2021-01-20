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
            'name' => "Sam",
            'email' => "s.hopkinson87@gmail.com",
            'password' => '$2y$10$cxepwgn5KppDvhov10u1/eFdNTzq1sO9.nmgO3HRnf.yitytIqeRm'
        ]);
    }
}
