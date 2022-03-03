<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

Route::get('/clear-all', function () {
	Artisan::call('cache:clear');
	Artisan::call('view:clear');
	Artisan::call('clear-compiled');
	Artisan::call('config:cache');
	Artisan::call('config:clear');
	return "All is cleared";
});

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/admin')->namespace('Admin')->group(function(){

    Route::group(['middleware' => ['is_admin']], function () {
        Route::get('dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin.dashboard');
        
        //profile
        Route::get('/profile', [App\Http\Controllers\Admin\AdminController::class, 'profile'])->name('admin.profile');
        Route::match(['get','post'],'/profile/edit', [App\Http\Controllers\Admin\AdminController::class, 'profileEdit'])->name('admin.profile.edit');
        Route::get('/delete-profile-image/{id}', [App\Http\Controllers\Admin\AdminController::class, 'deleteProfileImage'])->name('admin.deleteProfileImage');
        Route::get('/change-password', [App\Http\Controllers\Admin\AdminController::class, 'changePassword'])->name('admin.changepassword');
        Route::post('/check-pwd', [App\Http\Controllers\Admin\AdminController::class, 'chkPassword'])->name('admin.check.password');
        Route::post('/update-pwd', [App\Http\Controllers\Admin\AdminController::class, 'updatePassword'])->name('admin.update.password');
    });    

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
