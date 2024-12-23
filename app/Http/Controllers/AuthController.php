<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Internship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
// Show login form
public function showLogin()
{
return view('auth.login');
}

// Process login
public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    if (Auth::attempt($credentials)) {
        return redirect()->route('dashboard');
    }

    return back()->withErrors(['email' => 'Invalid credentials']);
}

// Show register form
public function showRegister()
{
    return view('auth.register');
}

// Process registration
public function register(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
    ]);

    User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
    ]);

    return redirect()->route('login');
}

// Show dashboard
public function dashboard()
{
    $internships = Internship::all();
    return view('dashboard', compact('internships'));
}

// Logout
public function logout()
{
    Auth::logout();
    return redirect()->route('login');
}

}