<?php

use App\Http\Controllers\ContratoController;
use App\Http\Controllers\FamiliarController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\IncapacidadController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
*/


Route::get('/persona', [PersonaController::class, 'listPerson'])->name('persona.list');

Route::get('/persona/createPerson', [PersonaController::class, 'create'])->name('persona.create');
Route::post('/persona/createPerson', [PersonaController::class, 'store'])->name('persona.store');

Route::post('/persona/createFamiliar', [PersonaController::class, 'familiar'])->name('persona.familiar');

Route::post('/persona/createContrato', [PersonaController::class, 'contrato'])->name('persona.contrato');

Route::post('/persona/createArchivo', [PersonaController::class, 'archivo'])->name('persona.archivo');

Route::get('/persona/editPerson/{id_persona}', [PersonaController::class, 'edit'])->name('persona.edit');
Route::put('/persona/updPerson', [PersonaController::class, 'update'])->name('persona.update');

Route::get('/incapacidad', [IncapacidadController::class, 'listIncap'])->name('incapacidad.list');

Route::get('/incapacidad/createIncap', [IncapacidadController::class, 'createIncap'])->name('incapacidad.create');
Route::post('/incapacidad/createIncap', [IncapacidadController::class, 'storeIncap'])->name('incapacidad.store');

Route::get('/incapacidad/editIncap', [IncapacidadController::class, 'editIncap'])->name('incapacidad.edit');
Route::put('/incapacidad/updIncap', [IncapacidadController::class, 'updateIncap'])->name('incapacidad.update');

Route::get('/persona/search', [SearchController::class, 'idSearch'])->name('persona.busqueda');




Route::get('/incapacidad', function () {
    return view('incapacidad.index');
});






/*Route::resource('persona', PersonaController::class);*/
Auth::routes();


Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');




Route::get('/welcome', [HomeController::class, 'index'])->name('welcome');
Route::get('getpersona/{id}', 'PersonaController@getDataPerson')->name('get.persona');