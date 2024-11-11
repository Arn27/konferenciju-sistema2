<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Conference;

class ConferenceController extends Controller
{
    public function index()
    {
        $conferences = Conference::all();
        return view('admin.conferences.index', compact('conferences'));
    }

    public function create()
    {
        return view('admin.conferences.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        Conference::create($request->all());
        
        // Redirect to 'conferences.index' instead of 'admin.conferences.index'
        return redirect()->route('conferences.index')->with('success', 'Conference created successfully.');
    }

    public function edit($id)
    {
        $conference = Conference::findOrFail($id);
        return view('admin.conferences.edit', compact('conference'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        $conference = Conference::findOrFail($id);
        $conference->update($request->all());

        // Redirect to 'conferences.index' instead of 'admin.conferences.index'
        return redirect()->route('conferences.index')->with('success', 'Conference updated successfully.');
    }

    public function destroy($id)
    {
        $conference = Conference::findOrFail($id);
        $conference->delete();

        // Redirect to 'conferences.index' instead of 'admin.conferences.index'
        return redirect()->route('conferences.index')->with('success', 'Conference deleted successfully.');
    }
}
