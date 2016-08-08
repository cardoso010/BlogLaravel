<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comentario');
            $table->timestamps();
        });

        Schema::table('comentarios', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('artigo_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('artigo_id')->references('id')->on('artigos');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comentarios');
    }
}
