<?php

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\FurnitureController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Route as RoutingRoute;

Route::get('/', [RegistrationController::class, 'index'])->name('school-registorIndex');

Route::get('/get-zones/{province_id}', [LocationController::class, 'getZones']);
Route::get('/get-divisions/{zone_id}', [LocationController::class, 'getDivisions']);

Route::post('/school-registor-post', [RegistrationController::class, 'schoolRegistar'])->name('school.create');
Route::get('/school-login', [AuthController::class, 'schoolLoginIndex'])->name('school.loginIndex');

Route::post('/school-login-post', [AuthController::class, 'schoolLoginPost'])->name('school.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/school-dashboard', [DashBoardController::class, 'schoolDashBoardIndex'])->name('school.dashboard')->middleware(['role:Supper Admin,Admin,Data Entry']);

Route::get('/admin-profile', [AdminProfileController::class, 'schoolAdminProfileIndex'])->name('school.adminProfile')->middleware(['role:Supper Admin,Admin,Data Entry']);
Route::put('admin/profile/update', [AdminProfileController::class, 'schoolAdminProfileUpdate'])->name('school.adminProfileUpdate')->middleware(['role:Supper Admin,Admin,Data Entry']);

Route::get('/furniture/index', [FurnitureController::class, 'index'])->name('furniture.index')->middleware(['role:Supper Admin,Admin,Data Entry']);
Route::get('/get-sub-categories/{mainCategoryId}', [FurnitureController::class, 'getSubCategories'])->name('get.sub.categories')->middleware(['role:Supper Admin,Admin,Data Entry']);
Route::post('/furniture/store', [FurnitureController::class, 'storeFurniture'])->name('furniture.store')->middleware(['role:Supper Admin,Admin,Data Entry']);
