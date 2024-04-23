<?php

use App\Models\Cleaning;
use App\Models\Extras;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCleaningExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleaning_extras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cleaning_id')->references('id')->on('cleanings')->cascadeOnDelete();
            $table->foreignId('extras_id')->references('id')->on('extras')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cleaning_extras');
    }
}
