<?php

use Illuminate\Support\Facades\Route;

Route::get('admin/home',   [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('adminhome');
Route::get('admin',        [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin',       [App\Http\Controllers\Admin\LoginController::class, 'login']);
Route::get('lang/{local}', [App\Http\Controllers\Admin\AdminController::class, 'lang'])->name('lang');

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
    Route::resource('admins',          App\Http\Controllers\Admin\AdminsController::class)->except(['show']);
    Route::resource('contactus',       App\Http\Controllers\Admin\ContactController::class)->except(['create', 'edit']);
    Route::resource('roles',           App\Http\Controllers\Admin\RoleController::class)->except(['show']);
    Route::resource('sections',        App\Http\Controllers\Admin\SectionController::class)->except(['show']);
    Route::resource('subsections',     App\Http\Controllers\Admin\SubSectionController::class)->except(['show']);
    Route::resource('consults',        App\Http\Controllers\Admin\SubSectionController::class)->except(['show']);
    Route::resource('rates',           App\Http\Controllers\Admin\RatesController::class)->except(['show']);
    Route::resource('ads',             App\Http\Controllers\Admin\AdsController::class)->except(['show']);
    Route::resource('branches',        App\Http\Controllers\Admin\BranchController::class)->except(['show']);
    Route::resource('consults',        App\Http\Controllers\Admin\ConsultController::class)->except(['show']);
    Route::resource('cons_details',    App\Http\Controllers\Admin\ConsultDetailController::class)->except(['show']);
    Route::resource('request_jobs',    App\Http\Controllers\Admin\JobController::class)->except(['create', 'edit','show']);
    Route::resource('request_service', App\Http\Controllers\Admin\ServiceController::class)->except(['create', 'edit','show']);
    Route::resource('categories',      \App\Http\Controllers\Admin\CategoryController::class)->except(['show']);

    Route::get('requestserviceactive', [App\Http\Controllers\Admin\ServiceController::class, 'RequestServiceStatus'])->name('requestserviceactive');
    Route::get('category-status',     [\App\Http\Controllers\Admin\CategoryController::class, 'categoryStatus'])->name('category.status');
    Route::get('adminactive',         [App\Http\Controllers\Admin\AdminsController::class, 'AdminStatus'])->name('adminactive');
    Route::get('rateactive',          [App\Http\Controllers\Admin\RatesController::class, 'RateStatus'])->name('rateactive');
    Route::get('adsactive',           [App\Http\Controllers\Admin\AdsController::class, 'adsStatus'])->name('adsactive');
    Route::get('subactive',           [App\Http\Controllers\Admin\SubSectionController::class, 'subActive'])->name('subactive');
    Route::get('subcheckBanner',      [App\Http\Controllers\Admin\SubSectionController::class, 'subcheckBanner'])->name('subcheckBanner');
    Route::get('images',              [App\Http\Controllers\Admin\SubSectionController::class, 'subImages'])->name('subimages');
    Route::get('job_details',         [App\Http\Controllers\Admin\JobController::class, 'jobDetail'])->name('jobdetails');
    Route::get('jopRequestactive',    [App\Http\Controllers\Admin\JobController::class, 'RequestJopStatus'])->name('jopRequestactive');
    Route::get('service_details',     [App\Http\Controllers\Admin\ServiceController::class, 'serviceDetail'])->name('servicedetails');
    Route::delete('delete_image/{id}',[App\Http\Controllers\Admin\SubSectionController::class, 'deleteImage'])->name('deleteimage');
    Route::get('sub_sections/{id}',   [App\Http\Controllers\Admin\SectionController::class, 'allSubSection'])->name('subsections');
    Route::get('setting',             [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('setting');
    Route::get('subscrips',           [App\Http\Controllers\Admin\SettingController::class, 'subscrips'])->name('subscrips');
    Route::post('setting',            [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('updatesetting');
    Route::get('contactusDetail',     [App\Http\Controllers\Admin\ContactController::class, 'contactusDetails'])->name('contactusdetails');
    Route::get('contactusactive',     [App\Http\Controllers\Admin\ContactController::class, 'contactusactive'])->name('contactusactive');
    Route::post('logout',             [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('admin.logout');
});
