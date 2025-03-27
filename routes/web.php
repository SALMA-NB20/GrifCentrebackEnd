<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\FormatterController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;


// Authentication Routes
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin Routes with middleware
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    // Student Routes
    Route::controller(StudentController::class)->prefix('students')->group(function () {
        Route::get('/students', [StudentController::class, 'index'])->name('students.index');
        Route::get('/create', 'create')->name('student.create');
        Route::post('/', 'store')->name('students.store');
        Route::get('/search', 'search')->name('students.search');
        Route::put('/{student}', 'update')->name('students.update');
        Route::delete('/{student}', 'destroy')->name('students.destroy');
    });

    // Formateur Routes
    Route::controller(FormatterController::class)->prefix('formateurs')->group(function () {
        Route::get('/', 'index')->name('professors.index');
        Route::get('/create', 'create')->name('formateur.create');
        Route::post('/', 'store')->name('formateurs.store');
        Route::get('/{formatter}/edit', 'edit')->name('professors.edit');  // Add this line
        Route::put('/{formatter}', 'update')->name('professors.update');   // Add this line
        Route::delete('/{formatter}', 'destroy')->name('professors.destroy'); // Add this line
    });

    // Formation Routes
    Route::controller(FormationController::class)->prefix('formations')->group(function () {
        Route::get('/', 'index')->name('subjects.index');
        Route::get('/create', 'create')->name('formation.create');
        Route::post('/', 'store')->name('formation.store');
        Route::delete('/{formation}', 'destroy')->name('subjects.destroy');
    });

    // Classe Routes
    Route::controller(ClasseController::class)->prefix('classes')->group(function () {
        Route::get('/', 'index')->name('classes.index');
        Route::get('/create', 'create')->name('classe.create');
        Route::post('/', 'store')->name('classe.store');
        Route::get('/{classe}/edit', 'edit')->name('classe.edit');
        Route::put('/{classe}', 'update')->name('classe.update');
        Route::delete('/{classe}', 'destroy')->name('classe.delete');
    });

    // Schedule Routes
    Route::resource('schedules', ScheduleController::class)->except(['create', 'store']);

    // Payment Routes
    Route::put('/payments/{payment}', [PaymentController::class, 'update'])
        ->name('payments.update')
        ->missing(function () {
            return redirect()->route('dashboard')->with('error', 'Payment not found');
        });
});

// Error handling routes
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

