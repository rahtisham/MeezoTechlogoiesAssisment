<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Muhammad Ahtisham',
            'email' => 'admin@gmail.com',
            'role_id' => '1',
            'password' => Hash::make('12345678')
        ]);

        User::create([
            'name' => 'Muhammad Omais',
            'email' => 'teacher@gmail.com',
            'role_id' => '2',
            'password' => Hash::make('12345678')
        ]);

        User::create([
            'name' => 'Muhammad Sami',
            'email' => 'student@gmail.com',
            'role_id' => '3',
            'password' => Hash::make('12345678')
        ]);
    }
}
