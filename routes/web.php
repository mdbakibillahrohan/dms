<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Admins all routes
Route::name('admin.')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::post('login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login');
        Route::get('login', [\App\Http\Controllers\Admin\AuthController::class, 'loginView'])->name('loginView');
        Route::get('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
        Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'AdminDashboard'])->middleware('admin_auth')->name('dashboard');
    });
});

Route::name('teacher.')->group(function () {
    Route::prefix('teacher')->group(function () {
        Route::get('login', [\App\Http\Controllers\Teacher\AuthController::class, 'LoginView'])->name('loginView');
        Route::post('login', [\App\Http\Controllers\Teacher\AuthController::class, 'Login'])->name('login');
        Route::get('logout', [\App\Http\Controllers\Teacher\AuthController::class, 'Logout'])->name('logout');
        Route::get('dashboard', function () {
            return view('teacher.pages.dashboard', ['dashboard_type' => 'teacher']);
        })->middleware('teacher_auth')->name('dashboard');
    });
});

Route::name('student.')->group(function () {
    Route::prefix('student')->group(function () {
        Route::middleware(['admin_auth'])->group(function () {
            Route::get('add', [\App\Http\Controllers\StudentController::class, 'showAddForm'])->name('add');
            Route::get('edit/{id}', [\App\Http\Controllers\StudentController::class, 'showEditForm'])->name('edit');
            Route::post('add', [\App\Http\Controllers\StudentController::class, 'add'])->name('add');
            Route::post('update/{id}', [\App\Http\Controllers\StudentController::class, 'update'])->name('update');
        });
        Route::get('/all', [\App\Http\Controllers\StudentController::class, 'studentList'])->name('list');
        Route::get('/delete/{id}', [\App\Http\Controllers\StudentController::class, 'destroy'])->name('delete');
    });
});
