@extends('layouts.app')
@section('content')
    <div>
        <h1>Wishlist</h1>
        <div class="row">
            <div class="col-6 createwishlist">
                <a href="{{ route('wishlists.create') }}" class="btn btn-primary">Create Wishlist</a>
            </div>
        </div>
        <table id="example" class="table table-striped table-bordered createwishlist" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wishlists as $wishlist)
                    <tr  @if ($wishlist->trashed()) style="background-color:gray" @endif>

                        <td>{{ $wishlist->wishlist_name }}</td>
                        <td><img src="{{ $wishlist->ImagePath }}"></td>

                        <td>
                            @if ($wishlist->trashed())
                                <a data-id="{{ $wishlist->id }}" class="forcedelete btn btn-danger">Delete Forever</a>
                                <a href="{{ route('wishlists.restore', $wishlist->id) }}" class="btn btn-success">Restore</a>
                            @else
                                <a href="{{ route('wishlists.edit', $wishlist->id) }} " class="btn btn-primary">Edit</a>
                                <a data-id="{{ $wishlist->id }}" class="button btn btn-danger">Delete</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>


            <tfoot style="display:none">
                <tr>
                    <th>Name</th>
                    <th>image</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
