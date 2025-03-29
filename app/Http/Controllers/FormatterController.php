<?php

namespace App\Http\Controllers;

use App\Models\Formatter;
use App\Models\Matiere;
use App\Models\Classe;
use Illuminate\Http\Request;

class FormatterController extends Controller
{
    public function index()
    {
        $formatters = Formatter::all();
        return view('formateurs.index', compact('formatters'));
    }

    public function create()
    {
        $matieres = Matiere::all();
        $classes = Classe::all();
        return view('formateurs.create', compact('matieres', 'classes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'phone' => 'required|string',
            'cin' => 'required|string|unique:formatters',
            'email' => 'required|email|unique:formatters',
            'password' => 'required|min:6',
            'classe_id' => 'required|exists:classes,id'
        ]);

        $validated['password'] = bcrypt($validated['password']);
        
        Formatter::create($validated);

        return redirect()->route('formateurs.index')
            ->with('success', 'Formateur ajouté avec succès');
    }
}
