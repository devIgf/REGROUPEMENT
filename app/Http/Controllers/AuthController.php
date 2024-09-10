<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Récupération des identifiants (email et mot de passe)
        $credentials = $request->only('email', 'password');

        // Tentative de connexion avec les identifiants
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Récupération de l'utilisateur authentifié

            // Stocker les informations de l'utilisateur dans une variable de session ou les passer à la vue
            $userInfo = [
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role
            ];

            // Redirection en fonction du rôle de l'utilisateur
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('userInfo', $userInfo);
            } else {
                return redirect()->route('client.dashboard')->with('userInfo', $userInfo);
            }
        }

        // En cas d'échec de connexion, retourner avec un message d'erreur
        return redirect()->back()->withErrors(['email' => 'Email ou mot de passe incorrect.']);
    }


    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'client',  // Rôle par défaut
        ]);

        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
