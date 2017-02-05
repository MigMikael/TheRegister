<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');

            $table->string('firstName');
            $table->string('lastName');
            $table->text('address');
            $table->string('phoneNumber');
            $table->string('email');
            $table->string('token')->unique();

            $table->enum('category', [
                'teacher',  //อาจารย์
                'staff',    //เจ้าหน้าที่
                'alumni',   //ศิษย์เก่า
                'student',  //นักศึกษา
                'person'    //บุคคลทั่วไป
            ]);

            $table->boolean('is_attend')->default(0);
            $table->dateTime('attend_time')->nullable();
            $table->boolean('is_gain')->default(0);
            $table->dateTime('gain_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
}
