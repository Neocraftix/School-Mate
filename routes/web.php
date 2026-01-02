<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/',[RegistrationController::class, 'index']);

Route::get('/get-zones/{province_id}', [LocationController::class, 'getZones']);
Route::get('/get-divisions/{zone_id}', [LocationController::class, 'getDivisions']);

Route::post('/school-registor',[RegistrationController::class,'schoolRegistar'])->name('school.create');