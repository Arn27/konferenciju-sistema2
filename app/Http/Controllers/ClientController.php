<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $conferences = session('conferences', []);
        return view('client.conferences.index', compact('conferences'));
    }

    public function show($id)
    {
        $conferences = session('conferences', []);
        $conference = collect($conferences)->firstWhere('id', $id);

        if (!$conference) {
            return redirect()->route('client.conferences')->with('error', 'Konferencija nerasta.');
        }

        return view('client.conferences.show', compact('conference'));
    }

    public function registerForm($id)
    {
        return view('client.conferences.register', ['conference_id' => $id]);
    }

    public function register(Request $request, $id)
    {
        return redirect()->route('client.conferences')->with('success', 'Sėkmingai užsiregistravote į konferenciją.');
    }
}
