<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seller>
 */
class SellerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = DB::table('users')
            ->leftJoin('sellers', 'users.id', '=', 'sellers.user_id')
            ->whereNull('sellers.user_id')
            ->select('users.id', 'users.phone')
            ->inRandomOrder()
            ->first();
        return [
            "user_id" => $user->id,
            "phone" => $user->phone
        ];
    }
}
