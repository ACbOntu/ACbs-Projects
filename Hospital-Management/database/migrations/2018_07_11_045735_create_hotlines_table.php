<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotlines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('appointment');
            $table->string('emergency');
            $table->string('ambulance');
            $table->string('duty_manager');
            $table->string('barishal');
            $table->string('khulna');
            $table->string('patuakhali');
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
        Schema::dropIfExists('hotlines');
    }
}
