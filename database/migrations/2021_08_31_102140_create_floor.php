<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFloor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('floor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('floor_name');
            $table->string('floor_des')->default(' ');
            $table->timestamps();
        });

        Schema::create('floor_units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('floor_id');
            $table->string('unit_name');
            $table->string('unit_des')->default(' ');
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
        Schema::dropIfExists('floor');
    }
}
