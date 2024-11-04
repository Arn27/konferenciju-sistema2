<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $conferences = session('conferences', []);
        return view('employee.conferences.index', compact('conferences'));
    }

    public function show($id)
    {
        $conferences = session('conferences', []);
        $conference = collect($conferences)->firstWhere('id', $id);

        if (!$conference) {
            return redirect()->route('employee.conferences')->with('error', 'Konferencija nerasta.');
        }

        // Simulate registered clients
        $registeredClients = [
            ['first_name' => 'Petras', 'last_name' => 'Petraitis'],
            ['first_name' => 'Ona', 'last_name' => 'Onaitytė'],
        ];

        return view('employee.conferences.show', compact('conference', 'registeredClients'));
    }
}
