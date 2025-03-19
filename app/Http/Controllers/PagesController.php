<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $last_products = Product::limit(5)->get();
        // dd($last_products);
        return view('home', $data = [
            'products' => $last_products
        ]);
    }
}
