<?php

use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'confirmed' => 1,
            'api_token' => str_random(60),
            'confirmation_code' => md5(microtime() . env('APP_KEY')),
        ]);
    }
}
