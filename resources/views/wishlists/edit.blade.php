@extends('layouts.app')
@section('content')
<div class="container ">
  
    <div class="card">
        <div class="card-body">
            <h1>Edit Wishlist</h1>
            <form action="{{ route('wishlists.update', $wishlist->id) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label>Create Wishlist</label>
                    <input type="text" name="wishlist_name" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" value="{{ $wishlist->wishlist_name }}" placeholder="Create Wishlist">
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Update</button>
            </form>
        </div>
    </div>

</div>
@endsection
