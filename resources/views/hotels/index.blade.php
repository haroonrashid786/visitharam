@extends('layouts.app')
@section('title', 'Hotels')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Hotels</h4>
                {{--                {{ $errors }}--}}
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Hotels</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="w-100">
        <a href="{{ route('add.hotel') }}" class="btn btn-primary">Add Hotel</a>
        <div class="row justify-content-center">
            <div class="col-md-12 mt-4">
                <div class="card p-4 rounded cShadow">
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Hotel Type</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <script src="{{ asset('assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/hotels',
            columns: [
                {data: 'name', name: 'name'},
                {
                    data: 'type',
                    name: 'type',
                    render: function (data, type, row) {
                        if (data == 1) {
                            return 'Makkah';
                        } else if (data == 2) {
                            return 'Madina';
                        } else {
                            return 'Unknown'; // Optional: handle other values
                        }
                    }
                },
                {data: 'description', name: 'description'},
                {data: 'status', name: 'status'},
                {data: 'actions', name: 'actions'},
                {data: 'created_at', name: 'created_at', visible: false}, // Add created_at column (hidden)
            ],
            order: [[4, 'desc']] // Change '0' to the index of the column you want to order by
        });


        $('#datatable').on('click', '.delete-hotel', function () {
            var hotelId = $(this).data('id');

            if (confirm('Are you sure you want to delete this hotel?')) {
                $.ajax({
                    url: '/delete/hotel/' + hotelId,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        dataTable.ajax.reload();
                        showSnackbar('Hotel deleted successfully.');
                        setTimeout(function () {
                            location.reload(); // Reload the window after a short delay
                        }, 2000); // 2000 milliseconds (adjust as needed)
                    },
                    error: function (error) {
                        location.reload();
                    }
                });
            }
        });

        function showSnackbar(message, type = 'success') {
            Snackbar.show({
                text: message,
                pos: 'bottom-center',
                backgroundColor: type === 'success' ? '#28a745' : '#dc3545',
                actionTextColor: '#fff'
            });
        }
    </script>
@endsection
