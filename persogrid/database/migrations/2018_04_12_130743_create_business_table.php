<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uID');
            $table->string('businessName')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('location')->nullable();
            $table->string('plz')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('telnr')->nullable();
            $table->string('street')->nullable();
            $table->integer('size')->nullable();
            $table->date('foundyear')->nullable();
            $table->string('description')->nullable();
            $table->boolean('car')->default(false);
            $table->boolean('event')->default(false);
            $table->boolean('flat')->default(false);
            $table->boolean('travel')->default(false);
            $table->boolean('fitness')->default(false);
            $table->boolean('kindergarden')->default(false);

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
        Schema::dropIfExists('businesses');
    }
}
