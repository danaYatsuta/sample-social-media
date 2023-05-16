<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

    Route::middleware('auth')->group(function () {
        Route::get('/users', 'index')->name('users.index');
        Route::get('/users/{user}', 'show')->name('users.show');
        Route::get('/edit', 'edit')->name('users.edit');
        Route::patch('/edit', 'update')->name('users.update');
        Route::delete('/delete', 'destroy')->name('users.destroy');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/menu', function () {
        return Inertia::render('Menu', ['user' => Auth::user()]);
    })->name('menu');
});
