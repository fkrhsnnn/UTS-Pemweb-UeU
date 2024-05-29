<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerStore(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string|max:255|min:3',
            'email' => 'required',
            'password' => 'required|min:8',
        ]);

        $credentials['password'] = Hash::make($credentials['password']);

        $user = User::create($credentials);

        auth()->login($user);

        return redirect()->route('dashboard');
    }
}
