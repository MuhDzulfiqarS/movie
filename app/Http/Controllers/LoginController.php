<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        if($user = Auth::user()) {
            return redirect()->intended('main1');
        }

        return view('login.view_login');
    }

    public function proses(Request $request)  {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],
            [
                'username.required' => 'Username tidak boleh kosong',
                'password.required' => 'Password tidak boleh kosong',
            ]
        );

        $user = \App\Models\User::where('username', $request->username)->first();

        if (!$user) {
            return back()->withErrors([
                'username' => 'User belum terdaftar',
            ])->onlyInput('username');
        }

        $kredensial = $request->only('username','password');

        if(Auth::attempt($kredensial)){
            $request->session()->regenerate();
            $user = Auth::user();
            if($user){
                toastr()->success('Anda Berhasil Login');
                return redirect()->intended('main1');
            }
            
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'username' => 'Maaf username atau password anda salah',
        ])->onlyInput('username');
    }


    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
       
        return redirect('/login');
    }
}
