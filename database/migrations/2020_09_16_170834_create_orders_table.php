<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('address')->nullable();
            $table->string('apt')->nullable();

            $table->string('fname_b')->nullable();
            $table->string('lname_b')->nullable();
            $table->string('address_b')->nullable();
            $table->string('apt_b')->nullable();
            $table->unsignedBigInteger('shipping_id')->nullable();
            $table->unsignedInteger('status')->nullable();
            $table->text('details')->nullable();
            $table->dateTime('order_date')->nullable();
            $table->string('transaction')->nullable();
            $table->string('cid')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
