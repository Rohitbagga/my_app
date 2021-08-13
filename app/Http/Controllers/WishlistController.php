<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         
        $wishlist = $request->user()->wishlist;

        return view('wishlist-table')->with('list', $wishlist);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('user-wishlist');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $data= $request->validate([
            'wishlist' => 'required',
        ]);
       
        // $userId = Auth::id();
        // $list = new Wishlist;
        // $list->wishlist_name = $request->input('wishlist');
        // $list->user_id = $userId;
        // $list->save();
          $data=Wishlist::create(array('wishlist_name' => $data['wishlist'],'user_id'=>Auth::id()));
        
        return redirect()->route('wishlists.index','list-inserted');

    }

    /**
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
         
        // $data = Wishlist::find($id);
        return view('edit-wishlist', ['data' => $wishlist]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Wishlist $wishlist)
    {

    
        $data = $request->validate([
            'wishlist' => 'required',
        ]);
       
        // $data = Wishlist::find($id);
        Wishlist::where('id',$wishlist['id'])->update(['wishlist_name' => $request->input('wishlist')]);
        // $wishlist->wishlist_name = $request->wishlist;
        
        // $wishlist->save();
        return redirect()->route('wishlists.index','list-updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wishlist $wishlist)
    {
        // $data = Wishlist::find($id);

        $wishlist->delete();

    }
}
