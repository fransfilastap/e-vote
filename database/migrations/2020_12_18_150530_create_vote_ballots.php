<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoteBallots extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_ballots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vote_id');
            $table->unsignedBigInteger('voter_id');
            $table->unsignedBigInteger('vote_option_id');
            $table->integer('weight')->default(0);
            $table->timestamps();

            $table->foreign('vote_id')->references('id')->on('votes');
            $table->foreign('voter_id')->references('id')->on('voters');
            $table->foreign('vote_option_id')->references('id')->on('vote_options');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vote_ballots');
    }
}
