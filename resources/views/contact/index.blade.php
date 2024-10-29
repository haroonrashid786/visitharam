@extends('layouts.app')
@section('title', 'Contact requests')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Contact requests</h4>
                {{--                {{ $errors }}--}}
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Contact requests</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="w-100">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-4">
                <div class="card p-4 rounded cShadow">
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Phone Number</th>
                            <th>Passengers</th>
                            <th>Number of Days</th>
                            <th>Date</th>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.10.8/dayjs.min.js"></script>

    <script>
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/contacts',
            columns: [
                {
                    data: 'first_name',
                    name: 'first_name',
                    render: function(data, type, row) {
                        if (data.length > 30) {
                            return data.substr(0, 30) + '...';
                        }
                        return data;
                    }
                },
                {
                    data: 'email',
                    name: 'email',
                    render: function(data, type, row) {
                        if (data.length > 30) {
                            return data.substr(0, 30) + '...';
                        }
                        return data;
                    }
                },
                {data: 'type', name: 'type'},
                {
                    data: 'phone_number',
                    name: 'phone_number',
                    render: function(data, type, row) {
                        if (data.length > 30) {
                            return data.substr(0, 30) + '...';
                        }
                        return data;
                    }
                },
                {data: 'adults', name: 'adults'},
                {data: 'number_of_days', name: 'number_of_days'},
                {
                    data: 'created_at',
                    name: 'created_at',
                    render: function(data, type, row) {
                        // Format the date using day.js
                        return dayjs(data).format('YYYY-MM-DD HH:mm:ss');
                    }
                }
            ],
            order: [[6, 'desc']] // Change '0' to the index of the column you want to order by
        });

    </script>
@endsection
