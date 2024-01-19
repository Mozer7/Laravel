<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\FiliereController;
use App\Http\Controllers\EtudiantController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::group(['middleware' => 'auth'], function () {
    //la fonction resource fetch les fonctionalites d'une classe designee (nom / class a rechercher)
    Route::resource('filieres', FiliereController::class);
    Route::resource('etudiants', EtudiantController::class);
    //inclusion de route manuellement en utilisant la methode get (nom directory / nom class / fonction inclus dans la classe)
    Route::get('/filieres-with-etudiant-count', [FiliereController::class, 'filiereWithEtudiantCount'])->name('filieres.with.etudiant.count');

   

});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
