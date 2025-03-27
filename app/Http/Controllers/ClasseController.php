<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    public function create()
    {
        return view('admin.classes.create');
    }

    public function index()
    {
        $classes = Classe::all();
        return view('admin.classes.index', compact('classes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        Classe::create([
            'name' => $validated['nom'],
        ]);

        return redirect()->route('classes.index')->with('success', 'Classe added successfully');
    }

    public function edit(Classe $classe)
    {
        return view('admin.classes.edit', compact('classe'));
    }

    public function update(Request $request, Classe $classe)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        $classe->update([
            'name' => $validated['nom'],
        ]);

        return redirect()->route('classes.index')->with('success', 'Classe updated successfully');
    }
}
