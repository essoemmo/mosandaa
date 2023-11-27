<?php

use App\Http\Controllers\API\AccountController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\AuthDropdownController;
use App\Http\Controllers\API\SettingController;
use App\Http\Controllers\API\HomeKidController;
use App\Http\Controllers\API\HomeSellerController;
use App\Http\Controllers\API\NotificationController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\OrganizationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// authentication
Route::post('register', [AuthController::class, 'register']); //register
Route::post('verify', [AuthController::class, 'verify']); //verify
Route::post('reset', [AuthController::class, 'resetCode']); //reset_code
Route::post('resend', [AuthController::class, 'resendCode']); //resend_code
Route::post('reset-password', [AuthController::class, 'resetPassword']); //reset password
Route::post('login', [AuthController::class, 'Login']); //login
Route::get('settings',         [SettingController::class,'index']); //relations

// list of drops
Route::get('cities', [SettingController::class, 'cities']); //cities
Route::get('areas/{id}', [SettingController::class, 'areas']); //states
Route::get('states/{id}', [SettingController::class, 'states']); //states


Route::middleware(['auth:sanctum' , 'bindings'])->group( function () {

    // user setting

    Route::get('logout', [AuthController::class, 'logout']); // logout
    Route::post('user-update', [AuthController::class, 'update']); //update user
    Route::get('user-profile', [AuthController::class, 'profile']); // user
    Route::get('user-delete', [AuthController::class, 'delete']); //delete user

    
    
    Route::get('notifications',         [NotificationController::class,'userNotifications']);
    Route::post('delete-notification',  [NotificationController::class,'DeleteNotification']);
});
