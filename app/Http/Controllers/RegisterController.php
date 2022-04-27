<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('register.index', ['title' => 'Register']);
    }

    public function store(Request $request) {
        $validated = $request -> validate([
            'name' => 'required|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:255'
        ]);
        $validated['password'] = hash::make($validated['password']);

        $registration = User::create($validated);

        if(!$registration){
            return redirect('/register')->with('error', 'Registration failed!');    
        } else {
            return redirect('/login')->with('success', 'Registration success!');
        }
    }
}
