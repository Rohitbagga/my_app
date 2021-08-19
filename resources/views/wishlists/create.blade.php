@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Create New Wishlist</h1>
            <form action="{{ route('wishlists.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="w-full max-w-xs">
                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('wishlists.store') }}" method="POST" enctype="multipart/form-data">
                      <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" >
                          Name
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="wishlist_name">
                      </div>
                      <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" >
                          Image
                        </label>
                        <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="file" name="image_upload">
                       
                      </div>
                      <div class="col-6" style="margin-top: 10px">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Create Wishlist</button>
                    </div>
                    </form>
                   
                  </div>
            </form>
        </div>
    </div>
@endsection
