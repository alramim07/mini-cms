<?php

/**
 * Modello Article
 * Rappresenta un articolo del Mini CMS Portfolio.
 * Mappa la tabella "articles" e definisce i campi assegnabili.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    /**
     * Nome della tabella associata al modello.
     * Laravel lo dedurrebbe automaticamente, ma lo specifichiamo per chiarezza.
     */
    protected $table = 'articles';

    /**
     * Campi assegnabili in massa (mass assignment).
     * Questi campi possono essere popolati tramite create() o update().
     */
    protected $fillable = [
        'title',   // Titolo dell'articolo
        'content', // Contenuto dell'articolo
    ];
}
