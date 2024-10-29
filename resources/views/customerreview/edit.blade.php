@extends('layouts.app')
@isset($customerreview)
    @section('title', 'Edit Customer Review')
@else
    @section('title', 'Add Customer Review')
@endisset
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                @isset($customerreview)
                <h4 class="mb-sm-0 font-size-18">Edit Customer Review</h4>
                @else
                <h4 class="mb-sm-0 font-size-18">Add New Customer Review</h4>
                @endisset
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Customer Review</li>
                        @isset($customerreview)
                        <li class="breadcrumb-item active">Edit Customer Review</li>
                        @else
                        <li class="breadcrumb-item active">Add New Customer Review</li>
                        @endisset
                    </ol>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="card p-4 rounded cShadow container-fluid">
    @isset($customerreview)
    <form action="{{ route('update.customerreview', $customerreview->id) }}" method="post" enctype="multipart/form-data">
        @else
        <form action="{{route('insert.customerreview')}}" method="post" enctype="multipart/form-data">
            @endisset
            @csrf
            <div class="row">
                <div class="form-group col-sm-6 mb-2">
                    <label for="">Name<span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="text" required class="form-control" name="name" @isset($customerreview)value="{{$customerreview->name}}" @endisset placeholder="Enter Name">
                    </div>
                    @error('name')
                    <span class="invalid-feedback mt-0" @error('name')style="display: block" @enderror role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-sm-6 mb-2">
                    <label for="">Country Name<span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="text" required class="form-control" name="company_name" @isset($customerreview)value="{{$customerreview->company_name}}" @endisset placeholder="Enter Company Name">
                    </div>
                    @error('company_name')
                    <span class="invalid-feedback mt-0" @error('company_name')style="display: block" @enderror role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>



                <div class="form-group col-sm-6 mb-2">
                    <label for="image">Icon</label>
                    <input type="file" class="form-control" name="image" id="image">
                    @isset($customerreview)
                        <img src="{{ asset($customerreview->image) }}" alt="Existing Icon" style="max-width: 100px;">

                    @endisset
                </div>

                <div class="form-group col-sm-6 mb-2 d-flex align-items-end">
                    <label for="switch4" data-on-label="Yes" data-off-label="No">
                        <label for="">Status: </label>
                        <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                            <input class="form-check-input" name="status" type="checkbox" id="SwitchCheckSizelg" @if(isset($customerreview) && $customerreview->status == 1) checked="" @endif>
                        </div>
                    </label>
                </div>



                <div class="form-group col-sm-6 mb-2">
                    <label for="">Review<span class="text-danger">*</span></label>
                    <div class="input-group">
                            <textarea class="form-control" name="review" placeholder="Enter Review">@isset($customerreview){{ $customerreview->review }}@endisset</textarea>

                    </div>
                    @error('review')
                    <span class="invalid-feedback mt-0" @error('review')style="display: block" @enderror role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group col-sm-12 mb-2">
                    <input type="submit" value="Save" class="btn btn-primary btn-sm">
                </div>
            </div>
        </form>
</div>
@endsection
