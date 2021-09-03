<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EcoleController;
use App\Http\Controllers\LangueController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\ReseauSociauxController;
use App\Http\Controllers\TechnologieController;
use App\Http\Controllers\VilleController;
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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*-----------------------------------------Admin------------------------------------------------*/

Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'auth']], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::get('users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('stagiaire', [AdminController::class, 'stagiaire'])->name('admin.stagiaire');
    Route::resource('ecole', EcoleController::class);
    Route::resource('ville', VilleController::class);
    Route::resource('technologie', TechnologieController::class);
    Route::resource('reseau', ReseauSociauxController::class);
    Route::resource('projet', ProjetController::class);
    Route::resource('langue', LangueController::class);
    Route::get('projet/{id}/info', [ProjetController::class, 'getInfoprojet'])->name('projet.info');
    Route::put('projet/{id}/info', [ProjetController::class, 'editInfoprojet'])->name('projet.info');

    Route::delete('userDelete/{id}', [UserController::class, 'destroy']);
});
/*///////////////////////////////////////End Admin//////////////////////////////////////////////*/

/*-----------------------------------------user------------------------------------------------*/

Route::group(['prefix' => 'user', 'middleware' => ['isUser', 'auth']], function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('settings', [UserController::class, 'settings'])->name('user.settings');
});

/*///////////////////////////////////////End User//////////////////////////////////////////////*/
