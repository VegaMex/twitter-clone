<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home', [
            'tweets' => Tweet::all()->map(function ($x) {
                return [
                    'id' => $x->id,
                    'name' => $x->user()->where('id', $x->user_id)->get('name'),
                    'username' => $x->user()->where('id', $x->user_id)->get('username'),
                    'message' => $x->message,
                    'date' => $x->created_at,
                ];
            }),
            'userInfo' => User::where('id', Auth::user()->id)->get(['name', 'username'])
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => ['required', 'max:250'],
        ]);

        Tweet::create([
            'user_id' => Auth::user()->id,
            'message' => $request->message
        ]);
        
        return Redirect::route('home.index');
    }
}
