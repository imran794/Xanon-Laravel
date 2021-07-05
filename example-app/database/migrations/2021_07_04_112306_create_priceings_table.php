<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('priceings', function (Blueprint $table) {
            $table->id();
            $table->string('price_sub_title');
            $table->string('price_title');
            $table->string('price_list1');
            $table->string('price_list2');
            $table->string('price_list3');
            $table->string('price_list4');
            $table->string('price_list5');
            $table->string('price_btn');
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
        Schema::dropIfExists('priceings');
    }
}
