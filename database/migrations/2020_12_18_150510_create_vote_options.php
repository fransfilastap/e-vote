<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoteOptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vote_id');
            $table->string('label');
            $table->string('atribute_1');
            $table->string('atribute_2');
            $table->string('atribute_3');
            $table->text('description');
            $table->text('photos');
            $table->timestamps();

            $table->foreign('vote_id')->references('id')->on('votes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vote_options');
    }
}
