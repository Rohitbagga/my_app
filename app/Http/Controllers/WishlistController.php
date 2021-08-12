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
    public function index()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $wishlist = User::find(1)->wishlist;
            return view('wishlist-table')->with('list', $wishlist);} else {
            return redirect('/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {

            return view('user-wishlist');} else {
            return redirect('/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (Auth::check()) {

            $this->validate($request, [
                'wishlist' => 'required',
            ]);
            $userId = Auth::id();
            $list = new Wishlist;
            $list->wishlist_name = $request->input('wishlist');
            $list->user_id = $userId;
            $list->save();

            return redirect()->route('wishlist.index');
        } else {
            return redirect('/login');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if (Auth::check()) {

            $data = Wishlist::find($id);
            return view('edit-wishlist', ['data' => $data]);
        } else {
            return redirect('/login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'wishlist' => 'required',
        ]);
        if (Auth::check()) {

            $data = Wishlist::find($id);
            $data->wishlist_name = $request->wishlist;
            $data->save();
            return redirect('/wishlist-table/list-updated');
        } else {
            return redirect('/login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check()) {
            $data = Wishlist::find($id);

            $data->delete();
        } else {
            return redirect('/login');
        }
        // return redirect('/wishlist-table/list-deleted');
    }
}
