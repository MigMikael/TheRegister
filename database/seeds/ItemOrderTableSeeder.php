<?php

use Illuminate\Database\Seeder;

class ItemOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item_order')->insert([
            'order_id' => 1,
            'item_id' => 1,
            'amount' => 1
        ]);

        DB::table('item_order')->insert([
            'order_id' => 1,
            'item_id' => 2,
            'amount' => 1
        ]);

        DB::table('item_order')->insert([
            'order_id' => 1,
            'item_id' => 3,
            'amount' => 1
        ]);

        DB::table('item_order')->insert([
            'order_id' => 1,
            'item_id' => 4,
            'amount' => 1
        ]);

        DB::table('item_order')->insert([
            'order_id' => 1,
            'item_id' => 5,
            'amount' => 1
        ]);

        DB::table('item_order')->insert([
            'order_id' => 1,
            'item_id' => 6,
            'amount' => 1
        ]);

        DB::table('item_order')->insert([
            'order_id' => 1,
            'item_id' => 7,
            'amount' => 1
        ]);

        //---------------------------------------------------

        DB::table('item_order')->insert([
            'order_id' => 2,
            'item_id' => 1,
            'amount' => 4
        ]);

        DB::table('item_order')->insert([
            'order_id' => 2,
            'item_id' => 2,
            'amount' => 5
        ]);

        //---------------------------------------------------

        DB::table('item_order')->insert([
            'order_id' => 3,
            'item_id' => 7,
            'amount' => 10
        ]);
    }
}
