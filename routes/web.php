<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [PublicController::class, 'public'])->name('public');

Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::get('/surah/{id}', [PublicController::class, 'BacaSurah'])->name('baca-surah');



Route::prefix('auth')->group(function () {

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register-page');

    Route::get('/login', function () {
        return view('auth.login');
    })->name('login-page');
});
