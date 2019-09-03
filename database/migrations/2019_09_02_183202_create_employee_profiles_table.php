<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string("middle_name");
            $table->string('last_name');
            $table->string("suffix");
            $table->date('birthday');
            $table->string('address');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('reports_to');
            $table->string("schedule");
            $table->string("department");
            $table->string("position");
            $table->date("date_hired");
            $table->date("date_end_contract");
            $table->date("date_separated");

            #personal information
            $table->string("passport_no");
            $table->date("passport_expiration");
            $table->string("phone");
            $table->string("nationality");
            $table->string("religion");
            $table->string("marital_status");
            $table->enum('have_spouse',['Yes','No']);
            $table->integer('number_of_child');

            #banking information
            $table->string("bank_name");
            $table->string("bank_accout_no");
            $table->enum("bank_status",["Active","Inactive"]);

            #bank and statutory
            $table->string("salary_bir_status");
            $table->string("salary_basis");
            $table->double("salary_basic");
            $table->double("salary_allowance");
            $table->double("salary_cola");

            #emergency contact
            $table->string("primary_contact_name");
            $table->string("primary_contact_relationship");
            $table->string("primary_contact_phone");

            $table->string("secondary_contact_name");
            $table->string("secondary_contact_relationship");
            $table->string("secondary_contact_phone");

            #stamps and others
            $table->enum("employee_status",["Active","Inactive"]);
            $table->string("employee_type");
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
        Schema::dropIfExists('employee_profiles');
    }
}
