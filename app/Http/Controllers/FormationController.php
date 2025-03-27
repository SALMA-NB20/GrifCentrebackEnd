<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function create()
    {
        return view('admin.formations.create');
    }

    public function index()
    {
        $subjects = Formation::all();
        return view('admin.subjects.index', compact('subjects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        Formation::create($validated);

        return redirect()->route('subjects.index')->with('success', 'Formation added successfully');
    }

    public function destroy(Formation $formation)
    {
        $formation->delete();
        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully');
    }
}
