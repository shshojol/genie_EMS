<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', [EmployeeController::class, 'show_user'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/employee/report', [EmployeeController::class, 'report'])->middleware(['auth']);
Route::get('/employee/add', [EmployeeController::class, 'index'])->middleware(['auth']);
Route::post('/employee/add', [EmployeeController::class, 'store'])->middleware(['auth']);
Route::post('/getdata', [EmployeeController::class, 'getdata'])->middleware(['auth']);

Route::post('/employee/checkin', [ReportController::class, 'checkin'])->middleware(['auth']);
Route::post('/employee/checkout', [ReportController::class, 'checkout'])->middleware(['auth']);
