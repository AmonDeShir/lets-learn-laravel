<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view("auth.login");
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
}
