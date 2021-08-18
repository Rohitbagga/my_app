import 'bootstrap';
import $ from 'jquery';
window.$ = window.jQuery = $;

import 'jquery-ui/ui/widgets/datepicker.js';
import 'datatables/media/css/jquery.dataTables.css';
import 'datatables';
import Swal from 'sweetalert2';

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('click', '.button', function (e) {
    e.preventDefault();
    const id = $(this).data('id');
    Swal.fire({
        icon: 'warning',
        text: 'Are you sure? you want to delete this wishlist!',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        confirmButtonColor: '#e3342f',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:"/wishlists/"+id,
                type: 'DELETE',
                // headers: {
                //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //   },
                success: function() {
                    location.reload();
                }, error: function (error) {
                    alert('something is wrong');
                }
                
            });
        }
    });
});

$(document).on('click', '.forcedelete', function (e) {
    e.preventDefault();
    const id = $(this).data('id');
    
    
    Swal.fire({
        icon: 'warning',
        text: 'Are you sure? you wont be able to revert this!',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        confirmButtonColor: '#e3342f',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:"/force-delete/"+id,
                type: 'delete',
               
                // headers: {
                //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //   },
                success: function() {
                    location.reload();
                },error: function (error) {
                    alert('something is wrong');
                }
            });
        }
    });
});

$(document).ready(function() {
    $('#example').DataTable();
} );

