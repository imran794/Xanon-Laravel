<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('about_title');
            $table->string('about_sub_title');
            $table->longText('about_description');
            $table->longText('about_des_1');
            $table->longText('about_des_2');
            $table->longText('about_des_3');
            $table->longText('about_des_4');
            $table->longText('about_des_5');
            $table->longText('about_des_6');
            $table->string('about_image');
            $table->string('status')->default(1);
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
        Schema::dropIfExists('abouts');
    }
}
