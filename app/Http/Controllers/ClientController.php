<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conference;

class ClientController extends Controller
{
    public function index()
    {
        // Retrieve conferences from the database instead of the session
        $conferences = Conference::all();
        return view('client.conferences.index', compact('conferences'));
    }

    public function show($id)
    {
        $conference = Conference::find($id);

        if (!$conference) {
            return redirect()->route('client.conferences')->with('error', 'Konferencija nerasta.');
        }

        return view('client.conferences.show', compact('conference'));
    }

    public function registerForm($id)
    {
        $conference = Conference::findOrFail($id);
        return view('client.conferences.register', compact('conference'));
    }

    public function register(Request $request, $id)
    {
        // Register logic (e.g., saving registration details)
        return redirect()->route('client.conferences')->with('success', 'Sėkmingai užsiregistravote į konferenciją.');
    }
}
