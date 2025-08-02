<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return view('hello');
});
Route::get('/msg', function () {
    return view('msg');
});

use App\Models\User;

Route::get('/users', function () {
    $users = User::all(); // fetch all users
    return view('users', compact('users'));
});
Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
Route::post('/cars/store', [CarController::class, 'store'])->name('cars.store');

Route::get('/cars/allcars', [CarController::class, 'allcars'])->name('cars.allcars');
Route::delete('/cars/{id}', [CarController::class, 'destroy'])->name('cars.destroy');
Route::get('/cars/{id}/edit', [CarController::class, 'edit'])->name('cars.edit');
Route::put('/cars/{id}', [CarController::class, 'update'])->name('cars.update');
Route::get('/cars/react-allcars', function () {
    $cars = \App\Models\Car::all();
    return view('cars.react-allcars', compact('cars'));
});
