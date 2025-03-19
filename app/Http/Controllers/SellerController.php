<?php

namespace App\Http\Controllers;

use App\Http\Middleware\isSeller;
use App\Http\Requests\SellerRegisterRequest;
use App\Models\Role;
use App\Models\Seller;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function __construct(){
        $this->middleware(isSeller::class)->only('main');
    }

    public function main(){
        $seller = auth()->user();
        return view('seller.main', $data = [
            'seller' => $seller
        ]);
    }

    public function about(){
        return view('seller.about');
    }

    public function register(){
        $user = auth()->user();
        return view('seller.register', $data = [
            'user' => $user
        ]);
    }

    public function registerStore(SellerRegisterRequest $request){
        $phone = $request->phone;
        $user = User::find(auth()->user()->id);
        $data = [
            'user_id' => $user->id,
            'role_id' => '2', //seller->id = 2
        ];
        $user->phone = $phone;
        $user->save();
        Seller::create([
            'user_id' => $user->id,
            'phone' => $phone,
        ]);
        UserRole::create($data);
        return redirect()->route('seller')->with('newseller' , "Siz endi sotuvchisiz");
    }
}
