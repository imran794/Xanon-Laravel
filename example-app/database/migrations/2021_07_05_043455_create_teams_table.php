<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('team_image');
            $table->string('team_title');
            $table->string('team_sub_title');
            $table->string('team_facebook')->nullable();
            $table->string('team_facebook_link')->nullable();
            $table->string('team_twitter')->nullable();
            $table->string('team_twitter_link')->nullable();
            $table->string('team_youtube')->nullable();
            $table->string('team_youtube_link')->nullable();
            $table->string('team_linkedin')->nullable();
            $table->string('team_linkedin_link')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('teams');
    }
}
