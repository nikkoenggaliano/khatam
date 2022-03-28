<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BacaQuranController;
use App\Http\Controllers\ApiPublicController;
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
Route::get('/surah/{id}', [PublicController::class, 'BacaSurah'])->name('baca-surah');
Route::get('/hadits-home', [PublicController::class, 'haditspage'])->name('hadits-home');
Route::post('/cari-hadits', [PublicController::class, 'carihadits'])->name('cari-hadits');
Route::get('/baca-hadits/{rawi}/{no}', [PublicController::class, 'bacahadits'])->name('baca-hadits');
Route::get('/pegonkan', [PublicController::class, 'pegonkan'])->name('pegon-home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [PublicController::class, 'Dashboard'])->name('user-dashboard');

    Route::get('/bacaquran', [BacaQuranController::class, 'bacaquran'])->name('bacaquran');

    Route::post('/favorites', [ApiPublicController::class, 'api_fav'])->name('api.fav');

    Route::get('/my-favorite/{type?}', [UserController::class, 'MyFavorites'])->name('myfavorites');
});




Route::prefix('auth')->group(function () {

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register-page');

    Route::get('/login', function () {
        return view('auth.login');
    })->name('login-page');

    Route::get('/logout', [UserController::class, 'Logout'])->name('logout');
    Route::post('/register-action', [UserController::class, 'Register'])->name('save-register');
    Route::post('/login-action', [UserController::class, 'Login'])->name('save-login');
});


Route::prefix('api-pubs')->group(function () {
    Route::post('/bacaquran', [ApiPublicController::class, 'api_bacaquran'])->name('api.bacaquran');
});
