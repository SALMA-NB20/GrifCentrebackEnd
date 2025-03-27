<?php

namespace App\Http\Controllers;

use App\Models\Formatter;
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
        return view('formateurs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cin' => 'required|unique:formatters',
            'nom' => 'required',
            'prenom' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:formatters',
            'password' => 'required|min:6',
            'address' => 'nullable',
            'speciality' => 'nullable'
        ]);

        Formatter::create($validated);
        return redirect()->route('professors.index')->with('success', 'Formateur added successfully');
    }

    public function edit(Formatter $formatter)
    {
        return view('formateurs.edit', compact('formatter'));
    }

    public function update(Request $request, Formatter $formatter)
    {
        $validated = $request->validate([
            'cin' => 'required|unique:formatters,cin,' . $formatter->id,
            'nom' => 'required',
            'prenom' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:formatters,email,' . $formatter->id,
            'address' => 'nullable',
            'speciality' => 'nullable'
        ]);

        $formatter->update($validated);
        return redirect()->route('professors.index')->with('success', 'Formateur updated successfully');
    }

    public function destroy(Formatter $formatter)
    {
        $formatter->delete();
        return redirect()->route('professors.index')->with('success', 'Formateur deleted successfully');
    }
}
