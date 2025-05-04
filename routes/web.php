<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BedController;
use App\Http\Controllers\NfsController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BloodChemistryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Controller::class, 'welcome'])->name('welcome');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');
    Route::resource('nfs', NfsController::class);
    Route::resource('patients', PatientController::class);
    Route::resource('doctors', DoctorController::class);
    Route::resource('blood_chemistries', BloodChemistryController::class);
    Route::resource('beds', BedController::class);

    Route::post('/nfs/add', [NfsController::class, 'add'])->name('nfs.add');
    Route::get('/nfs/{id}/pdf', [PdfController::class, 'nfs'])->name('nfs.pdf');

    Route::post('/blood_chemistries/add', [BloodChemistryController::class, 'add'])->name('blood_chemistries.add');
    Route::get('/blood_chemistries/{id}/pdf', [PdfController::class, 'blood_chemistries'])->name('blood_chemistries.pdf');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); 


require __DIR__.'/auth.php';
