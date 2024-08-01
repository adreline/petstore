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
    if(Session::has('pets')){
        return view('home', ['pets' => Session::get('pets')]);
    }else{
        return view('home', ['pets' => []]);
    }
    
})->name('home');

Route::post('/api/pets/query', [PetStoreController::class, 'queryPet'])->name('api.pets.query');
Route::post('/api/pets/store', [PetStoreController::class, 'storePet'])->name('api.pets.store');
Route::post('/api/pets/update', [PetStoreController::class, 'updatePet'])->name('api.pets.update');
Route::post('/api/pets/delete', [PetStoreController::class, 'deletePet'])->name('api.pets.delete');

