<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conference;

class ClientController extends Controller
{
    public function index()
    {
        $conferences = Conference::with('users')->get(); // Include 'users' relationship to check registration status
        return view('client.conferences.index', compact('conferences'));
    }

    public function show($id)
    {
        $conference = Conference::with('users')->findOrFail($id);
        return view('client.conferences.show', compact('conference'));
    }

    public function registerForm($id)
    {
        $conference = Conference::findOrFail($id);
        return view('client.conferences.register', compact('conference'));
    }

    public function register($id)
    {
        $user = auth()->user();
        $conference = Conference::findOrFail($id);
    
        // Attach the user to the conference if not already registered
        if (!$conference->users()->where('user_id', $user->id)->exists()) {
            $conference->users()->attach($user->id);
        }
    
        return redirect()->route('client.conferences', $conference->id)->with('success', 'Successfully registered for the conference.');
    }
    

    public function cancelRegistration($id)
    {
        $user = auth()->user();
        $conference = Conference::findOrFail($id);
    
        // Detach the user from the conference to cancel registration
        $conference->users()->detach($user->id);
    
        return redirect()->route('client.conferences', $conference->id)->with('success', 'Registration cancelled successfully.');
    }
    

    
}
