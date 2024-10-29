@extends('layouts.app')
@isset($hotelfacility)
    @section('title', 'Edit Hotel Facility')
@else
    @section('title', 'Add Hotel Facility')
@endisset
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                @isset($hotelfacility)
                <h4 class="mb-sm-0 font-size-18">Edit Hotel Facility</h4>
                @else
                <h4 class="mb-sm-0 font-size-18">Add New Hotel Facility</h4>
                @endisset
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Hotel Facility</li>
                        @isset($hotelfacility)
                        <li class="breadcrumb-item active">Edit Hotel Facility</li>
                        @else
                        <li class="breadcrumb-item active">Add New Hotel Facility</li>
                        @endisset
                    </ol>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="card p-4 rounded cShadow container-fluid">
    @isset($hotelfacility)
    <form action="{{ route('update.hotelfacility', $hotelfacility->id) }}" method="post" enctype="multipart/form-data">
        @else
        <form action="{{route('insert.hotelfacility')}}" method="post" enctype="multipart/form-data">
            @endisset
            @csrf
            <div class="row">
                <div class="form-group col-sm-6 mb-2">
                    <label for="">Name<span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="text" required class="form-control" name="name" @isset($hotelfacility)value="{{$hotelfacility->name}}" @endisset placeholder="Enter Name">
                    </div>
                    @error('name')
                    <span class="invalid-feedback mt-0" @error('name')style="display: block" @enderror role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group col-sm-6 mb-2">
                    <label for=""> Hotel<span class="text-danger">*</span></label>
                    <div class="input-group">
                    <select required class="form-control" name="hotel_id">
                    <option value="">Select Hotel</option>
                    @foreach ($hotels as $hotel)
                    <option value="{{ $hotel->id }}" @isset($hotelfacility) @if ($hotelfacility->hotel_id == $hotel->id) selected @endif @endisset>{{ $hotel->name }}</option>
                    @endforeach
                    </select>
                    </div>
                    @error('hotel_id')
                    <span class="invalid-feedback mt-0" @error('hotel_id') style="display: block" @enderror role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>

                <div class="form-group col-sm-6 mb-2">
                    <label for="image">Icon</label>
                    <input type="file" class="form-control" name="image" id="image">
                    @isset($hotelfacility)
                        <img src="{{ asset($hotelfacility->image) }}" alt="Existing Icon" style="max-width: 100px;">

                    @endisset
                </div>

                <div class="form-group col-sm-6 mb-2 d-flex align-items-end">
                    <label for="switch4" data-on-label="Yes" data-off-label="No">
                        <label for="">Status: </label>
                        <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                            <input class="form-check-input" name="status" type="checkbox" id="SwitchCheckSizelg" @if(isset($hotelfacility) && $hotelfacility->status == 1) checked="" @endif>
                        </div>
                    </label>
                </div>



                <div class="form-group col-sm-6 mb-2">
                    <label for="">Description<span class="text-danger">*</span></label>
                    <div class="input-group">
                            <textarea class="form-control" name="description" placeholder="Enter Description">@isset($hotelfacility){{ $hotelfacility->description }}@endisset</textarea>

                    </div>
                    @error('description')
                    <span class="invalid-feedback mt-0" @error('description')style="display: block" @enderror role="alert">
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
