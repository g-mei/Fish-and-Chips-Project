<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            [
                'instructions' => 'No salt',
                'status' => 'incart',
                'subtotal' => 39,
                'review_title' => 'review title',
                'review_desc' => 'review description',
                'review_rate' => 5,
                'user_id' => 2
            ]
        ]);
        
//         $order_id = DB::table('orders')->get()->first()->id;
//         $chips_id = DB::table('foods')->where('name', 'Chips')->first()->id;
//         $flake_id = DB::table('foods')->where('name', 'Flake')->first()->id;
        
        DB::table('order_food')->insert([
            [
                'qty' => 1,
                'instructions' => 'well cooked',
                'order_id' => 1,
                'food_id' => 2,
            ],
            [
                'qty' => 2,
                'instructions' => 'packed separate',
                'order_id' => 1,
                'food_id' => 2
            ],
            [
                'qty' => 1,
                'instructions' => null,
                'order_id' => 1,
                'food_id' => 1
            ],
        ]);
    }
}
