<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('foods')->insert([
            [
               'name' => 'Chips',
               'cost' => 3,
               'image' => '',
               'category_id' => 5,
            ],
            [
                'name' => 'Flake',
                'cost' => 12,
                'image' => '',
                'category_id' => 2,
            ],
            [
                'name' => 'Barramundi',
                'cost' => 12.5,
                'image' => '',
                'category_id' => 2,
            ],
            [
                'name' => 'Flounder',
                'cost' => 10,
                'image' => '',
                'category_id' => 2,
            ],
            [
                'name' => 'Chicken Souvlaki',
                'cost' => 15,
                'image' => '',
                'category_id' => 4,
            ],
            [
                'name' => 'Tomato Sauce',
                'cost' => 500,
                'image' => '',
                'category_id' => 7,
            ],
        ]);
    }
}
