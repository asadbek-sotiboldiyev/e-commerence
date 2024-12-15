<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view('auth/register');
    }

    public function login(){
        return view('auth/login');
    }

    public function registerStore(RegisterRequest $request){
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        // auth()->login($user);
        return redirect()->route('login');
    }

    public function loginStore(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect('/');
        }
        return back()->withErrors("Ma'lumotlar noto'g'ri")->with('email', $request->email);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
