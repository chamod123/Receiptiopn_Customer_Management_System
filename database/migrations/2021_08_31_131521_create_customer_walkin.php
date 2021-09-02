<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerWalkin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_walking', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nic');
            $table->string('mobile');
            $table->string('no_of_walking');
            $table->string('floor_id');
            $table->string('floor_units_id');
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
        Schema::dropIfExists('customer_walkin');
    }
}
