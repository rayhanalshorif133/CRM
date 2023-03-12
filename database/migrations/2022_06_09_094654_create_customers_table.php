<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('nid')->nullable();
            $table->string('birth_id')->nullable();
            $table->string('mobile1');
            $table->string('mobile2')->nullable();
            $table->string('title')->nullable();
            $table->string('sur_name')->nullable();
            $table->string('given_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('passport_no')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->date('date_of_issue')->nullable();
            $table->date('date_of_expire')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('organization')->nullable();
            $table->string('designation')->nullable();
            $table->string('email')->nullable();
            $table->tinyInteger('status')->default('1');
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
