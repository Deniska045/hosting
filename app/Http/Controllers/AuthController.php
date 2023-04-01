<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    public function login(Request $request) {
        $request->validate([
            'login' => 'required|exists:users|alpha_dash',
            'password' => 'required|exists:users|min:6'
        ]);

        $user = User::where('login', $request->login)->where('password', $request->password)->first();
        if (!$user) return response()->json([
            'errors' => [
                'password' => ['Неверный логин или пароль']
            ]
        ], 422);

        Auth::login($user, true);

        return $user;
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|alpha_dash',
            'surname' => 'required|alpha_dash',
            'patronymic' => 'alpha_dash',
            'login' => 'required|unique:users|alpha_dash',
            'password' => 'required|unique:users|min:6',
            'password_repeat' => 'required|same:password',

        ]);

        $userDto = $request->except('password_repeat', 'rules');
        $user = User::create($userDto);

        Auth::login($user, true);

        return $user;
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }
}
