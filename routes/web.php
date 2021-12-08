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
use App\Http\Controllers\EventController;
use App\Http\Controllers\cvController;
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
    Route::resource('reseaux', ReseauSociauxController::class);
    Route::resource('projet', ProjetController::class);
    Route::resource('languee', LangueController::class);
    Route::get('projet/{id}/info', [ProjetController::class, 'getInfoprojet'])->name('projet.info');
    Route::get('projet/{id}/Date', [ProjetController::class, 'getDateprojet'])->name('projet.Date');
    Route::put('projet/{id}/info', [ProjetController::class, 'editInfoprojet'])->name('projet.info');
    Route::put('projet/{id}/Date', [ProjetController::class, 'editDateprojet'])->name('projet.Date');
    Route::get('cv/{id}', [cvController::class, 'index'])->name('cv.index');


    //Projet Technologies

    Route::get('projet/{id}/techno', [ProjetController::class, 'getTechnoprojet'])->name('projet.techno');
    Route::delete('projet/{id}/techno/{idTech}/delete', [ProjetController::class, 'destroyTech'])->name('projet.techs.delete');
    Route::post('projet/{id}/techno', [ProjetController::class, 'storeTechToProjet'])->name('projet.storeTech');

    //Projet Users

    Route::get('projet/{id}/equipe', [ProjetController::class, 'getEquipeprojet'])->name('projet.equipe');
    Route::delete('projet/{id}/equipe/{idUser}/delete', [ProjetController::class, 'destroyUser'])->name('projet.equipe.delete');
    Route::post('projet/{id}/equipe', [ProjetController::class, 'storeUserToProjet'])->name('projet.storeUser');

    // Demande de stage

    Route::get('demande/{id}/refuse', [DemandeStageController::class, 'refuse'])->name('demande.refuse');
    Route::get('demande/{id}/accepte', [DemandeStageController::class, 'accepte'])->name('demande.accepte');
    Route::get('demande', [DemandeStageController::class, 'allDemande'])->name('demande.allDemande');

    Route::delete('userDelete/{id}', [UserController::class, 'destroy']);
    Route::get('events', [EventController::class, 'index'])->name('admin.events');
    Route::get('absence', [AbsenceController::class, 'indexAdmin'])->name('admin.absence');
    Route::post('absence', [AbsenceController::class, 'store'])->name('admin.absence.store');
    Route::get('absence/{id}', [AbsenceController::class, 'show'])->name('admin.absence.show');
    Route::delete('absence/{id}/{idUser}', [AbsenceController::class, 'destroy'])->name('admin.absence.destroy');
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
    Route::get('cv', [cvController::class, 'indexS'])->name('cv.indexS');
    Route::get('mesabsences', [absenceController::class, 'absence'])->name("user.absence");
    Route::put('update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('MonCv', [cvController::class, 'myCv'])->name('cv.myCv');
});

/*/////////////////////////////////////// End User //////////////////////////////////////////////*/
