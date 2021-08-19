<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $wishlist = $request->route('wishlist');

        if ($wishlist->user_id !== auth()->id()) {
            return redirect()->route('wishlists.index')->with([
                'status' => 'fail',
                'message' => 'You are not authenticated to edit',
            ]);
        }

        return $next($request);

    }
}
