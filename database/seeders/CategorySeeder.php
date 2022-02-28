<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Packs'
            ],
            [
                'name' => 'Fish'
            ],
            [
                'name' => 'Snacks'
            ],
            [
                'name' => 'Burgers and Wraps'
            ],
            [
                'name' => 'Sides'
            ],
            [
                'name' => 'Beverages'
            ],
            [
                'name' => 'Sauce Tubs'
            ],
        ]);
    }
}
