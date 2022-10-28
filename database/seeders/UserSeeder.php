<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make("123"),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'supervisor',
            'email' => 'supervisor@gmail.com',
            'password' => Hash::make("123"),
            'role' => 'supervisor',
        ]);

        User::create([
            'name' => 'company',
            'email' => 'company@gmail.com',
            'password' => Hash::make("123"),
            'role' => 'company',
        ]);

        User::create([
            'name' => 'student',
            'email' => 'student@gmail.com',
            'password' => Hash::make("123"),
            'role' => 'student',
        ]);
    }
}
