<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('booking_id');
            $table->tinyInteger('status_code')->default('0');
            $table->dateTime('request_datetime')->nullable();
            $table->integer('customer_id')->unsigned()->index()->default('1');
            $table->tinyInteger('number_of_guest')->default('1');
            $table->string('city')->nullable();
            $table->string('service_id')->nullable();
            $table->tinyInteger('arr_dep')->default('0');
            $table->tinyInteger('vehicle_code')->default('0');
            $table->text('content')->nullable();
            $table->integer('supplier_id')->unsigned()->index();
            $table->decimal('price_fm_supplier', 8, 2)->default('0');
            $table->decimal('hotel_bed_price', 8, 2)->default('0');
            $table->decimal('surcharge', 8, 2)->default('0');
            $table->tinyInteger('paid_to_supplier')->default('0');
            $table->tinyInteger('hotelbeds_paid')->default('0');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customsers');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign('bookings_customer_id_foreign');
        });

        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign('bookings_supplier_id_foreign');
        });

        Schema::dropIfExists('bookings');
    }
}