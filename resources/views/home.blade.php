@extends('layouts.app')
@section('title')
    {{ 'Dashboard' }}
@endsection
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-4">
            <div class="card bg-primary bg-soft">
                <div>
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-3">
                                <h5 class="text-primary">Welcome Back!</h5>
                                <p>Visit Haram</p>
                                <p>Admin Dashboard</p>

                                {{-- <ul class="ps-3 mb-0">
                                    <li class="py-1">{{ count($shippers) }} Shipper(s)</li>
                                    <li class="py-1">{{ count($carriers) }} Carrier(s)</li>
                                </ul> --}}
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                        <i class="bx bx-copy-alt"></i>
                                    </span>
                                </div>
                                <h5 class="font-size-14 mb-0">Packages</h5>
                            </div>
                            <div class="text-muted mt-4">
                                <h4>{{$packages}} </h4>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                        <i class="bx bx-archive-in"></i>
                                    </span>
                                </div>
                                <h5 class="font-size-14 mb-0">Services</h5>
                            </div>
                            <div class="text-muted mt-4">
                                <h4>{{$services}} </h4>
                                {{-- <div class="d-flex">
                                    <span class="badge badge-soft-success font-size-12"> + 0.2% </span> <span class="ms-2 text-truncate">From previous period</span>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                        <i class="bx bx-purchase-tag-alt"></i>
                                    </span>
                                </div>
                                <h5 class="font-size-14 mb-0">Facilities</h5>
                            </div>
                            <div class="text-muted mt-4">
                                <h4>{{$facilities}}</h4>

                                {{-- <div class="d-flex">
                                    <span class="badge badge-soft-warning font-size-12"> 0% </span> <span class="ms-2 text-truncate">From previous period</span>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>


    <!-- end row -->


    <!-- end row -->

    {{-- </div> --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

@endsection
