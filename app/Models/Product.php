<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['shop_id', 'name', 'description', 'price', 'stock'];

    public function image()
    {
        $image = Image::where('product_id', $this->id)->first();
        return $image;
    }

    public function shop()
    {
        return $this->BelongsTo(Shop::class);
    }
}
