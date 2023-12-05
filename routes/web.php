
<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ItemList;
use App\Livewire\ItemForm;
use App\Http\Controllers\RevisorController;

use App\Models\Item;
use App\Http\Controllers\LavoraConNoiController;
use App\Http\Controllers\PageController;

Route::resource('Category', \App\Http\Controllers\CategoryController::class); 

Route::get('/', [App\Http\Controllers\PageController::class, 'home'])->name('home');

Route::get('/contatti', [App\Http\Controllers\PageController::class, 'contacts'])->name('contacts');

Route::get('/contatti', [App\Http\Controllers\ContactController::class, 'form'])->name('contacts');

Route::post('/contatti/invia', [App\Http\Controllers\ContactController::class, 'send'])->name('contacts.send');

Route::get('/job', function() {

    return view('job');

})->name('job');


Route::prefix('account')->middleware(['auth', 'verified'])->group(function(){   
          // per far creare gli articoli solo agli utenti autenticati

Route::get('/account', [App\Http\Controllers\AccountController::class, 'index'])
    ->name('account');

Route::get('/settings', [App\Http\Controllers\AccountController::class, 'settings'])
    ->name('account.settings');

Route::post('/settings.store', [App\Http\Controllers\AccountController::class, 'settingsStore'])
    ->name('account.settings.store');

    Route::resource('items', \App\Http\Controllers\ItemController::class)->except([
        'index','show'
    ]);;

    Route::get('/CreaAnnuncio', ItemForm::class)->name('itemForm');
});

Route::get('/Annunci', ItemList::class)->name('listItems');

//Home revisore
Route::get('/revisor/home', [RevisorController::class, 'index'])->name('revisor.index');

//Accetta annuncio
Route::patch('/accetta/annuncio/{item}', [RevisorController::class,'acceptItem'])->name('revisor.accept_item');

//Rifiuta annuncio
Route::patch('/rifiuta/annuncio/{item}', [RevisorController::class,'rejectItem'])->name('revisor.reject_item');

//cambio lingua
Route::post('/lingua/{lang}', [PageController::class, 'setLanguage'])->name('set_language_locale');