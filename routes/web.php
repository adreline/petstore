<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\PetStoreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $pets = Session::has('pets') ? Session::get('pets') : [];
    return view('home', [
        'pets' => $pets,
        'message' => Session::get('message'),
        'exception' => Session::get('exception')
    ]);
    
})->name('home');

Route::post('/api/pets/query', [PetStoreController::class, 'queryPet'])->name('api.pets.query');
Route::post('/api/pets/store', [PetStoreController::class, 'storeOrUpdatePet'])->name('api.pets.store');
Route::post('/api/pets/update', [PetStoreController::class, 'storeOrUpdatePet'])->name('api.pets.update');
Route::post('/api/pets/delete', [PetStoreController::class, 'deletePet'])->name('api.pets.delete');

