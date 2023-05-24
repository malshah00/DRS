<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ManagementAuthController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\EditComplaintController;
use App\Http\Controllers\EditUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;

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
    return view('welcome');
});

Route::get('/loginstudent', function () {
    return view('loginstudent');
});

Route::get('/loginmanagement', function () {
    return view('loginmanagement');
});

Route::post('/dashboard', function () {
    return view('dashboard');
});

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [StudentController::class, 'register'])->name('doRegister');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/mainstudent', function () {
    return view('mainstudent');
})->name('mainstudent');

Route::get('/dashboard', [ComplaintController::class, 'viewAll'])->name('dashboard');

Route::get('/add-complaint', [ComplaintController::class, 'create'])->name('complaint.create');
Route::post('/add-complaint', [ComplaintController::class, 'store'])->name('complaint.store');

Route::get('/edit-complaint/{id}', [EditComplaintController::class, 'edit'])->name('complaint.edit');
Route::put('/edit-complaint/{id}', [EditComplaintController::class, 'update'])->name('complaint.update');

Route::get('/edit-user/{id}', [EditUserController::class, 'edit'])->name('user.edit');
Route::put('/edit-user/{id}', [EditUserController::class, 'update'])->name('user.update');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'doLogin'])->name('doLogin');

Route::get('/profile', [StudentController::class, 'showProfile']);

Route::post('/staff', [StaffController::class, 'store'])->name('staff.store');
Route::get('/staff', [StaffController::class, 'show'])->name('dashboard');

// Route::get('/viewstaff', function () {
//     return view('viewstaff');
// });

