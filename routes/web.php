<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\userController;
use App\Http\Controllers\overallController;
use App\Http\Controllers\patientController;
use App\Http\Controllers\doctorController;
use App\Http\Controllers\roomController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AnswerFormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// switch path
Route::get('/redirects', [adminController::class, 'checkType']);

// home
Route::get('/', function () {
    return view('index');
    // return redirect('/dashboard');
})->name('home');

/*------------
    WEBSITE
--------------*/
Route::get('/advertise', [userController::class, 'advertise'])->name('advertise');
Route::get('/contact', [userController::class, 'contact'])->name('contact');
Route::get('/service', [userController::class, 'service'])->name('service');


/*-------------
    ADMIN
-------------*/
Route::middleware([
    'userCheck',
])->group(function () {
    // admin dashboard
    Route::get('/admin', [adminController::class, 'index'])->name('dashboard');

    // add new doctor
    Route::get('/add/doctor', [adminController::class, 'createFormAdd'])->name('createFormAdd');
    Route::post('/add/doctor', [adminController::class, 'addDoctor'])->name('addDoctor');

    // display all doctor
    Route::get('/show/docter', [adminController::class, 'showDoctor'])->name('showDoctor');

    // manage user account
    Route::get('/manage_user_account', [adminController::class, 'manageUser'])->name('manageUser');
    Route::get('/update_user/{id}', [adminController::class, 'createForm'])->name('createForm');
    Route::post('/update_user', [adminController::class, 'updateUser'])->name('updateUser');
    Route::get('/delete_user/{id}', [adminController::class, 'deleteUser'])->name('deleteUser');
});

/*-------------
    DOCTOR
--------------*/
Route::middleware([
    'doctorActive',
])->group(function () {

    Route::get('/doctor', [dashboardController::class, 'index'])->name('dashboard');
    Route::get('/doctor/profile', [doctorController::class, 'doctorProfile'])->name('doctorProfile');
    Route::post('/doctor/profile/edit', [doctorController::class, 'doctorProfileEdit'])->name('doctorProfileEdit');
    Route::get('/doctor/new/patient', [doctorController::class, 'doctorAddPatient'])->name('doctorAddPatient');
    Route::get('/doctor/patient/register', [doctorController::class, 'doctorRegisterPatient'])->name('doctorRegisterPatient');
    Route::get('/doctor/building', [doctorController::class, 'building'])->name('building');
    Route::get('/doctor/building/room/{id}', [doctorController::class, 'room'])->name('roomBuilding');
    Route::get('/doctor/patient/information', [doctorController::class, 'patientInformation'])->name('patientInformation');
    Route::post('/doctor/search/information', [doctorController::class, 'patient_search'])->name('patientSearch');
    Route::get('/doctor/patient/incase', [doctorController::class, 'patientIncase'])->name('patientIncase');

    Route::get('/doctor/add/congenital/{patient_id}/{treatment_id}', [doctorController::class, 'addCongenital'])->name('addCongenital');
    Route::post('/doctor/save/congenital', [doctorController::class, 'saveCongenital'])->name('saveCongenital');
    Route::post('/doctor/add/incase', [doctorController::class, 'addIncase'])->name('addIncase');
    Route::post('/doctor/create/patient', [doctorController::class, 'createPatient'])->name('createPatient');
    Route::get('/doctor/create/success', [doctorController::class, 'createSucess'])->name('createSucess');
    Route::get('/doctor/create/fail', [doctorController::class, 'createFail'])->name('createFail');

    Route::get('/doctor/patient/room/{id}', [roomController::class, 'room'])->name('room');
    Route::get('/doctor/treated/{treat_id}', [doctorController::class, 'treated'])->name('treated');
    Route::post('/doctor/add/treatment', [doctorController::class, 'addTreatment'])->name('addTreatment');
    Route::post('/doctor/treated/congenital', [doctorController::class, 'treatedCongenital'])->name('treatedCongenital');

    /*-------------
        Q & A
    ---------------*/
    Route::get('/question/doctor', [QuestionController::class, 'index_doct'])->name("questionForDoc");
    Route::get('/answer', [AnswerController::class, 'index'])->name('answer');
    Route::get('/answer/{id}', [AnswerFormController::class, 'index']);
    Route::post('/answer/reply', [AnswerFormController::class, 'sendReply']);
    Route::post('/search', [QuestionController::class, 'search']);
});

/*-------------
    Patient
---------------*/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'patientPart',
])->group(function () {
    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');

    // Patient
    Route::get('/patient/profilne', [patientController::class, 'patientProfile'])->name('patientProfile');
    Route::post('/patient/edit', [patientController::class, 'editPatient'])->name('editPatient'); //
    Route::post('/add/patient', [patientController::class, 'addPatient'])->name('addPatient');
    Route::get('/check/patient/statut', [patientController::class, 'checkStatusP'])->name('checkStatusP');
    Route::get('/p_register_menu', [patientController::class, 'registerMenu'])->name('registerMenu');

    Route::get('/new/patient', [patientController::class, 'newPatient'])->name('newPatient'); //->middleware(['patientCheck'])
    Route::get('/patient/regis/history', [patientController::class, 'regisHistory'])->name('regisHistory')->middleware(['patientCheck']); //

    // add patient succes
    Route::get('addpatientsuccess', function () {
        return view('patient/add_patient_success');
    });

    // alert
    Route::get('alert', function () {
        return view('alert');
    });
    
    /*-------------
        Q & A
    ---------------*/
    Route::get('/question', [QuestionController::class, 'index'])->name("question");
    Route::post('/question/add', [QuestionController::class, 'sendQuestion']);
    Route::post('/search', [QuestionController::class, 'search']);
});



/*
| test route
*/
Route::get('/user', [overallController::class, 'showUser']);
Route::get('/modelRelation', [overallController::class, 'modelRelation']);
Route::get('/test/{name}', [adminController::class, 'checkidbyname']);
Route::get('findOrfail', [patientController::class, 'findOrfail']);
Route::get('checkcon/{patient_id}/{treat_id}', [doctorController::class, 'checkcon']);

Route::get('new_login', function () {
    return view('new_login');
});
