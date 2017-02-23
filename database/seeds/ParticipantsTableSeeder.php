<?php

use Illuminate\Database\Seeder;
use App\Helper\TokenGenerator;

class ParticipantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generator = new TokenGenerator();

        DB::table('participants')->insert([
            'order_id' => 0001,
            'firstName' => 'สาริน',
            'lastName' => 'รณเกียรติ',
            'address' => 'แถวแถวลาดพร้าว',
            'phoneNumber' => '0877777788',
            'email' => 'sarin@example.com',
            'token' => $generator->generate(10),
            'category' => 'student',
        ]);

        DB::table('participants')->insert([
            'order_id' => 0001,
            'firstName' => 'ภากร',
            'lastName' => 'ธนศรีวนิชชัย',
            'address' => 'แถวแถวลาดพร้าว',
            'phoneNumber' => '0888888877',
            'email' => 'pakorn@example.com',
            'token' => $generator->generate(10),
            'category' => 'student',
        ]);

        DB::table('participants')->insert([
            'order_id' => 0002,
            'firstName' => 'สพล',
            'lastName' => 'อัศวมั่นคง',
            'address' => 'กะพอร์ช',
            'phoneNumber' => '0070007777',
            'email' => 'grsp@example.com',
            'token' => $generator->generate(10),
            'category' => 'student',
        ]);

        DB::table('participants')->insert([
            'order_id' => 0002,
            'firstName' => 'ศิฑา',
            'lastName' => 'กาญจนอลงกรณ์',
            'address' => 'กะพี่เกรทฮะ',
            'phoneNumber' => '0070007777',
            'email' => 'pporsche@example.com',
            'token' => $generator->generate(10),
            'category' => 'student',
        ]);

        DB::table('participants')->insert([
            'order_id' => 0003,
            'firstName' => 'ภาคภูมิ',
            'lastName' => 'ตีไชย์รัม',
            'address' => 'บนโลกฮะ',
            'phoneNumber' => '0070007777',
            'email' => 'pakphoom@example.com',
            'token' => $generator->generate(10),
            'category' => 'student',
        ]);
    }
}
