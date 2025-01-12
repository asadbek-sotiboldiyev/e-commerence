<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'phone'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    public function isOwner($shop_id)
    {
        $shop = Shop::where('id', '=', $shop_id)->first();
        return $shop->seller->id == $this->id;
    }
}
