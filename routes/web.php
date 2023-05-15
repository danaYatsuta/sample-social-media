<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome');
});

Route::controller(UserController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/sign-up', 'create')->name('users.create');
        Route::post('/sign-up', 'store')->name('users.store');
    });

    // TODO move to "auth" after implementing login
    Route::get('/users/1', 'show')->name('users.show');

    Route::middleware('auth')->group(function () {
        Route::get('/users', 'index')->name('users.index');
        Route::get('/edit', 'edit')->name('users.edit');
        Route::patch('/edit', 'update')->name('users.update');
        Route::delete('/delete', 'destroy')->name('users.destroy');
    });
});
