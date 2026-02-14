<?php

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\FurnitureController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

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
Route::post('/furniture/update', [FurnitureController::class, 'updateFurniture'])->name('furniture.update')->middleware(['role:Supper Admin,Admin,Data Entry']);
Route::delete('/furniture/delete/{furnitureId}', [FurnitureController::class, 'deleteFurniture'])->name('furniture.delete')->middleware(['role:Supper Admin,Admin,Data Entry']);
Route::get('/furniture/pdf', [FurnitureController::class, 'exportPdf'])->name('furniture.pdf')->middleware(['role:Supper Admin,Admin,Data Entry']);


Route::get('/inventories', [InventoryController::class, 'index'])->name('inventories.index')->middleware(['role:Supper Admin,Admin,Data Entry']);
Route::post('/inventories/store', [InventoryController::class, 'store'])->name('inventories.store')->middleware(['role:Supper Admin,Admin,Data Entry']);
Route::post('/inventories/update', [InventoryController::class, 'update'])->name('inventories.update')->middleware(['role:Supper Admin,Admin,Data Entry']);
Route::delete('/inventories/{id}', [InventoryController::class, 'destroy'])->name('inventories.destroy')->middleware(['role:Supper Admin,Admin,Data Entry']);
Route::get('/inventories/pdf', [InventoryController::class, 'exportPdf'])->name('inventories.pdf')->middleware(['role:Supper Admin,Admin,Data Entry']);


Route::get('/students', [StudentController::class, 'index'])->name('students.index')->middleware(['role:Supper Admin,Admin,Data Entry']);
Route::post('/students/store', [StudentController::class, 'store'])->name('students.store')->middleware(['role:Supper Admin,Admin,Data Entry']);
Route::get('/students/student/details/{studentId}', [StudentController::class, 'studentDetails'])->name('students.studendDetails')->middleware(['role:Supper Admin,Admin,Data Entry']);
Route::get('/students/genarate-report/index', [StudentController::class, 'studentGanarateReportIndex'])->name('students.studentGanarateReportIndex')->middleware(['role:Supper Admin,Admin,Data Entry']);
Route::post('/students/genarate-report/filter', [StudentController::class, 'studentGanarateReportFilter'])->name('students.studentGanarateReportFilter')->middleware(['role:Supper Admin,Admin,Data Entry']);
Route::get('/students/update/index/{studentId}', [StudentController::class, 'studentUpdateIndex'])->name('students.studentUpdateIndex')->middleware(['role:Supper Admin,Admin,Data Entry']);
Route::post('/students/update/{studentId}', [StudentController::class, 'studentUpdate'])->name('students.studentUpdate')->middleware(['role:Supper Admin,Admin,Data Entry']);
Route::delete('/students/delete/{studentId}', [StudentController::class, 'studentDelete'])->name('students.studentDelete')->middleware(['role:Supper Admin,Admin,Data Entry']);
Route::get('/students/student/report/pdf/{studentId}', [StudentController::class, 'studentReportPdf'])->name('students.studentReportPdf')->middleware(['role:Supper Admin,Admin,Data Entry']);

Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index')->middleware(['role:Supper Admin,Admin,Data Entry']);
Route::post('/teachers/store', [TeacherController::class, 'store'])->name('teachers.store')->middleware(['role:Supper Admin,Admin,Data Entry']);
Route::get('/teachers/teacher/deatails/{teacherID}', [TeacherController::class, 'teacherDetails'])->name('teachers.teacherDetails')->middleware(['role:Supper Admin,Admin,Data Entry']);
Route::get('/teachers/teacher/update/index/{teacherID}', [TeacherController::class, 'teacherUpdateIndex'])->name('teachers.teacherUpdateIndex')->middleware(['role:Supper Admin,Admin,Data Entry']);
Route::post('/teachers/teacher/update/{teacherID}', [TeacherController::class, 'updateTeacher'])->name('teachers.UpdateTeacher')->middleware(['role:Supper Admin,Admin,Data Entry']);
Route::delete('/teachers/delete/{teacherID}', [TeacherController::class, 'teacherDelete'])->name('teachers.teacherDelete')->middleware(['role:Supper Admin,Admin,Data Entry']);
Route::get('/teachers/genarate-report/index', [TeacherController::class, 'teacherGenarateReportIndex'])->name('teachers.teacherGenarateReportIndex')->middleware(['role:Supper Admin,Admin,Data Entry']);
Route::post('/teachers/genarate-report/filter', [TeacherController::class, 'teacherGanarateReportFilter'])->name('teachers.teacherGanarateReportFilter')->middleware(['role:Supper Admin,Admin,Data Entry']);
Route::post('/teachers/find-retirement', [TeacherController::class, 'teacherRetirement'])->name('teachers.retirement')->middleware(['role:Supper Admin,Admin,Data Entry']);
Route::get('/teachers/teacher/report/pdf/{teacherID}', [TeacherController::class, 'teacherReportPdf'])->name('teachers.teacherReportPdf')->middleware(['role:Supper Admin,Admin,Data Entry']);

Route::get('/settings/admin-management', [SettingsController::class, 'adminManagementIndex'])->name('settings.adminManagementIndex')->middleware(['role:Supper Admin']);
Route::post('/admin/create', [AuthController::class, 'createAdmin'])->name('admin.createAdmin')->middleware(['role:Supper Admin']);
Route::delete('/admin/delete/{adminID}', [AuthController::class, 'adminDelete'])->name('admin.adminDelete')->middleware(['role:Supper Admin']);

Route::get('/settings/school-information', [SettingsController::class, 'schoolInformationIndex'])->name('settings.schoolInformationIndex')->middleware(['role:Supper Admin,Admin']);
Route::post('/settings/school-information/update', [SettingsController::class, 'schoolInformationUpdate'])->name('settings.schoolInformationUpdate')->middleware(['role:Supper Admin']);
Route::get('/settings/school-information/pdf', [SettingsController::class, 'schoolInformationPdf'])->name('settings.schoolInformationPdf')->middleware(['role:Supper Admin,Admin']);
