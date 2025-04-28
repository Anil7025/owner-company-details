<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ClientsController;  
use App\Http\Controllers\OwnerCompanyController;

// Route::get('/', function () {
//     return view('clients');
// });
Route::get('/', [ClientsController::class, 'getClientsPage'])->name('frontend.getClientsPage');
Route::get('/company/onwer-company-details/{id}', [ClientsController::class, 'ownerCompanyDetail'])->name('forntend.ownerCompanyDetail');
Route::get('/company/owner-company-info', [OwnerCompanyController::class, 'ownerCompanyInfo'])->name('frontend.ownerCompanyInfo');
Route::post('/inquery-form-submit', [OwnerCompanyController::class, 'ownerFormStore'])->name('forntend.ownerformstore');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::match(['get', 'post'], '/admin/client', [ClientController::class, 'getClientsPageLoad'])->name('admin.client');

    //Route::get('/admin/client', [ClientController::class, 'getClientsPageLoad'])->name('admin.client');
    Route::get('/admin/getClientsTableData', [ClientController::class, 'getClientsTableData'])->name('admin.getClientsTableData');
    Route::post('/admin/saveClientsData', [ClientController::class, 'saveClientsData'])->name('admin.saveClientsData');
    Route::post('/admin/getClientsById', [ClientController::class, 'getClientsById'])->name('admin.getClientsById');
    Route::post('/admin/deleteClients', [ClientController::class, 'deleteClients'])->name('admin.deleteClients');
    
});

require __DIR__.'/auth.php';
