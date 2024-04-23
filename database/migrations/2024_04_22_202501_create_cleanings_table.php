<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCleaningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleanings', function (Blueprint $table) {
            $table->id();
            $table->string('come_date');
            $table->foreignId('location_id')->references('id')->on('locations');
            $table->string('address');
            $table->string('apt_number')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->boolean('pay_now');
            $table->string('paypal_email')->nullable();
            $table->foreignId('time_window_id')->references('id')->on('time_windows');
            $table->foreignId('cleaning_type_id')->references('id')->on('cleaning_types');
            $table->foreignId('flat_size_id')->references('id')->on('flat_sizes');
            $table->foreignId('bathroom_size_id')->references('id')->on('bathroom_sizes');
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
        Schema::dropIfExists('cleanings');
    }
}
