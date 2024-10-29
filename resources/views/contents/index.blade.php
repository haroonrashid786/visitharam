@extends('layouts.app')
@section('title', 'Contents')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Contents</h4>
                {{--                {{ $errors }}--}}
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Contents</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="w-100">
        <a href="{{ route('add.content') }}" class="btn btn-primary">Add Content</a>
        <div class="row justify-content-center">
            <div class="col-md-12 mt-4">
                <div class="card p-4 rounded cShadow">
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Page</th>
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
            ajax: '/contents',
            columns: [
                {data: 'name', name: 'name'},
                {data: 'page', name: 'page'},
                {data: 'status', name: 'status'},
                {data: 'actions', name: 'actions'},
                {data: 'created_at', name: 'created_at', visible: false}, // Add created_at column (hidden)
            ],
            order: [[4, 'desc']] // Change '0' to the index of the column you want to order by
        });


        $('#datatable').on('click', '.delete-content', function () {
            var contentId = $(this).data('id');

            if (confirm('Are you sure you want to delete this content?')) {
                $.ajax({
                    url: '/delete/content/' + contentId,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        dataTable.ajax.reload();
                        showSnackbar('Content deleted successfully.');
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
