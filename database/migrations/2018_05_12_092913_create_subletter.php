<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubletter extends Migration
{ 
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subletters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date')->nullable();
            $table->string('title')->nullable();
            $table->longText('subject')->nullable();
            $table->integer('letter_id')->unsigned();
            $table->foreign('letter_id')->references('id')->on('letters');
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
       Schema::dropIfExists('subletters');
    }
}
