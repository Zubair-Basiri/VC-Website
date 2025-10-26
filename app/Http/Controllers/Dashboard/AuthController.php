<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function userList()
    {
        $users = User::all();
        return view('dashboard.auth.userList', compact('users'));
    }

    public function register()
    {
        return view('dashboard.auth.registration');
    }

    public function registerForm(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'password.confirmed' => 'Passwords do not match.',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('userList')->with('success', 'Registration successful. Please login.');
    }

    public function login()
    {
        return view('website.login');
    }

    public function loginForm(Request $request)
    {
        $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashHome');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->onlyInput('email');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('userList')->with('success', 'User deleted successfully.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
