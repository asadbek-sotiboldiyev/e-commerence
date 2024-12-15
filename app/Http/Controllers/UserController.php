<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showProfile(){
        return view('user/profile', $data = [
            'user' => auth()->user()
        ]);
    }
}
