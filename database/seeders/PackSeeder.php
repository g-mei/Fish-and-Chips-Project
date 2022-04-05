<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packs')->insert([
            [
               'name' => 'Fish and Chips Pack',
               'description' => '1x flake and $3 chips',
               'image' => '',
               'cost' => 12,
               'category_id' => 1,
            ],
            [
                'name' => 'Souvlaki Pack',
                'description' => '1x souvlaki and $3 chips',
                'image' => '',
                'cost' => 15,
                'category_id' => 1,
            ]
        ]);
        
        DB::table('food_pack')->insert([
            [
                'food_id' => 2,
                'pack_id' => 1
            ],
            [
                'food_id' => 1,
                'pack_id' => 1
            ],
            [
                'food_id' => 5,
                'pack_id' => 2
            ],
            [
                'food_id' => 1,
                'pack_id' => 2
            ],
        ]);
    }
}
