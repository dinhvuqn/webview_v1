<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoluongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soluong', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('giatri')->unique();
            $table->integer('id_kieudv')->unsigned();
            $table->foreign('id_kieudv')->references('id')->on('kieudv');
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
        Schema::dropIfExists('soluong');
    }
}
