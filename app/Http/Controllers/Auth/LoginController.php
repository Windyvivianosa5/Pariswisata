<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function index(){
        return view('/masuk');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $validate = [
            'email' => 'required|email:dns',
            'password' => 'required',
        ];
        $message = [
            'email.required' => 'Kolom email wajib diisi.',
            'email.email' => 'Email harus berupa alamat email yang valid.',
            'password.required' => 'Kolom password wajib diisi.',
        ];
        $credentials = $request->validate($validate , $message);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('eror','email atau password yang anda masukan salah');
    }

        public function logout(Request $request): RedirectResponse
        {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/');
        }
}
