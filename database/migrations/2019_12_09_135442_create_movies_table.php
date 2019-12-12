<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); 
            $table->string('director'); 
            $table->integer('duration'); 
            $table->integer('year'); 
            $table->timestamps();
           
        });
        
        //pour les foreignKeys
        //genre_id
        //un schéma unique pour toutes les foreignKeys
        Schema::table('movies', function (Blueprint $table){
            $table->unsignedBigInteger('genre_id');
            //genre_id est le nom que je choisis de donner à ma foreignKey     
            $table->foreign('genre_id')->references('id')->on('genres');
            // le on('genres') est la seule connexion à la base genres
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
