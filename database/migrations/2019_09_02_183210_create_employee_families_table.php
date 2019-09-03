<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_families', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("employee_id");
            $table->string("name");
            $table->string("relationship");
            $table->string("position");
            $table->string("phone");
            $table->date("birthday");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_families');
    }
}
