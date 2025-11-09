<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;

class DaftarController extends Controller
{
    public function index(){
        return view('daftar');
    }

    public function daftar(Request $request){
        $validate=[
            'name'=> 'required',
            'email'=> 'required|email:dns,rfc|unique:users',
            'no_hp'=> 'required',
            'password'=> 'required|confirmed',
            'password_confirmation'=> 'required',

        ];

        $pesan=[
            'name.required'=>'nama lengkap harus di isi',
            'email.required'=>'email harus di isi',
            'email.unique'=>'email sudah terdaftar',
            'email.email'=>'email harus valid',
            'no_hp.required'=>'no hp harus di isi',
            'password.required'=>'password harus di isi',
            'password.confirmed'=>'konfirmasi password tidak cocok`',
            'password_confirmation.required'=>'konfirmasi password harus di isi',

        ];

        $validated = $request->validate($validate, $pesan);

        if ($request->password != $request->password_confirmation){
            session()->flash('error', 'konfirmasi password salah');
            return redirect()->back();
        }

        $validated['password']=bcrypt($validated['password']);
        $user = User::create($validated);

        event(new Registered($user));

        return redirect('/verify/email/' . $user->id);

    }

    public function verify($id, $hash)
    {
        $user = User::find($id);

        if (!$user) {
            return abort(404, "User tidak ditemukan.");
        }

        if (!hash_equals(sha1($user->getEmailForVerification()), $hash)) {
            return abort(403, "Token verifikasi tidak valid.");
        }

        $user->markEmailAsVerified();

        return redirect()->route('login');
    }
    public function resendVerify($id)
    {
        $user = User::find($id);
        event(new \Illuminate\Auth\Events\Registered($user));
        return back()->with('message', 'Link verifikasi telah dikirim ulang ke email Anda.');
    }

    //
}
