<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FaqsController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\SubServiceController;
use App\Http\Controllers\Admin\PrivecyController;
use App\Http\Controllers\Admin\RelationsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TermsController;
use App\Http\Controllers\Admin\UsageController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;


        Route::get('admin/home',   [AdminController::class, 'index'])->name('adminhome');
        Route::get('admin',        [LoginController::class, 'showLoginForm'])->name('admin.login');
        Route::post('admin',       [LoginController::class, 'login']);
        Route::get('lang/{local}', [AdminController::class, 'lang'])->name('lang');

    Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () {

        Route::resource('roles',       RoleController::class)->except(['show']);
        Route::resource('aboutus',     AboutController::class)->except(['show']);
        Route::resource('contactus',   ContactController::class)->except(['create', 'edit']);
        Route::resource('terms',       TermsController::class)->except(['show']);
        Route::resource('usages',      UsageController::class)->except(['show']);
        Route::resource('privecy',     PrivecyController::class)->except(['show']);
        Route::resource('faqs',        FaqsController::class)->except(['show']);
        Route::resource('users',       UsersController::class)->except(['show']);
        Route::resource('admins',      AdminsController::class)->except(['show']);
        Route::resource('cities',      CityController::class)->except(['show']);
        Route::resource('services',    ServiceController::class)->except(['show']);

        Route::get('/get-subservice-data/{subservice}', [SubServiceController::class, 'getSubserviceData']);
        Route::put('/subservice/{subservice}', [SubserviceController::class, 'update']);
        Route::get('orders/{id}',      [UsersController::class, 'sellerOrders'])->name('orderseller');
        Route::get('setting',          [SettingController::class, 'index'])->name('setting');
        Route::post('setting',         [SettingController::class, 'update'])->name('updatesetting');
        Route::get('useractive',       [UsersController::class, 'UserStatus'])->name('useractive');
        Route::get('adminactive',      [AdminsController::class, 'AdminStatus'])->name('adminactive');
        Route::get('contactusDetail',  [ContactController::class, 'contactusDetails'])->name('contactusdetails');
        Route::post('logout',          [LoginController::class, 'logout'])->name('admin.logout');
        
    });