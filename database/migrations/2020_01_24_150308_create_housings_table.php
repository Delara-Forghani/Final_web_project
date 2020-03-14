<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('housings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->float('price');
            $table->string('type');
            $table->integer('area');
            $table->integer('bedrooms');
            $table->integer('parkings');
            $table->string('location');
            $table->string('pic')->nullable();
            $table->string('estate');
            $table->boolean('star')->default('0');
            $table->integer('userid');
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
        Schema::dropIfExists('housings');
    }
}
