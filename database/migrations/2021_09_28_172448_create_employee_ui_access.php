<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeUiAccess extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_ui_access', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('employee_id');
            $table->boolean('is_customer_walking')->default(0);
            $table->boolean('is_employee_registration')->default(0);
            $table->boolean('is_view_customer_data')->default(0);
            $table->boolean('is_save_flow')->default(0);
            $table->boolean('is_save_unit')->default(0);
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
        Schema::dropIfExists('employee_ui_access');
    }
}
