<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\NoticeController;

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



Auth::routes();



Route::group(['middleware'=>['auth','has.permission']],function(){
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/departments',DepartmentController::class);
    Route::resource('/roles',RoleController::class);
    Route::resource('/users',UserController::class);
    Route::resource('/permissions',PermissionController::class);
    Route::resource('/leaves',LeaveController::class);
    Route::resource('/notices',NoticeController::class);
    Route::post('accept-reject-leaves/{id}', [App\Http\Controllers\LeaveController::class, 'acceptReject'])->name('accept.reject');
   /*
    Route::get('/mails', [App\Http\Controllers\MailController::class, 'create']); 
   Route::post('/mails', [App\Http\Controllers\MailController::class, 'create']);
   */
});
