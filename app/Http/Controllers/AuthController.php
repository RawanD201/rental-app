<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    public function store(LoginRequest $req)
    {
        $username = $req->authenticate();
        $req->session()->regenerate();
        return \redirect()->route('home')->with([
            'username' => $username
        ]);
    }
    public function destroy(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect('/login');
    }
}
