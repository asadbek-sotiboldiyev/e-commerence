<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopCreateRequest;
use App\Models\Seller;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->only(['mine', 'create', 'store']);
    }

    public function index(){
        $shops = Shop::paginate(5);
        return view('shop/index', $data = [
            'shops' => $shops
        ]);
    }

    public function mine(){
        $seller = Seller::where('user_id', auth()->user()->id)->first();
        if( !$seller ){
            return redirect()->route('seller');
        }
        $shops = Shop::where('seller_id', $seller->id)->get();
        return view('shop/mine', $data = [
            'shops' => $shops
        ]);
    }

    public function show($id){
        $shop = Shop::findOrFail($id);
        return view('shop/show', $data = [
            'shop' => $shop
        ]);
    }

    public function create(){
        return view('shop/create');
    }

    public function store(ShopCreateRequest $request){
        $data = $request->validated();
        $data['seller_id'] = Seller::where('user_id', auth()->user()->id)->first()->id;

        // create Shop
        $shop = Shop::create($data);
        return redirect()->route('shopMine');
    }
}
