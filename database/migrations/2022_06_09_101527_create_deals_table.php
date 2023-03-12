<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id');
            $table->bigInteger('service_id');
            $table->string('service_year')->nullable();
            $table->text('service_description')->nullable();
            $table->tinyInteger('status')->default('1')->comment('1 = initial, 0 = failed, 2 = On Proceed, 3 = Completed');
            $table->date('flight_date')->nullable();
            $table->string('flight_time')->nullable();
            $table->integer('depature_airport_id')->nullable();
            $table->integer('arrival_airport_id')->nullable();
            $table->integer('airline_id')->nullable();
            $table->string('class')->nullable();
            $table->string('price')->nullable();
            $table->string('hotel_name')->nullable();
            $table->string('hotel_price')->nullable();
            $table->date('check_in_date')->nullable();
            $table->date('check_out_date')->nullable();
            $table->date('makkah_tour_date')->nullable();
            $table->float('makkah_tour_price')->nullable();
            $table->date('madina_tour_date')->nullable();
            $table->float('madina_tour_price')->nullable();
            $table->string('responsible_person')->nullable();
            $table->string('responsible_person_mobile')->nullable();
            $table->string('source_of_media')->nullable();
            $table->date('next_schedule_date')->nullable();
            $table->time('next_schedule_time')->nullable();
            $table->string('promotional_offer')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('deals');
    }
}
