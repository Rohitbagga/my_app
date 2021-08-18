<?php

namespace App\Http\Middleware;

use App\Models\Wishlist;
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

        $id = $request->route('wishlist'); // For example, the current URL is: /posts/1/edit

        $wishlist = Wishlist::find($id); // Fetch the post

        if ($wishlist[0]->user_id == auth()->user()->id) {
            return $next($request); // They're the owner, lets continue...
        }

        return redirect()->to('wishlists'); // Nope! Get outta' here.
    }
}
