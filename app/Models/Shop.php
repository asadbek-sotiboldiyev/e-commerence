<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'seller_id', 'description', 'address', 'phone', 'photo'];

    public function sellerUser()
    {
        $seller = Seller::findOrFail($this->seller_id);
        $user = User::findOrFail($seller->user_id);
        return $user;
    }

    public function seller()
    {
        $this->belongsTo(Seller::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
