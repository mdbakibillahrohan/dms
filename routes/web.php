<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Teacher\TeacherController;
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
        Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'TeacherDashboard'])->name('dashboard');

        Route::middleware(['menu_permission'])->group(function () {
            Route::get('/add-teacher', [TeacherController::class, 'create'])->name('add');
            Route::post('/store-teacher', [TeacherController::class, 'store'])->name('store');
        });
    });
});

Route::name('student.')->group(function () {
    Route::prefix('student')->group(function () {
        Route::middleware(['menu_permission'])->group(function () {
            Route::get('add', [StudentController::class, 'showAddForm'])->name('add');
            Route::get('edit/{id}', [StudentController::class, 'showEditForm'])->name('edit');
            Route::post('add', [StudentController::class, 'add'])->name('add');
            Route::post('update/{id}', [StudentController::class, 'update'])->name('update');
            Route::get('/all', [StudentController::class, 'studentList'])->name('list');
            Route::get('/delete/{id}', [StudentController::class, 'destroy'])->name('delete');
            Route::get('/change-password/{id}', [StudentController::class, 'changePasswordForm'])->name('changepassword');
            Route::post('/change-password/{id}', [StudentController::class, 'changePassword'])->name('changepassword');
        });
    });
});
Route::name('session.')->group(function () {
    Route::prefix('session')->group(function () {
        Route::middleware(['menu_permission'])->group(function () {
            Route::get('add', [SessionController::class, 'showform'])->name('add');
            Route::get('list', [SessionController::class, 'show'])->name('list');
            Route::post('add', [SessionController::class, 'create'])->name('add');
        });
    });
});
