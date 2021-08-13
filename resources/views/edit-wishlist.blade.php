<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        p{
            color:red;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Edit Wishlist</h1>

                <form action="{{ route('wishlists.update', $data->id) }}" method="POST">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="exampleInputEmail1">Create Wishlist</label>
                        <input type="hidden" name="listid" value="{{ $data->id }}">
                        <input type="text" name="wishlist" class="form-control" value="{{ $data->wishlist_name }}"
                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Create Wishlist">
                        @if ($errors->any())


                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>


            </div>
        </div>



    </div>

</body>

</html>
