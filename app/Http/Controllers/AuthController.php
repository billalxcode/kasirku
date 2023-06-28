<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthVerifyRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function __construct()
    {
        $this->middleware('auth', ['except' => ['login', 'verify']]);
    }

    public function login() {
        return view('auth/login', [
            'title' => 'Login'
        ]);
    }

    public function verify(AuthVerifyRequest $request) {
        $credentials = $request->validated();

        $logged = auth()->attempt($credentials);
        if (!$logged) {
            return redirect()->back()->withErrors([
                'message' => 'Incorrect username and password'
            ])->withInput();
        }

        if (auth()->user()->hasrole('cashier')) {
            return redirect()->route('cashier.home');
        } else {
            return redirect()->route('dashboard');
        }
    }

    public function logout() {
        auth()->logout();
        session()->regenerate();

        return redirect()->route('login')->with('success', 'You have successfully logged out');
    }
}
