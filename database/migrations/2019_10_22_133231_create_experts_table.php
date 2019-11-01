<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('experts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('title');
            $table->string('biography', 2000);
            $table->string('photo');
            // $table->foreign('id')->references('expert_id')->on('events');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experts');
    }
}
