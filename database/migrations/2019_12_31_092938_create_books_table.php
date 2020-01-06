<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       // create table => creation de la table dans MYSQL
       // On définit ici la structure de la table que l'on va crée
      // La methode up crée la table
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',100);
            $table->text('description')->nullable();
            $table->dateTime('published_@t')->nullable();
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
        // La méthode drop supprime la table
        Schema::dropIfExists('books');
    }
}
