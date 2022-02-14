<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        [
            'name' => 'admin',
            'email' => 'admin@fishandchips.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'role' => 1,
            'remember_token' => Str::random(10),
        ],
        [
            'name' => 'customer',
            'email' => 'customer@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 2,
            'remember_token' => Str::random(10),
        ],
        [
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 2,
            'remember_token' => Str::random(10),
        ],
        [
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 2,
            'remember_token' => Str::random(10),
        ],
        [
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 2,
            'remember_token' => Str::random(10),
        ]
        ]);
    }
}
