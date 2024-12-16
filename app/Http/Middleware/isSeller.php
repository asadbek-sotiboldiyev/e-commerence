<?php

namespace App\Http\Middleware;

use App\Models\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isSeller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userrole = UserRole::where('user_id', auth()->user()->id)->where('role_id', '2')->first();
        if(!$userrole){
            return redirect()->route('sellerAbout');
        }
        return $next($request);
    }
}
