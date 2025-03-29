<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    public function index(Request $request)
    {
        $absences = Absence::orderBy('date', 'desc')->get();
        
        return response()->json($absences);
    }
}