<?php

/**
 * Migration per la creazione della tabella "articles".
 * Questa tabella contiene gli articoli del Mini CMS Portfolio.
 * Ogni articolo ha titolo, contenuto e timestamp di creazione/modifica.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Esegue la migration: crea la tabella "articles".
     */

    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            // ID incrementale primario
            $table->id();

            // Titolo dell'articolo (stringa fino a 255 caratteri)
            $table->string('title');

            // Contenuto dell'articolo (testo lungo)
            $table->text('content');

            // Timestamp automatici: created_at e updated_at
            $table->timestamps();
        });
    }

    /**
     * Annulla la migration: elimina la tabella "articles".
     */


    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
