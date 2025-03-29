<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create()
    {
        $classes = Classe::all();
        return view('students.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'phone' => 'required|string',
            'cin' => 'required|string|unique:students',
            'date_inscription' => 'required|date',
            'email' => 'required|email|unique:students',
            'password' => 'required|min:6',
            'classe_id' => 'required|exists:classes,id'
        ]);
    
        $validated['password'] = bcrypt($validated['password']);
    
        Student::create($validated);
    
        return redirect()->route('students.index')
            ->with('success', 'Étudiant ajouté avec succès');
    }

    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }
}
