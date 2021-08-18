@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Edit Wishlist</h1>
            <form action="{{ route('wishlists.update', $wishlist->id) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label>Create Wishlist</label>
                    <input type="text" name="wishlist_name" class="form-control" value="{{ $wishlist->wishlist_name }}" placeholder="Create Wishlist">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
