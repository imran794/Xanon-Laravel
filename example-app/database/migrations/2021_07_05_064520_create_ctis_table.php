<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCtisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctis', function (Blueprint $table) {
            $table->id();
            $table->string('cti_image');
            $table->longText('cti_link');
            $table->string('cti_title');
            $table->longText('cti_des');
            $table->string('cti_btn');
            $table->integer('status');
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
        Schema::dropIfExists('ctis');
    }
}
