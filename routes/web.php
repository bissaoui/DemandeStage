<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EcoleController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FormationUserController;
use App\Http\Controllers\LangueController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\ReseauSociauxController;
use App\Http\Controllers\TechnologieController;
use App\Http\Controllers\UserLangController;
use App\Http\Controllers\UserReseauController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\DemandeStageController;
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
    Route::get('projet/{id}/Date', [ProjetController::class, 'getDateprojet'])->name('projet.Date');
    Route::put('projet/{id}/info', [ProjetController::class, 'editInfoprojet'])->name('projet.info');
    Route::put('projet/{id}/Date', [ProjetController::class, 'editDateprojet'])->name('projet.Date');

    //Projet Technologies

    Route::get('projet/{id}/techno', [ProjetController::class, 'getTechnoprojet'])->name('projet.techno');
    Route::delete('projet/{id}/techno/{idTech}/delete', [ProjetController::class, 'destroyTech'])->name('projet.techs.delete');
    Route::post('projet/{id}/techno', [ProjetController::class, 'storeTechToProjet'])->name('projet.storeTech');

    //Projet Users

    Route::get('projet/{id}/equipe', [ProjetController::class, 'getEquipeprojet'])->name('projet.equipe');
    Route::delete('projet/{id}/equipe/{idUser}/delete', [ProjetController::class, 'destroyUser'])->name('projet.equipe.delete');
    Route::post('projet/{id}/equipe', [ProjetController::class, 'storeUserToProjet'])->name('projet.storeUser');

    Route::delete('userDelete/{id}', [UserController::class, 'destroy']);
});
/*///////////////////////////////////////End Admin//////////////////////////////////////////////*/

/*-----------------------------------------user------------------------------------------------*/

Route::group(['prefix' => 'user', 'middleware' => ['isUser', 'auth']], function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('settings', [UserController::class, 'settings'])->name('user.settings');
    Route::get('password', [UserController::class, 'password'])->name('user.password');
    Route::put('updatePassword/{id}', [UserController::class, 'updatePassword'])->name('user.updatePassword');
    Route::resource('reseau', UserReseauController::class);
    Route::resource('langue', UserLangController::class);
    Route::resource('competence', CompetenceController::class);
    Route::resource('experience', ExperienceController::class);
    Route::resource('formation', FormationUserController::class);
    Route::resource('absence', absenceController::class);
    Route::resource('demande_Stage', DemandeStageController::class);
    Route::get('projet_Stage', [ProjetController::class, 'getAllProjetStagaire'])->name('projet_Stage.getAllProjetStagaire');
    Route::get('projet_Stage/{id}', [ProjetController::class, 'showProjet'])->name('projet_Stage.showProjet');





    Route::put('update/{id}', [UserController::class, 'update'])->name('user.update');
});

/*///////////////////////////////////////End User//////////////////////////////////////////////*/
