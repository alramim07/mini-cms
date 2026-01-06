<?php

/**
 * ---------------------------------------------------------
 *  ROTTE PRINCIPALI DEL MINI CMS ANNUNCI
 *  Struttura ordinata per sezioni:
 *  - Home
 *  - Articoli
 *  - Annunci pubblici
 *  - Annunci autenticati
 *  - Area Admin
 *  - Verifica email
 * ---------------------------------------------------------
 */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AnnouncementController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/* ---------------------------------------------------------
 |  HOME
 |  La home reale del CMS è la root "/"
 --------------------------------------------------------- */

Route::get('/', [HomeController::class, 'index'])->name('home');

/**
 * Fix redirect Laravel → /home
 * Alcuni flussi (login, verifica email) puntano a /home.
 * Questa rotta evita il 404 e reindirizza alla home reale.
 */
Route::get('/home', function () {
    return redirect('/');
})->middleware(['auth', 'verified']);


/* ---------------------------------------------------------
 |  ARTICOLI (CRUD completo)
 --------------------------------------------------------- */
Route::controller(ArticleController::class)->group(function () {

    // Lista articoli
    Route::get('/articles', 'index')->name('articles.index');

    // Form creazione articolo
    Route::get('/articles/create', 'create')->name('articles.create');

    // Salvataggio nuovo articolo
    Route::post('/articles', 'store')->name('articles.store');

    // Dettaglio articolo
    Route::get('/articles/{id}', 'show')->name('articles.show');

    // Form modifica articolo
    Route::get('/articles/{id}/edit', 'edit')->name('articles.edit');

    // Aggiornamento articolo
    Route::put('/articles/{id}', 'update')->name('articles.update');

    // Eliminazione articolo
    Route::delete('/articles/{id}', 'destroy')->name('articles.destroy');
});


/* ---------------------------------------------------------
 |  ANNUNCI PUBBLICI
 --------------------------------------------------------- */
Route::get('/annunci', [AnnouncementController::class, 'index'])
    ->name('announcements.index');

Route::get('/annunci/{announcement}', [AnnouncementController::class, 'show'])
    ->name('announcements.show');


/* ---------------------------------------------------------
 |  ANNUNCI — SOLO UTENTI AUTENTICATI E VERIFICATI
 --------------------------------------------------------- */
Route::middleware(['auth', 'verified'])->group(function () {

    // Form creazione annuncio
    Route::get('/annunci/create', [AnnouncementController::class, 'create'])
        ->name('announcements.create');

    // Salvataggio annuncio
    Route::post('/annunci', [AnnouncementController::class, 'store'])
        ->name('announcements.store');
});


/* ---------------------------------------------------------
 |  AREA ADMIN
 --------------------------------------------------------- */
Route::middleware(['auth', 'admin'])->group(function () {

    // Lista annunci da approvare
    Route::get('/admin/annunci', [AnnouncementController::class, 'adminIndex'])
        ->name('admin.announcements.index');

    // Approva annuncio
    Route::patch('/admin/annunci/{announcement}/approve', [AnnouncementController::class, 'approve'])
        ->name('admin.announcements.approve');

    // Elimina annuncio
    Route::delete('/admin/annunci/{announcement}', [AnnouncementController::class, 'destroy'])
        ->name('admin.announcements.destroy');
});


/* ---------------------------------------------------------
 |  ANNUNCI PERSONALI (UTENTE LOGGATO)
 --------------------------------------------------------- */
Route::middleware(['auth'])->get('/miei-annunci', [AnnouncementController::class, 'myAnnouncements'])
    ->name('announcements.mine');


/* ---------------------------------------------------------
 |  VERIFICA EMAIL
 --------------------------------------------------------- */

/**
 * Link di verifica email → utente clicca → email verificata
 */
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); // marca l'utente come verificato

    return redirect('/login')->with(
        'status',
        '✅ Email verificata con successo. Ora puoi accedere.'
    );
})->middleware(['auth', 'signed'])->name('verification.verify');

/**
 * Reinvia email di verifica
 */
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Email di verifica inviata!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
