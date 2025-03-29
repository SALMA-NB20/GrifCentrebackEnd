<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    // GET /api/course-files
    public function index(Request $request)
    {
        $user = $request->user();
        $files = File::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'data' => $files,
            'message' => 'Files retrieved successfully'
        ]);
    }
}