<?php

use App\Http\Controllers\Ajax\ClassDataController;
use App\Http\Controllers\Ajax\MenuDataController;
use App\Http\Controllers\Ajax\TeacherDataController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuPermissionController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\Student\SubjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Universal\ClassRoomController;
use App\Http\Controllers\Universal\ClassTimeController;
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
        });
        Route::post('/store', [TeacherController::class, 'store'])->name('store');
        Route::post('/update/{id}', [TeacherController::class, 'update'])->name('update');
        Route::post('/change-password/{id}', [TeacherController::class, 'changePassword'])->name('changepassword');
    });
});

Route::name('student.')->group(function () {
    Route::prefix('student')->group(function () {
        Route::middleware(['menu_permission'])->group(function () {
            Route::get('add', [StudentController::class, 'showAddForm'])->name('add');
            Route::get('edit/{id}', [StudentController::class, 'showEditForm'])->name('edit');
            Route::get('/all', [StudentController::class, 'studentList'])->name('list');
            Route::get('/delete/{id}', [StudentController::class, 'destroy'])->name('delete');
            Route::get('/change-password/{id}', [StudentController::class, 'changePasswordForm'])->name('changepassword');
        });
        Route::post('add', [StudentController::class, 'add'])->name('add');
        Route::post('update/{id}', [StudentController::class, 'update'])->name('update');
        Route::post('/change-password/{id}', [StudentController::class, 'changePassword'])->name('changepassword');
    });
});

Route::name('session.')->group(function () {
    Route::prefix('session')->group(function () {
        Route::middleware(['menu_permission'])->group(function () {
            Route::get('add', [SessionController::class, 'create'])->name('add');
            Route::get('list', [SessionController::class, 'index'])->name('list');
            Route::get('delete/{id}', [SessionController::class, 'destroy'])->name('delete');
        });
        Route::post('add', [SessionController::class, 'store'])->name('add');
    });
});

Route::name('subject.')->group(function () {
    Route::prefix('subject')->group(function () {
        Route::middleware(['menu_permission'])->group(function () {
            Route::get('/all', [SubjectController::class, 'index'])->name('all');
            Route::get('/create', [SubjectController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [SubjectController::class, 'edit'])->name('edit');
            Route::get('/delete/{id}', [SubjectController::class, 'destroy'])->name('delete');
        });
        Route::post('/store', [SubjectController::class, 'store'])->name('store');
        Route::post('/update/{id}', [SubjectController::class, 'update'])->name('update');
    });
});

Route::name('menu_permission.')->group(function () {
    Route::prefix('menu')->group(function () {
        Route::middleware('menu_permission')->group(function () {
            Route::get('/all', [MenuPermissionController::class, 'index'])->name('all');
        });
    });
});

// here started the result routes
Route::name('result.')->group(function () {
    Route::prefix('result')->group(function () {
        Route::middleware('menu_permission')->group(function () {
            Route::get('/', [MenuPermissionController::class, 'index'])->name('all');
        });
    });
});


// here started the class Routes
Route::name('class.')->group(function () {
    Route::prefix('class')->group(function () {
        Route::name('room.')->group(function () {
            Route::prefix('room')->group(function () {
                Route::middleware('menu_permission')->group(function () {
                    Route::get('/all', [ClassRoomController::class, 'index'])->name('all');
                    Route::get('/add', [ClassRoomController::class, 'create'])->name('add');
                    Route::get('/delete/{id}', [ClassRoomController::class, 'destroy'])->name('delete');
                });
                Route::post('/store', [ClassRoomController::class, 'store'])->name('store');
                Route::post('/update/{id}', [ClassRoomController::class, 'update'])->name('update');
            });
        });

        Route::name('time.')->group(function () {
            Route::prefix('time')->group(function () {
                Route::middleware('menu_permission')->group(function () {
                    Route::get('/', [ClassTimeController::class, 'index']);
                });
            });
        });
    });
});


// Here started the all ajax route


Route::prefix('teacher')->group(function () {
    Route::get('/{id}', [TeacherDataController::class, 'show']);
});

Route::prefix('menu')->group(function () {
    // this route take teacher id and it returns the all perimissions of a teacher of submenus
    Route::get('/permission/{id}', [MenuDataController::class, 'allPermissions']);
    Route::post('/permission/add', [MenuDataController::class, 'store']);
    Route::post('/permission/delete', [MenuDataController::class, 'destroy']);
});


// class data routes
Route::prefix('class')->group(function () {
    Route::prefix('time')->group(function () {
        Route::get('routine-details', [ClassDataController::class, "routineDetails"]);
    });
});
