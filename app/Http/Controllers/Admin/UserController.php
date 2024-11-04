<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = session('users', []);

        return view('admin.users.index', compact('users'));
    }

    public function edit($id)
    {
        $users = session('users', []);
        $user = collect($users)->firstWhere('id', $id);

        if (!$user) {
            return redirect()->route('admin.users.index')->with('error', 'Naudotojas nerastas.');
        }

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $users = session('users', []);
        $updated = false;

        foreach ($users as &$user) {
            if ($user['id'] == $id) {
                $user['first_name'] = $request->input('first_name');
                $user['last_name'] = $request->input('last_name');
                $user['email'] = $request->input('email');
                $updated = true;
                break;
            }
        }

        if ($updated) {
            session(['users' => $users]);
            return redirect()->route('admin.users.index')->with('success', 'Naudotojas sėkmingai atnaujintas.');
        } else {
            return redirect()->route('admin.users.index')->with('error', 'Naudotojas nerastas.');
        }
    }
}
