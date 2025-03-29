<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ProfessorClassController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\NotificationController;




Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $token = $user->createToken('api-token')->plainTextToken;
        return response()->json(['token' => $token]);
    }

    return response()->json(['error' => 'Unauthorized'], 401);
});

// Protected routes (Authentication required)
Route::middleware('auth:sanctum')->group(function () {
    // Student routes
    Route::get('/absences', [AbsenceController::class, 'index']);
    Route::get('/formations', [FormationController::class, 'index']);
    Route::get('/student/schedule', [ScheduleController::class, 'studentSchedule']);
    
    // Professor routes
    Route::get('/professor/classes', [ProfessorClassController::class, 'index']);
    Route::get('/professor/schedule', [ScheduleController::class, 'professorSchedule']);
    Route::get('/classes/{classId}/students', [ClassController::class, 'students']);
    Route::post('/attendance', [AttendanceController::class, 'store']);
    
    // Common routes
    Route::get('/subjects', [SubjectController::class, 'index']);
    Route::get('/course-files', [FileController::class, 'index']);
    Route::get('/notifications', [NotificationController::class, 'index']);
});

