@extends('layouts.app')
@section('content')   
<div class="container mx-auto px-4">
        
        <div class="row my-8">
            <div class="col-6 createwishlist">
                <a href="{{ route('wishlists.create') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Create Wishlist</a>
            </div>
        </div>
        <table id="dataTable" class="p-4 mt-4">
            <thead class="bg-gray-50">
                <tr>

                    <th class="p-8 text-xs text-gray-500">
                        Name
                    </th>
                    <th class="p-8 text-xs text-gray-500">
                        Image
                    </th>
                    <th class="p-8 text-xs text-gray-500">
                        Action
                    </th>

                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($wishlists as $wishlist)
                    <tr class="px-6 py-4 text-sm text-center text-gray-500" @if ($wishlist->trashed()) style="background-color:gray" @endif>

                        <td class="px-6 py-4 text-sm text-center text-gray-500">{{ $wishlist->wishlist_name }}</td>
                        <td class="px-6 py-4 text-sm text-center text-gray-500"><img src="{{ $wishlist->Imageurl }}"></td>

                        <td>
                            @if ($wishlist->trashed())
                                <a data-id="{{ $wishlist->id }}"
                                    class="button px-4 py-1 text-sm text-white bg-red-400 rounded">Delete Forever</a>
                                <a href="{{ route('wishlists.restore', $wishlist->id) }}"
                                    class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Restore</a>
                            @else
                                <a href="{{ route('wishlists.edit', $wishlist->id) }} "
                                    class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                                <a data-id="{{ $wishlist->id }}"
                                    class="button px-4 py-1 text-sm text-white bg-red-400 rounded">Delete</a>
                            @endif
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>

    </div>
@endsection
