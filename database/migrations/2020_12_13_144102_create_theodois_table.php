<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTheodoisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theodois', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_theo_doi_id')->unsigned();
            $table->integer('user_duoc_theo_doi_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_theo_doi_id')->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreign('user_duoc_theo_doi_id')->references('id')->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theodois');
    }
}
