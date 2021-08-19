<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function __construct()
    {
        $this->middleware(['owner'], ['only' => [
            'edit', 'update', 'delete',
        ]]);
    }

    public function index(Request $request)
    {
        $wishlists = auth()->user()->wishlists()->withTrashed()->get();

        return view('wishlists.index', compact('wishlists'));
    }

    public function create()
    {
        return view('wishlists.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'wishlist_name' => 'required',
            'image_upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
           
        ]);

        if ($image = $this->moveUploadFile($data)) {
            auth()->user()->wishlists()->create(array('wishlist_name' => $data['wishlist_name'], 'image' => $image));

            return redirect()->route('wishlists.index')->with(['status' => 'success','message' =>'List Inserted Successfully']);
        } else {
            \Log::error($e->getMessage());
        }

    }

    private function moveUploadFile($data)
    {

        $imageName = null;

        try {
            $imageName = time() . '.' . $data['image_upload']->extension();

            $data['image_upload']->storeAs('public', $imageName);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }

        return $imageName;
    }

    public function edit(Wishlist $wishlist)
    {
        return view('wishlists.edit', compact('wishlist'));
    }

    public function update(Request $request, Wishlist $wishlist)
    {
        $data = $request->validate([
            'wishlist_name' => 'required',
        ]);

        $wishlist->update($data);

        return redirect()->route('wishlists.index')->with(['status' => 'success','message' =>'List Updated Successfully']);
    }

    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();

        return [
            'status' => 'success',
            'message' => 'Wishlist deleted successfully',
        ];
    }
    public function forceDelete($id)
    {
        Wishlist::withTrashed()->findOrFail($id)->forceDelete();

        return [
            'status' => 'success',
            'message' => 'Wishlist deleted successfully',
        ];
    }

    public function restore($id)
    {
        Wishlist::withTrashed()->findOrFail($id)->restore();

        return back();
    }
}
