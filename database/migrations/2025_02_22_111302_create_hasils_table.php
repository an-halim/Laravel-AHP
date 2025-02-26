<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasils', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_result_id')->unsigned();
            $table->foreign('user_result_id')->references('id')->on('user_results')->onDelete('cascade');
            $table->integer('alternative_id')->unsigned();
            $table->foreign('alternative_id')->references('id')->on('alternatives')->onDelete('cascade');
            $table->string('model');
            $table->string('nama');
            $table->float('ahp');
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
        Schema::dropIfExists('hasils');
    }
}
