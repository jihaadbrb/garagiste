<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }
    public function register(RegisterRequest $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'user_type' => 'required|string|in:user,mechanicien,admin',
        ]);

        $user = new User();
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->isUser = $validatedData['user_type'] == 'user' ? true : false;
        $user->isMechanicien = $validatedData['user_type'] == 'mechanicien' ? true : false;
        $user->isAdmin = $validatedData['user_type'] == 'admin' ? true : false;
        $user->save();

        auth()->login($user);

        return redirect()->route('clients.index')->with('success', "Account successfully registered.");
    }
}
