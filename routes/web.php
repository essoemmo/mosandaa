<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('command', function () {
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
});

Route::get('/foo', function () {
    Artisan::call('storage:link');
});

//sitemap
Route::get('/sitemap.xml',             [App\Http\Controllers\SitemapController::class, 'index']);
Route::get('/sitemap.xml/aboutus',     [App\Http\Controllers\SitemapController::class, 'aboutus']);
Route::get('/sitemap.xml/services',    [App\Http\Controllers\SitemapController::class, 'services']);
Route::get('/sitemap.xml/clients',     [App\Http\Controllers\SitemapController::class, 'clients']);
Route::get('/sitemap.xml/consultants', [App\Http\Controllers\SitemapController::class, 'consultants']);
Route::get('/sitemap.xml/news',        [App\Http\Controllers\SitemapController::class, 'news']);
Route::get('/sitemap.xml/respons',     [App\Http\Controllers\SitemapController::class, 'respons']);

Auth::routes();

Route::get('/',                [App\Http\Controllers\HomeController::class, 'index'])->name('/');
Route::get('langhome/{local}', [App\Http\Controllers\HomeController::class, 'langHome'])->name('langhome');
Route::post('store-rate',      [App\Http\Controllers\HomeController::class, 'storeRate'])->name('storerate');
Route::post('store-mail',      [App\Http\Controllers\HomeController::class, 'storeMail'])->name('storemail');
Route::post('store-service',   [App\Http\Controllers\HomeController::class, 'serviceStore'])->name('servicestore');
Route::post('store-job',       [App\Http\Controllers\HomeController::class, 'jobStore'])->name('jobstore');
Route::post('contactsus-store',[App\Http\Controllers\HomeController::class, 'contactsUsStore'])->name('contactsusstore');
Route::get('aboutus',          [App\Http\Controllers\HomeController::class, 'aboutUs'])->name('aboutus');
Route::get('services',         [App\Http\Controllers\HomeController::class, 'services'])->name('services');
Route::get('service/{id}',     [App\Http\Controllers\HomeController::class, 'serviceSingle'])->name('servicesingle');
Route::get('service-request',  [App\Http\Controllers\HomeController::class, 'serviceRequest'])->name('servicereq');
Route::get('consultants',      [App\Http\Controllers\HomeController::class, 'consultants'])->name('consultants');
Route::get('consultant/{id}',  [App\Http\Controllers\HomeController::class, 'consultantDetails'])->name('consultantdetails');
Route::get('clients',          [App\Http\Controllers\HomeController::class, 'clients'])->name('clients');
Route::get('news',             [App\Http\Controllers\HomeController::class, 'news'])->name('news');
Route::get('news/{id}',        [App\Http\Controllers\HomeController::class, 'newsDetails'])->name('newsdetails');
Route::get('slider/{id}',      [App\Http\Controllers\HomeController::class, 'sliderDetails'])->name('sliderDetails');
Route::get('respons',          [App\Http\Controllers\HomeController::class, 'respons'])->name('respons');
Route::get('respons/{id}',     [App\Http\Controllers\HomeController::class, 'responsDetails'])->name('responsdetails');
Route::get('respons/category/{id}', [App\Http\Controllers\HomeController::class, 'responsFilter'])->name('responsFilter');
Route::get('request-jobs',     [App\Http\Controllers\HomeController::class, 'requestJobs'])->name('requestjobs');
Route::get('requestservices',  [App\Http\Controllers\HomeController::class, 'requestServices'])->name('requestservice');
Route::get('contactsus',       [App\Http\Controllers\HomeController::class, 'contactsUs'])->name('contactsus');
Route::get('rates',            [App\Http\Controllers\HomeController::class, 'rates'])->name('rates');
Route::get('not-work',       [App\Http\Controllers\HomeController::class, 'notWork'])->name('not.work');

