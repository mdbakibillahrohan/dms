<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuPermissionController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\Student\SubjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Teacher\TeacherController;
use Illuminate\Support\Facades\Hash;
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
            Route::get('/all', [TeacherController::class, 'index'])->name('all');
            Route::get('/add', [TeacherController::class, 'create'])->name('add');
            Route::get('/edit/{id}', [TeacherController::class, 'edit'])->name('edit');
            Route::get('/delete/{id}', [TeacherController::class, 'destroy'])->name('delete');
            Route::get('/change-password/{id}', [TeacherController::class, 'changePasswordForm'])->name('changepassword');
            Route::post('/change-password/{id}', [TeacherController::class, 'changePassword'])->name('changepassword');
            Route::post('/store', [TeacherController::class, 'store'])->name('store');
            Route::post('/update/{id}', [TeacherController::class, 'update'])->name('update');
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
            Route::get('add', [SessionController::class, 'create'])->name('add');
            Route::get('list', [SessionController::class, 'index'])->name('list');
            Route::get('delete/{id}', [SessionController::class, 'destroy'])->name('delete');
            Route::post('add', [SessionController::class, 'store'])->name('add');
        });
    });
});

Route::name('subject.')->group(function () {
    Route::prefix('subject')->group(function () {
        Route::middleware(['menu_permission'])->group(function () {
            Route::get('/all', [SubjectController::class, 'index'])->name('all');
            Route::get('/create', [SubjectController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [SubjectController::class, 'edit'])->name('edit');
            Route::get('/delete/{id}', [SubjectController::class, 'destroy'])->name('delete');
            Route::post('/store', [SubjectController::class, 'store'])->name('store');
            Route::post('/update/{id}', [SubjectController::class, 'update'])->name('update');
        });
    });
});

Route::name('menu_permission.')->group(function () {
    Route::prefix('menu-permission')->group(function () {
        Route::middleware('menu_permission')->group(function () {
            Route::get('/all', [MenuPermissionController::class, 'index'])->name('all');
        });
    });
});
