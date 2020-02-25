<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinishedordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finishedorders', function (Blueprint $table) {
            $table->bigIncrements('ordid')->unique();
            $table->string('orderid')->unique();
            $table->string('shopid');
            $table->string('time');
            $table->string('foodid');
            $table->string('amount');
            $table->string('price');
            $table->string('stdid');
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
        Schema::dropIfExists('finishedorders');
    }
}
