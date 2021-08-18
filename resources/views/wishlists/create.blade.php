@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Create New Wishlist</h1>
            <form action="{{ route('wishlists.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-12">
                            <label>Create Wishlist</label>
                            <input type="text" name="wishlist_name" class="form-control" placeholder="Create Wishlist">
                        </div>
                        <div class="col-12" style="margin-top: 10px">
                            <input type="file" name="image_upload" class="form-control" placeholder="Upload Image">
                        </div>
                        <div class="col-6" style="margin-top: 10px">
                            <button type="submit" class="btn btn-primary">Create Wishlist</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
