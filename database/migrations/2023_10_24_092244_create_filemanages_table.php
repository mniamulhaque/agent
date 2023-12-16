<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilemanagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filemanages', function (Blueprint $table) {
            $table->id();
            $table->integer('apid');
            $table->string('fileType');
            $table->string('name');
            $table->string('fname');
            $table->string('dob');
            $table->string('vill');
            $table->string('area_name');
            $table->string('ptype');
            $table->integer('pyear');
            $table->integer('mobile');
            $table->integer('alterNative');
            $table->string('agreementType');
            $table->string('agentBy');
            $table->integer('total_price');
            $table->integer('pay_1st');
            $table->integer('pay_2nd');
            $table->integer('pay_3rd');
            $table->string('file_documet');
            $table->string('file_recipt');
            $table->integer('suspend_aproved');
            $table->string('file_status');
            $table->integer('done_aproved');
            $table->integer('user_id');
            $table->integer('user_mobile');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filemanages');
    }
}
