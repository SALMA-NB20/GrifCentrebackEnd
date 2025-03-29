<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    // GET /api/subjects
    public function index(Request $request)
    {
        $user = $request->user();
        $subjects = Subject::when($user->isProfessor(), function($query) use ($user) {
                return $query->where('professor_id', $user->id);
            })
            ->with(['class'])
            ->get();

        return response()->json([
            'data' => $subjects,
            'message' => 'Subjects retrieved successfully'
        ]);
    }
}