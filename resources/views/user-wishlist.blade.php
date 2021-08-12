<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        p {
            color: red;
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
                <h1>Create New Wishlist</h1>
                <form action="{{route('wishlist.store')}}" method="post" action="/action_page.php">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Create Wishlist</label>
                        <input type="text" name="wishlist" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Create Wishlist">

                        @if ($errors->any())


                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach


                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Create Wishlist</button>
                </form>


            </div>
        </div>



    </div>

</body>

</html>
