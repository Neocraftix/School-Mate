<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RegistrationController::class, 'index'])->name('school-registorIndex');

Route::get('/get-zones/{province_id}', [LocationController::class, 'getZones']);
Route::get('/get-divisions/{zone_id}', [LocationController::class, 'getDivisions']);

Route::post('/school-registor-post', [RegistrationController::class, 'schoolRegistar'])->name('school.create');
Route::get('/school-login', [AuthController::class, 'schoolLoginIndex'])->name('school.loginIndex');

Route::post('/school-login-post', [AuthController::class, 'schoolLoginPost'])->name('school.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/school-dashboard', [DashBoardController::class, 'schoolDashBoardIndex'])->name('school.dashboard')->middleware(['role:Supper Admin,Admin,Data Entry']);
