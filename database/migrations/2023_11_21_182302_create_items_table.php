<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {

            $table->id();
            $table->string('title', 40); // Titolo con massimo 20 caratteri
            $table->decimal('price', 8, 2); // Prezzo numerico con virgola
            $table->text('description'); // Descrizione
            $table->unsignedBigInteger('user_id');//Riferimento all'utente che ha creato l'annuncio
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
