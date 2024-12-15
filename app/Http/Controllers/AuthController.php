<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
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

    public function loginStore(LoginRequest $request){
        $data = $request->validated();
        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect('/');
        }
        return back()->withErrors([
            'loginError' => "Foydalanuvchi topilmadi"
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
