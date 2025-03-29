<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // POST /api/attendance
    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_id' => 'required|exists:classes,id',
            'date' => 'required|date',
            'absent_students' => 'required|array',
            'absent_students.*' => 'exists:students,id'
        ]);

        $attendance = Attendance::create([
            'professor_id' => $request->user()->id,
            'class_id' => $validated['class_id'],
            'date' => $validated['date'],
            'absent_students' => json_encode($validated['absent_students'])
        ]);

        return response()->json([
            'data' => $attendance,
            'message' => 'Attendance recorded successfully'
        ], 201);
    }
}