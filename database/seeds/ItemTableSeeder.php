<?php

use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'name' => 'องค์พระพิฆเนศวร เนื้อบรอนซ์ หน้าตัก 9 นิ้ว',
            'price' => 19945,
        ]);

        DB::table('items')->insert([
            'name' => 'องค์พระพิฆเนศวร เนื้อบรอนซ์ หน้าตัก 5 นิ้ว',
            'price' => 9945,
        ]);

        DB::table('items')->insert([
            'name' => 'องค์พระพิฆเนศวร เนื้อบรอนซ์ หน้าตัก 3 นิ้ว',
            'price' => 4545,
        ]);

        DB::table('items')->insert([
            'name' => 'องค์พระพิฆเนศวร เนื้อทองคำ ขนาด 1 เซนติเมตร',
            'price' => 4545,
        ]);

        DB::table('items')->insert([
            'name' => 'องค์พระพิฆเนศวร เนื้อเงิน ขนาด 1 เซนติเมตร',
            'price' => 1445,
        ]);

        DB::table('items')->insert([
            'name' => 'องค์พระพิฆเนศวร เนื้อนวโลหะ ขนาด 1 เซนติเมตร',
            'price' => 545,
        ]);

        DB::table('items')->insert([
            'name' => 'องค์พระพิฆเนศวร เนื้อทองแดง ขนาด 1 เซนติเมตร',
            'price' => 145,
        ]);
    }
}
