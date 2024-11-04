<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ConferenceController;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConferenceRequest;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    // Naudojame sesiją konferencijų duomenims saugoti
    public function store(ConferenceRequest $request)
    {
        $data = $request->validated();

        $conferences = session('conferences', []);

        $conference = [
            'id' => count($conferences) + 1,
            'title' => $data['title'],
            'description' => $data['description'],
            'lecturers' => $data['lecturers'],
            'date' => $data['date'],
            'time' => $data['time'],
            'address' => $data['address'],
        ];

        $conferences[] = $conference;

        session(['conferences' => $conferences]);

        return redirect()->route('admin.conferences.index')->with('success', 'Konferencija sėkmingai sukurta.');
    }

    public function index()
    {
        $conferences = session('conferences', []);

        return view('admin.conferences.index', compact('conferences'));
    }

    public function create()
    {
        return view('admin.conferences.create');
    }

    public function edit($id)
    {
        $conferences = session('conferences', []);
        $conference = collect($conferences)->firstWhere('id', $id);

        if (!$conference) {
            return redirect()->route('admin.conferences.index')->with('error', 'Konferencija nerasta.');
        }

        return view('admin.conferences.edit', compact('conference'));
    }

    public function update(ConferenceRequest $request, $id)
    {
        $data = $request->validated();
        $conferences = session('conferences', []);
        $updated = false;
    
        foreach ($conferences as &$conference) {
            if ($conference['id'] == $id) {
                $conference = array_merge($conference, $data);
                $updated = true;
                break;
            }
        }
    
        if ($updated) {
            session(['conferences' => $conferences]);
            return redirect()->route('admin.conferences.index')->with('success', 'Konferencija sėkmingai atnaujinta.');
        } else {
            return redirect()->route('admin.conferences.index')->with('error', 'Konferencija nerasta.');
        }
    }
    
    public function destroy($id)
    {
        $conferences = session('conferences', []);
        $conference = collect($conferences)->firstWhere('id', $id);

        if (!$conference) {
            return redirect()->route('admin.conferences.index')->with('error', 'Konferencija nerasta.');
        }

        // Prevent deletion of past conferences (optional)
        if (strtotime($conference['date']) < time()) {
            return redirect()->route('admin.conferences.index')->with('error', 'Negalite trinti jau įvykusių konferencijų.');
        }

        // Remove the conference from the array
        $conferences = array_filter($conferences, function ($conf) use ($id) {
            return $conf['id'] != $id;
        });

        // Re-index the array to maintain correct IDs
        $conferences = array_values($conferences);

        session(['conferences' => $conferences]);

        return redirect()->route('admin.conferences.index')->with('success', 'Konferencija sėkmingai ištrinta.');
    }


}
