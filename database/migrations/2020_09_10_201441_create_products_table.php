<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('short_desc')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('sort')->nullable()->index();
            $table->boolean('active')->nullable()->index();
            $table->boolean('sale')->nullable()->index();
            $table->unsignedFloat('price')->index()->nullable();
            $table->json('images')->nullable();
            $table->json('attributes')->nullable();
            $table->boolean('free_shipping')->nullable();
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
        Schema::dropIfExists('products');
    }
}
