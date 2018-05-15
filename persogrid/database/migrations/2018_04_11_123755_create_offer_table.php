<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('creatorID')->nullable();
            $table->string('jobtitel')->nullable();

            $table->string('location')->nullable();
            $table->date('date')->nullable();
            $table->string('workload')->nullable();
            $table->string('branche')->nullable();
            $table->string('experience')->nullable();
            $table->string('education')->nullable();
            $table->string('degree')->nullable();
            $table->string('softskills')->nullable();
            $table->string('socialskills')->nullable();
            $table->string('extra')->nullable();
            $table->string('salary')->nullable();
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
        Schema::dropIfExists('offers');
    }
}
