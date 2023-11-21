
<?php

use Illuminate\Support\Facades\Route;

use App\Models\Item;



Route::get('/', [App\Http\Controllers\PageController::class, 'home'])->name('home');

Route::get('/articoli', [App\Http\Controllers\ItemController::class, 'index'])->name('items');

Route::get('/articolo/{id}', [App\Http\Controllers\ItemController::class, 'show'])->name('item');

Route::get('/contatti', [App\Http\Controllers\PageController::class, 'contacts'])->name('contacts');

Route::get('/contatti', [App\Http\Controllers\ContactController::class, 'form'])->name('contacts');

Route::post('/contatti/invia', [App\Http\Controllers\ContactController::class, 'send'])->name('contacts.send');

Route::get('/items', [App\Http\Controllers\ItemController::class, 'items']);

Route::get('/categorie', [App\Http\Controllers\CategoryController::class, 'categories']); 



Route::prefix('account')->middleware(['auth', 'verified'])->group(function(){   
          // per far creare gli articoli solo agli utenti autenticati

Route::get('/', [App\Http\Controllers\AccountController::class, 'index'])
    ->name('account');

Route::get('/settings', [App\Http\Controllers\AccountController::class, 'settings'])
    ->name('account.settings');

Route::post('/settings.store', [App\Http\Controllers\AccountController::class, 'settingsStore'])
    ->name('account.settings.store');



Route::resource('items', App\Http\Controllers\ItemController::class);

});