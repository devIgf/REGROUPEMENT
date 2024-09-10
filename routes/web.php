<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ClientDashboardController;

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

Route::get('/', function () {
    return view('auth.login');
});


Route::get('login', [AuthController::class, 'showLoginForm']);
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'showRegisterForm']);
Route::post('register', [AuthController::class, 'register'])->name('register');
// Route::get('Error', function (){
//     return view("juste");
// })->name('Error');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth', 'admin');
Route::get('admin/edit/{id}', [AdminDashboardController::class, 'edit'])->name('admin.edit')->middleware('auth', 'admin');
Route::post('/admin/users/{id}/update-button-permissions', [AdminDashboardController::class, 'updateButtonPermissions'])->name('admin.updateButtonPermissions');
Route::delete('admin/delete/{id}', [AdminDashboardController::class, 'destroy'])->name('admin.delete')->middleware('auth', 'admin');
Route::get('client/dashboard', [ClientDashboardController::class, 'index'])->name('client.dashboard')->middleware('auth',);
