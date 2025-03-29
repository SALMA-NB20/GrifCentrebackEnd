<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;

class ProfessorClassController extends Controller
{
    // GET /api/professor/classes
    public function index(Request $request)
    {
        $user = $request->user();
        $classes = ClassModel::where('professor_id', $user->id)
            ->with(['subjects'])
            ->get();

        return response()->json([
            'data' => $classes,
            'message' => 'Professor classes retrieved successfully'
        ]);
    }
}