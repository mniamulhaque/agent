<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUddoktasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uddoktas', function (Blueprint $table) {
            $table->id();
            $table->integer('uddotaId');
            $table->string('name');
            $table->string('fname');
            $table->string('area_name');
            $table->string('add');
            $table->integer('mobile');
            $table->integer('alterNative');
            $table->string('pass');
            $table->integer('active');
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
        Schema::dropIfExists('uddoktas');
    }
}
