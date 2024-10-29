@extends('layouts.app')
@isset($flight)
    @section('title', 'Edit flight data')
@else
    @section('title', 'Add New Flight data')
@endisset
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    @isset($flight)
                        <h4 class="mb-sm-0 font-size-18">Edit  Flight</h4>
                    @else
                        <h4 class="mb-sm-0 font-size-18">Add New Flight</h4>
                    @endisset
                    {{--                {{ $errors }}--}}
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Flight</li>
                            @isset($flight)
                                <li class="breadcrumb-item active">Edit Flight</li>
                            @else
                                <li class="breadcrumb-item active">Add New Flight</li>
                            @endisset
                        </ol>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="card p-4 rounded cShadow container-fluid">
        @isset($flight)
            <form action="{{ route('update.flight', $flight->id) }}" method="post" enctype="multipart/form-data">
                @else
                    <form action="{{ route('insert.flight') }}" method="post" enctype="multipart/form-data">
                        @endisset
                        @csrf


                        <div class="row">

                            <div class="form-group col-sm-6 mb-2">
                                <label for="">Name<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="hidden" required class="form-control" name="name" @isset($flight)value="{{$flight->name}}" @endisset placeholder="Enter Name">
                                </div>
                                @error('name')
                                <span class="invalid-feedback mt-0" @error('name')style="display: block" @enderror role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


{{--                            <div class="form-group col-sm-6 mb-2 d-flex align-items-end">--}}

{{--                                <label for="switch4" data-on-label="Yes" data-off-label="No">--}}
{{--                                    <label for="">Status: </label>--}}
{{--                                    <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">--}}

{{--                                        <input class="form-check-input" name="status" type="checkbox" id="SwitchCheckSizelg" @if(isset($flight) && $flight->active == 1) checked="" @endif>--}}
{{--                                    </div>--}}
{{--                                </label>--}}
{{--                            </div>--}}





{{--                            <div class="form-group col-sm-12 mb-2">--}}
{{--                                <label for="description">Description</label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <textarea class="form-control" name="description" id="description" placeholder="Enter Description">@isset($flight){{$flight->description}}@endisset</textarea>--}}
{{--                                </div>--}}
{{--                                @error('description')--}}
{{--                                <span class="invalid-feedback mt-0" style="display: block" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                                </span>--}}
{{--                              @enderror--}}
{{--                            </div>--}}




                            <!-- Services Section -->
                            <div class="form-group col-sm-12 mb-2">
                                <label for="services">Flights Data</label>
                                <div id="services-container">
                                    @isset($flight)
                                        @foreach($flight->flightdata as $index => $service)
                                            <div class="input-group mb-2">
                                                <input type="hidden" name="services[{{ $index }}][id]" value="{{ $service->id }}">
                                                <input type="text" name="services[{{ $index }}][flight_name]" class="form-control" value="{{ $service->flight_name }}" placeholder="Enter Flight Name">
                                                <input type="text" name="services[{{ $index }}][baggage]" class="form-control" value="{{ $service->baggage }}" placeholder="Enter Baggage">
                                                <input type="text" name="services[{{ $index }}][price]" class="form-control" value="{{ $service->price }}" placeholder="Enter Price">
                                                <input type="file" name="services[{{ $index }}][image]" class="form-control" placeholder="Upload  Image" accept="image/png, image/jpg, image/jpeg, image/webp">
                                                <img src="{{ is_string($service->image) ? url($service->image) : $service->image }}" alt="Service Image" style="width: 50px; height: 50px;" class="img-thumbnail">
                                                <button type="button" class="btn btn-danger remove-service-btn" data-id="{{ $service->id }}">-</button>
                                            </div>
                                        @endforeach
                                    @endisset
                                </div>
                                <button type="button" class="btn btn-success add-service-btn">Add Flight Data</button>
                                @error('services')
                                <span class="invalid-feedback mt-0" style="display: block" role="alert">
        <strong>{{ $message }}</strong>
    </span>
                                @enderror
                                <input type="hidden" name="deleted_services" id="deleted_services">

                            </div>
                            <!-- Services Section -->





                            <div class="form-group col-sm-12 mb-2">
                                <input type="submit" value="Submit" class="btn btn-primary btn-sm">
                            </div>

                        </div>
                    </form>
    </div>








    <script>
        document.addEventListener('DOMContentLoaded', function() {


            var deletedServices = [];

            // Function to attach the click event listener to the remove button
            function addRemoveButtonEventListener(button) {
                button.addEventListener('click', function() {
                    var serviceId = this.closest('.input-group').querySelector('input[name*="[id]"]').value; // Get the service ID
                    if (serviceId) {
                        deletedServices.push(serviceId);
                        document.getElementById('deleted_services').value = deletedServices.join(',');
                    }
                    this.closest('.input-group').remove(); // Remove the service from the frontend
                });
            }

            // Add event listeners to existing remove buttons
            document.querySelectorAll('.remove-service-btn').forEach(function(button) {
                addRemoveButtonEventListener(button);
            });




            document.querySelector('.add-service-btn').addEventListener('click', function() {
                var container = document.getElementById('services-container');
                var newIndex = container.children.length;
                var newServiceInput = document.createElement('div');
                newServiceInput.classList.add('input-group', 'mb-2');


                newServiceInput.innerHTML = `
                <input type="hidden" name="services[${newIndex}][id]">
                <input type="text" h name="services[${newIndex}][flight_name]" class="form-control" placeholder="Enter Flight Name" required>
                <input type="text" name="services[${newIndex}][baggage]" class="form-control" placeholder="Enter Baggage" required>
                <input type="text" name="services[${newIndex}][price]" class="form-control" placeholder="Enter Price" required>
                <input type="file" name="services[${newIndex}][image]" class="form-control" placeholder="Upload Services Image" accept="image/png, image/jpg, image/jpeg, image/webp">
                <button type="button" class="btn btn-danger remove-service-btn">-</button>
            `;
                container.appendChild(newServiceInput);

                addRemoveButtonEventListener(newServiceInput.querySelector('.remove-service-btn'));

            });
            });



    </script>

    <script src="{{asset('assets/libs/tinymce/tinymce.min.js')}}"></script>


    <script>


        document.addEventListener('DOMContentLoaded', function() {
            // Existing code for the remove and add service buttons...

            tinymce.init({
                selector: 'textarea#description', // Corrected selector
                plugins: [
                    "code advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table paste"
                ],
                toolbar: "code insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",

                setup: function (editor) {
                    editor.ui.registry.addButton('image', {
                        icon: 'image',
                        onAction: function () {
                            openImagePickerDialog(editor);
                        }
                    });

                    editor.on('init', function () {
                        var existingData = `{!! isset($flight) ? $flight->description : '' !!}`;
                        editor.setContent(existingData);
                    });
                },
                file_picker_types: 'image',
                file_picker_callback: function (callback, value, meta) {
                    if (meta.filetype === 'image') {
                        openImagePickerDialog(callback);
                    }
                }
            });
        });

    </script>
@endsection
