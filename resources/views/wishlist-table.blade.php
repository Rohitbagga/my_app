<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
     alpha/css/bootstrap.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .createwishlist {
            margin-top: 10px;
            margin-bottom: 10px;
        }

    </style>
</head>

<body>
    <div class="container">
        <h1>Wishlist</h1>
        <div class="row">
            <div class="col-6 createwishlist">
                <a href="{{route('wishlist.create')}}" class="btn btn-primary">Create Wishlist</a>
            </div>
        </div>
        <table id="example" class="table table-striped table-bordered createwishlist" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($list as $row)
                    <tr>
                        <td>{{ $row->wishlist_name }}</td>


                        <td><a href="{{ route('wishlist.edit',$row['id'])}} " class="btn btn-primary">Edit</a> <a
                                onclick="deletewishlist({{ $row['id'] }});" class="btn btn-danger ">Delete</td>

                    </tr>
                @endforeach
            </tbody>
            <tfoot style="display:none">
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </tfoot>
        </table>
        </table>
    </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<!-- <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    var url = window.location.href
    var checkinsert = url.includes('success');
    var checkdelete = url.includes('list-deleted');
    var checkupdate = url.includes('list-updated');

    if (checkinsert == true) {
        toastr.success("Your Wishlist Inserted Successfully");
    } else if (checkdelete == true) {
        toastr.success("Your Wishlist Deleted Successfully");
    } else if (checkupdate == true) {
        toastr.success("Your Wishlist updated Successfully");
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
    function deletewishlist(id) {




        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `Are you sure you want to delete this wishlist?`,

                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    var token = $("meta[name='csrf-token']").attr("content");
                    $.ajax({
                       
                        url: "{{route('wishlist.destroy',$row['id'])}}",
                        type: 'Delete',
                        data: {
                            "id": id,
                            "_token": token,
                        },
                        headers: {
                   'X-CSRF-Token': '{{ csrf_token() }}',
                         },
                        success: function() {
                            window.location = "{{route('wishlist.index','list-deleted')}}";
                        }
                    });
                }
            });

    }
</script>
