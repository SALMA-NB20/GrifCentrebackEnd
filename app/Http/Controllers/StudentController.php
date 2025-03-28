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
            'date_inscription' => 'required|date',
            'cin' => 'required|string|unique:students',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:students',
            'phone' => 'required|string',
            'classe_id' => 'required|exists:classes,id',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
    
        $imagePath = $request->file('image')->store('students', 'public');
        
        Student::create([
            'date_inscription' => $validated['date_inscription'],
            'cin' => $validated['cin'],
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'classe_id' => $validated['classe_id'],
            'image' => $imagePath
        ]);
    
        return redirect()->route('students.index')
            ->with('success', 'Student added successfully');
    }

    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }
}
