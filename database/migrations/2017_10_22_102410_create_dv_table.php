<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dv', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->text('mota');
            $table->integer('id_loaidv')->unsigned();
            $table->foreign('id_loaidv')->references('id')->on('loaidv');
            $table->integer('id_kieudv')->unsigned();
            $table->foreign('id_kieudv')->references('id')->on('kieudv');
            $table->decimal('giatien',8,2);
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
        Schema::dropIfExists('dv');
    }
}
