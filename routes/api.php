<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetStoreController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/api/pets/store', [PetStoreController::class, 'storePet'])->name('api.pets.store');
Route::post('/api/pets/update/{id}', [PetStoreController::class, 'updatePet'])->name('api.pets.update');
Route::post('/api/pets/query}', [PetStoreController::class, 'queryPet'])->name('api.pets.query');
Route::delete('/api/pets/delete/{id}', [PetStoreController::class, 'deletePet'])->name('api.pets.delete');
