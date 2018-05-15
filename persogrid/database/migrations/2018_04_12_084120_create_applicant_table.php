<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uID');
            $table->string('birthdate')->nullable();
            $table->string('jobtitel')->nullable();
            $table->string('location')->nullable();
            $table->string('workload')->nullable();
            $table->string('branche')->nullable();
            $table->string('experience')->nullable();
            $table->string('education')->nullable();
            $table->string('degree')->nullable();
            $table->string('softskills')->nullable();
            $table->string('socialskills')->nullable();
            $table->string('state')->nullable();
            $table->string('sex')->nullable();

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
        Schema::dropIfExists('applicants');
    }
}
