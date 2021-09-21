<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EstimateController;
use App\Http\Controllers\Admin\FullCalenderController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SendEmailController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TodoController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use Spatie\GoogleCalendar\Event;
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

Route::group(['middleware'=>'auth.check'], function() {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
    Route::get('forget-password', [ForgotPasswordController::class,'getEmail'])->name('forgot');
    Route::post('forget-password', [ForgotPasswordController::class,'postEmail'])->name('forgot.sendEmail');
});

Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('reset-password/{token}', [ResetPasswordController::class,'getPassword']);
Route::post('reset-password', [ResetPasswordController::class,'updatePassword'])->name('reset.updatePassword');

Route::group(['prefix' => 'admin', 'as'=>'admin.', 'middleware'=>'auth'], function() {
    Route::get('/', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/roles',[RoleController::class,'index'])->name('roles')->middleware('admin');
    Route::get('/add-role',[RoleController::class,'create'])->name('role.create')->middleware('admin');
    Route::get('/edit-role/{id}',[RoleController::class,'edit'])->name('role.edit')->middleware('admin');
    Route::put('/update-role/{id}',[RoleController::class,'update'])->name('role.update')->middleware('admin');
    Route::post('/store-role',[RoleController::class,'store'])->name('role.store')->middleware('admin');
    Route::delete('/delete-role/{id}',[RoleController::class,'destroy'])->name('role.destroy')->middleware('admin');
    Route::resource('/teams', TeamController::class)->middleware('admin');
    Route::post('/todo',[TodoController::class,'store'])->name('todo.insert');
    Route::delete('/todo/{id}',[TodoController::class,'destroy'])->name('todo.destroy');
    Route::post('/todo/checked/{id}',[TodoController::class,'checked'])->name('todo.checked');
    Route::post('/sendEmail',[SendEmailController::class,'sendEmail'])->name('sendemail');
    Route::get('fullcalender', [FullCalenderController::class, 'index']);
    Route::post('fullcalenderAjax', [FullCalenderController::class, 'ajax']);
    Route::get('googleEventList', [FullCalenderController::class, 'googleEventList']);
    Route::resource('/contacts', ContactController::class);
    Route::put('/contactStatus', [ContactController::class,'updateStatus'])->name('contact.status.update');
    Route::resource('/leads', LeadController::class);
    Route::put('/leadStatus', [LeadController::class,'updateStatus'])->name('lead.status.update');
    Route::get('/profile', [ProfileController::class,'index'])->name('profile');
    Route::put('/profile', [ProfileController::class,'update'])->name('profile.update');
    Route::post('/updateavatar', [ProfileController::class,'updateAvatar'])->name('updateavatar');
    Route::resource('/estimates', EstimateController::class);
    Route::put('/estimateStatus', [EstimateController::class,'updateStatus'])->name('estimate.status.update');
});