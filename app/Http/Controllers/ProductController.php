<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Image;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('product/index', $data = [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $shops = auth()->user()->shops;
        return view('product/create', $data = [
            'shops' => $shops
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        $user = auth()->user();

        if( !$user->seller->isOwner($data['shop_id']) ){
            abort(403);
        }

        $path = "storage/" . $data['image']->store('/product-images');
        // dd($path);
        $new_product = Product::create($data);
        $image = Image::create([
            'path' => $path,
            'product_id' => $new_product->id
        ]);
        return redirect()->route('productShow', ['id' => $new_product->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('product/show', $data = [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $this->authorize('update', $product);

        $shops = auth()->user()->shops;
        return view('product/edit', $data = [
            'shops' => $shops,
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $id)
    {
        $product = Product::findOrFail($id);
        $this->authorize('update', $product);

        $data = $request->validated();
        $new_product = $product->update($data);
        return redirect()->route('productShow', ['id' => $product->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
