<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\ValidationException;

use function PHPUnit\Framework\returnSelf;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('auth.login');
    }

    public function registerPage()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect('dashboard');
        }

        // throw ValidationException::withMessages([
        //     'credentials' => 'Credenciais incorretas'
        // ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function store(Request $request)
    {
        $user = $request->validate([
            'name' => 'string|required',
            'username' => 'string|required|unique:users,username',
            'password' => 'string|required|min:6|confirmed',
        ]);

        User::create($user);

        return redirect()->route('auth.login');
    }
}
