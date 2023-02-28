<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginAdminController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->roles == 'ADMIN') {
                return redirect()->intended('admin');
            } elseif ($user->roles == 'SUPER_ADMIN') {
                return redirect()->intended('super-admin');
            }
        }
        return view('auth.login-admin');
    }

    public function process(Request $request)
    {
        request()->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ]
        );

        $kredensil = $request->only('email', 'password');

        if (Auth::attempt($kredensil)) {
            $user = Auth::user();
            if ($user->roles == 'ADMIN') {
                return redirect()->intended('admin');
            } elseif ($user->roles == 'SUPER_ADMIN') {
                return redirect()->intended('super-admin');
            }
            return redirect()->intended('/');
        }

        return redirect()
            ->route('admin-login')
            ->withInput()
            ->withErrors(['errors' => 'These credentials do not match our records.']);
    }

    public function logout(Request $request)
    {
       $request->session()->flush();
       Auth::logout();
       return redirect()->route('admin-login');
    }
}
