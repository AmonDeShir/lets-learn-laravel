<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function authenticate(Request $request)
    {
        $validated = $request->validate([
            "email" => "required|email",
            "password" => [
                "required",
                "string",
            ],
        ]);

        if (auth()->attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->route("dashboard")->with("success", "Logged in successfully");
        }

        return redirect()->route("login")->withErrors([
            "email" => "Incorrect email or password",
        ]);
    }

    public function register()
    {
        return view("auth.register");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|min:3|max:40",
            "email" => "required|email|unique:users,email",
            "password" => [
                "required",
                "string",
                "confirmed",
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
        ]);

        $user = User::create($validated);
        $user->save();

        return redirect()->route("login")->with("success", "Registration successful! Confirm you email and login!");
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("login")->with("success", "Logged out successfully");
    }
}
