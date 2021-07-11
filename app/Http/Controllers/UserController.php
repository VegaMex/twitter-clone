<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UserController extends Controller
{
    public function store(Request $request)
    {
        User::create(
            $request->validate([
                'name' => ['required', 'max:50'],
                'username' => ['required', 'max:50'],
                'email' => ['required', 'max:50', 'email'],
                'password' => ['required', 'max:50'],
            ])
        );

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return Redirect::route('home.index');
        } else {
            return redirect()->back()->withErrors('Algo salió mal', 'registerFail');
        }
    }

    public function login(Request $request)
    {
        $data = $request->all();
        
        $request->validate([
            'username' => ['required', 'string'], 
            'password' => ['required', 'string']
        ]);

        $type = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt(array($type => $data['username'], 'password' => $data['password']))) {
            $request->session()->regenerate();
            return Redirect::route('home.index');
        } else {
            return redirect()->back()->withErrors('Las credenciales no son válidas', 'loginFail');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Auth::logout();

        return Redirect::route('main');
    }
}
