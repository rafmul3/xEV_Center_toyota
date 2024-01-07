<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\emailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\settingController;
use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Hash;

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
    return view('welcome');
});

Route::resource('pengunjung', PengunjungController::class);
Route::get('/pengunjung/reservasiConfirmation/{id}', [PengunjungController::class, 'reservasiConfirmation']);
Route::post('/pengunjung/reservasiConfirmation/attendConfirmation', [PengunjungController::class, 'attendConfirmation']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/test2', function () {
    return view('registrasi');
});

//email
Route::get('/email/{group_code}',[emailController::class, 'emailVerifikasi']);
Route::post('/email/confirmationCode/{id}',[emailController::class, 'codeVerifikasi']);
Route::get('/email/deleted/{group_code}/{cryptCode}',[emailController::class, 'registrationDeleted']);

//-------------------------------

//login
Route::get('/login', function () {
    return view('login');
})->name('login');;

Route::post('/login', [UserController::class, 'login']);
//---------------------------------

//auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/validateCode', [UserController::class, 'validateCode']);
    Route::post('/ConfirmationCode', [UserController::class, 'ConfirmationCode']);
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    
    Route::middleware('can:userRole')->group(function () {
        Route::get('/userRole', [DashboardController::class, 'userRole']);
        Route::get('/userRole/{id}', [DashboardController::class, 'userRoleEdit']);
        Route::get('/userRoleCreate', [DashboardController::class, 'userRoleCreate']);
        Route::post('/userRoleCreate/Store', [DashboardController::class, 'userRoleStore']);
        Route::post('/userRole/edit/{id}', [DashboardController::class, 'userRoleUpdate']);
        Route::post('/createNewRoles', [DashboardController::class, 'createNewRoles']);
        Route::get('/rolePermission', [DashboardController::class, 'rolePermission']);
        Route::get('/rolePermission/{id}', [DashboardController::class, 'rolePermissionEdit']);
        Route::post('/rolePermission/Edit/{id}', [DashboardController::class, 'rolePermissionUpdate']);
        Route::post('/roleDelete', [DashboardController::class, 'roleDelete']);
        Route::post('/deleteUser', [UserController::class, 'deleteUser']);
    });

    
    Route::middleware('can:registration')->group(function () {
        Route::post('/registrationDashboard/delete', [DashboardController::class, 'registrationDashboardDelete']);
    });
    
    Route::middleware('can:feedback')->group(function () {
        Route::post('/feedbackDashboard/delete', [DashboardController::class, 'FeedbackDelete']);
    });
    
    Route::middleware('can:checkin')->group(function () {
        Route::post('/checkinDashboard/delete', [DashboardController::class, 'checkinDashboardDelete']);
        Route::post('/blastEmail/{id}', [emailController::class, 'blastEmail']);
    });

    Route::middleware('can:setting')->group(function () {

        Route::get('/setting/dayOff', [settingController::class, 'dayOff']);
        Route::get('/setting/dayOff/create', [settingController::class, 'dayOffCreate']);
        Route::post('/setting/dayOff/Store', [settingController::class, 'dayOffStore']);
        Route::get('/setting/dayOff/{id}', [settingController::class, 'dayOffEdit']);
        Route::post('/setting/dayOff/Update', [settingController::class, 'dayOffUpdate']);
        Route::post('/setting/dayOff/Delete', [settingController::class, 'dayOffDelete']);

        Route::get('/setting/reservationSession', [settingController::class, 'reservationSession']);
        Route::get('/setting/reservationSession/create', [settingController::class, 'reservationSessionCreate']);
        Route::get('/setting/reservationSession/{id}', [settingController::class, 'reservationSessionEdit']);
        Route::post('/setting/reservationSession/createNew', [settingController::class, 'reservationSessionStore']);
        Route::post('/setting/reservationSession/update', [settingController::class, 'reservationSessionUpdate']);
        Route::post('/setting/reservationSession/delete', [settingController::class, 'reservationSessionDelete']);

        Route::post('/allow_days', [settingController::class, 'updateAllowDays']);
    });

    //dashboard
    Route::get('/dashboard', [DashboardController::class, 'Dashboard'])->name('dashboard');
    
    Route::get('/allowdate', function () {
        return view('admin.allowDate');
    });
    Route::get('/kuota', function () {
        return view('admin.kuota');
    });
    Route::get('/setting', [settingController::class, 'index']);
    
    Route::get('/checkinDashboard', [DashboardController::class, 'checkinDashboard']);
    Route::get('/registrationDashboard', [DashboardController::class, 'registrationDashboard']);
    Route::get('/registrationDashboard/{encrypt}', [DashboardController::class, 'registrationDashboardDetail']);
    Route::get('/feedbackDashboard', [DashboardController::class, 'feedbackDashboard']);
    Route::get('/download/feedback', [DashboardController::class, 'downloadFeedback']);
});

Route::get('/feedbackPengunjung/{cryptID}', [FeedbackController::class, 'index']);
Route::post('/feedbackPengunjung/store', [FeedbackController::class, 'store']);
//----------------------------------

//feedback
// Route::resource('feedback', FeedbackController::class);

//----------------------------------
require __DIR__.'/auth.php';
