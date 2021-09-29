<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\MedicalReportController;
use App\Http\Controllers\MealReportController;
use App\Http\Controllers\MedicineReportController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SettingsController;

Route::get('/', [AdminController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user/register', [AdminController::class, 'user_register']);
Route::post('/register', [AdminController::class, 'user_store'])->name('register');
Route::get('/user/view', [AdminController::class, 'user_view'])->name('user.view');

Route::get('/user/delete/{id}', [AdminController::class, 'user_delete']);
Route::get('/user/edit/{id}', [AdminController::class, 'user_edit']);
Route::post('/user/update/{id}', [AdminController::class, 'user_update']);

//Room Route
Route::get('/room/index', [RoomController::class, 'index'])->name('room.index');
Route::post('/room/create', [RoomController::class, 'create'])->name('room.create');
Route::get('/all/room', [RoomController::class, 'all'])->name('all.room');
Route::get('/room/delete/{id}', [RoomController::class, 'room_delete']);
Route::get('/room/edit/{id}', [RoomController::class, 'room_edit']);
Route::post('/room/update/{id}', [RoomController::class, 'room_update']);
Route::get('/room/view/{id}', [RoomController::class, 'room_view'])->name('room.view');

//Customer Route
Route::get('/patient/index', [PatientController::class, 'index'])->name('patient.index');
Route::post('/patient/create', [PatientController::class, 'create'])->name('patient.create');
Route::get('/all/patients', [PatientController::class, 'all'])->name('all.patients');
Route::get('/patient/delete/{id}', [PatientController::class, 'patient_delete']);
Route::get('/patient/edit/{id}', [PatientController::class, 'patient_edit']);
Route::post('/patient/update/{id}', [PatientController::class, 'patient_update']);

//Check In
Route::get('/checkin/index', [CheckinController::class, 'index'])->name('checkin.index');
Route::post('/checkin/create', [CheckinController::class, 'create'])->name('checkin.create');
Route::get('/all/checkin', [CheckinController::class, 'all'])->name('all.checkin');
Route::get('/checkin/delete/{id}', [CheckinController::class, 'checkin_delete']);


//Medicine
Route::get('/medicine/index', [MedicineController::class, 'index'])->name('medicine.index');
Route::post('/medicine/create', [MedicineController::class, 'create'])->name('medicine.create');
Route::get('/all/medicine', [MedicineController::class, 'all'])->name('all.medicine');
Route::get('/medicine/edit/{id}', [MedicineController::class, 'medicine_edit']);
Route::post('/medicine/update/{id}', [MedicineController::class, 'medicine_update']);
Route::get('/medicine/delete/{id}', [MedicineController::class, 'medicine_delete']);

//Medical Report
Route::post('/medicalreport/create', [MedicalReportController::class, 'create'])->name('medicalreport.create');
Route::get('/all/report', [MedicalReportController::class, 'all'])->name('all.report');
Route::get('/medicalreport/show/{patient_id}', [MedicalReportController::class, 'show']);


//Meal Report
Route::post('/meal/create', [MealReportController::class, 'create'])->name('meal.create');
Route::get('/all/meal', [MealReportController::class, 'all'])->name('all.meal');
Route::get('/meal/show/{patient_id}', [MealReportController::class, 'show']);


//Medicine Report
Route::get('/medicinereport/index/{patient_id}', [MedicineReportController::class, 'index']);
Route::post('/medicinereport/create', [MedicineReportController::class, 'create'])->name('medicinereport.create');
Route::get('/all/medicinereport', [MedicineReportController::class, 'all'])->name('all.medicinereport');

Route::get('/medicinereport/show/{patient_id}', [MedicineReportController::class, 'show']);


//Check out
Route::get('/checkout/index', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/create', [CheckoutController::class, 'create'])->name('checkout.create');
Route::get('/all/checkout', [CheckoutController::class, 'all'])->name('all.checkout');
Route::get('/show/checkout/{id}/{patient_id}', [CheckoutController::class, 'show']);
//Patient Check Out
Route::get('/patient/checkout/{patient_id}', [CheckoutController::class, 'checkoutindex']);

//Settings
Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
Route::post('/settings/create', [SettingsController::class, 'create'])->name('settings.create');
Route::get('/settings/all', [SettingsController::class, 'all'])->name('settings.all');
Route::get('/settings/delete/{id}', [SettingsController::class, 'settings_delete']);
Route::get('/settings/edit/{id}', [SettingsController::class, 'settings_edit']);
Route::post('/settings/update/{id}', [SettingsController::class, 'settings_update']);
