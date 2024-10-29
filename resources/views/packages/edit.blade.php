@extends('layouts.app')
@isset($package)
    @section('title', 'Edit package')
@else
    @section('title', 'Add New Package')
@endisset
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    @isset($package)
                        <h4 class="mb-sm-0 font-size-18">Edit  Package</h4>
                    @else
                        <h4 class="mb-sm-0 font-size-18">Add New Package</h4>
                    @endisset
                    {{--                {{ $errors }}--}}
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Package</li>
                            @isset($package)
                                <li class="breadcrumb-item active">Edit Package</li>
                            @else
                                <li class="breadcrumb-item active">Add New Package</li>
                            @endisset
                        </ol>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="card p-4 rounded cShadow container-fluid">
        @isset($package)
            <form action="{{ route('update.package', $package->id) }}" method="post" enctype="multipart/form-data">
                @else
                    <form action="{{ route('insert.package') }}" method="post" enctype="multipart/form-data">
                        @endisset
                        @csrf


                        <div class="row">

                            <div class="form-group col-sm-6 mb-2">
                                <label for="">Name<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" required class="form-control" name="name" @isset($package)value="{{$package->name}}" @endisset placeholder="Enter Name">
                                </div>
                                @error('name')
                                <span class="invalid-feedback mt-0" @error('name')style="display: block" @enderror role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group col-sm-6 mb-2">
                                <label for="image">Banner Image</label>
                                <input type="file" class="form-control" name="image" id="image" accept="image/png, image/jpg, image/jpeg, image/webp">
                                @isset($package)
        @if(!empty($package->image))
            <img src="{{ asset($package->image) }}" alt="Existing Icon" style="max-width: 100px;">
        @else
            <img src="{{ asset('facility_images/no-image.png') }}" alt="Default Icon" style="max-width: 100px;">
        @endif
    @endisset
                            </div>


                            <div class="form-group col-sm-6 mb-2">
                                <label for="">Nights<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" required class="form-control" name="nights" @isset($package)value="{{$package->nights}}" @endisset placeholder="Enter Nights" min="0">
                                </div>
                                @error('nights')
                                <span class="invalid-feedback mt-0" @error('nights')style="display: block" @enderror role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6 mb-2">
                                <label for="">Price<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" required class="form-control" name="price" @isset($package)value="{{$package->price}}" @endisset placeholder="Enter Price">
                                </div>
                                @error('price')
                                <span class="invalid-feedback mt-0" @error('price')style="display: block" @enderror role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


{{--                            <div class="form-group col-sm-6 mb-2">--}}
{{--                                <label for="description">Description</label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <textarea class="form-control" name="description" id="description" placeholder="Enter Description">@isset($package){{$package->description}}@endisset</textarea>--}}
{{--                                </div>--}}
{{--                                @error('description')--}}
{{--                                <span class="invalid-feedback mt-0" style="display: block" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                                </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}


{{--                            <div class="form-group col-sm-6 mb-2">--}}
{{--                                <label for=""> Hotel<span class="text-danger">*</span></label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <select required class="form-control" name="hotel_id">--}}
{{--                                        <option value="">Select Hotel</option>--}}
{{--                                        @foreach ($hotels as $hotel)--}}
{{--                                            <option value="{{ $hotel->id }}" @isset($package) @if ($package->hotel_id == $hotel->id) selected @endif @endisset>{{ $hotel->name }}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                @error('hotel_id')--}}
{{--                                <span class="invalid-feedback mt-0" @error('hotel_id') style="display: block" @enderror role="alert">--}}
{{--                    <strong>{{ $message }}</strong>--}}
{{--                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}

                            <div class="form-group col-sm-6 mb-2">
                                <label for=""> Category<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <select required class="form-control" name="category_id">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @isset($package) @if ($package->category_id == $category->id) selected @endif @endisset>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                <span class="invalid-feedback mt-0" @error('category_id') style="display: block" @enderror role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>


                            <div class="form-group col-sm-6 mb-2">
                                <label for=""> Package Star<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <select required class="form-control" name="star">
                                        <option value="">Select Star</option>
                                        <option value="3" @isset($package) @if ($package->star == 3) selected @endif @endisset>3 Star</option>
                                        <option value="4" @isset($package) @if ($package->star == 4) selected @endif @endisset>4 Star</option>
                                        <option value="5" @isset($package) @if ($package->star == 5) selected @endif @endisset>5 Star</option>
                                    </select>
                                </div>
                                @error('star')
                                <span class="invalid-feedback mt-0" style="display: block" role="alert">
        <strong>{{ $message }}</strong>
    </span>
                                @enderror
                            </div>


                            <div class="form-group col-sm-6 mb-2">
                                <label for="">Sub Category<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <select required class="form-control" name="sub_category_id">
                                        <option value="">Select Sub Category</option>
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}" @isset($package) @if ($package->sub_category_id == $subcategory->id) selected @endif @endisset>{{ $subcategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('sub_category_id')
                                <span class="invalid-feedback mt-0" @error('sub_category_id') style="display: block" @enderror role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6 mb-2">
                                <label for="images">Images</label>
                                <input type="file" class="form-control" name="files[]" id="images"  accept="image/png, image/jpg, image/jpeg, image/webp"  multiple {{ !isset($package) ? 'required' : '' }}>

                                @if(isset($package) && $package->media->count() > 0)
                                    <div class="mt-3">
                                        @foreach($package->media as $image)
                                            <img src="{{ url($image->file) }}" alt="Image" style="width: 150px; height: 120px;">
                                        @endforeach
                                    </div>
                                @endif
                            </div>


                            <div class="form-group col-sm-6 mb-2 d-flex align-items-end">

                                <label for="switch4" data-on-label="Yes" data-off-label="No">
                                    <label for="">Status: </label>
                                    <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">

                                        <input class="form-check-input" name="status" type="checkbox" id="SwitchCheckSizelg" @if(isset($package) && $package->active == 1) checked="" @endif>
                                    </div>
                                </label>
                            </div>



                            <!-- Facilities Section -->
                            <div class="form-group col-sm-12 mb-2">
                                <label for="facilities">Facilities</label>
                                <div id="facilities-container">
                                    @php
                                        $defaultFacilities = [
                                            ['name' => 'Visa', 'status' => 0],
                                            ['name' => 'Transport', 'status' => 0],
                                            ['name' => 'Makkah', 'status' => 0],
                                            ['name' => 'Madinah', 'status' => 0],
                                            ['name' => 'Flight', 'status' => 0]
                                        ];
                                        if (isset($package)) {
                                            foreach ($package->facility as $facility) {
                                                $index = array_search($facility->name, array_column($defaultFacilities, 'name'));
                                                if ($index !== false) {
                                                    $defaultFacilities[$index]['status'] = $facility->status;
                                                    $defaultFacilities[$index]['id'] = $facility->id;
                                                } else {
                                                    $defaultFacilities[] = ['name' => $facility->name, 'status' => $facility->status, 'id' => $facility->id];
                                                }
                                            }
                                        }
                                    @endphp

                                    @foreach ($defaultFacilities as $index => $facility)
                                        <div class="input-group mb-2">
                                            <input type="hidden" name="facilities[{{ $index }}][id]" value="{{ $facility['id'] ?? '' }}">
                                            @if ($facility['status'] == 2)
                    <!-- Input for facility name if status is 2 -->
                    <input type="text" name="facilities[{{ $index }}][name]" class="form-control facility-name-input" value="{{ $facility['name'] }}" placeholder="Enter Facility Name">
                    <input type="hidden" name="facilities[{{ $index }}][status]" value="2">
                    <button type="button" class="btn btn-danger remove-facility-btn" data-id="{{ $facility['id'] ?? '' }}">-</button>
                    @else

                                            <!-- Toggle Status -->
                                            <label for="switch4" class="form-check-label d-flex align-items-center">
                                                <input class="form-check-input form-switch-lg" name="facilities[{{ $index }}][status]" type="checkbox" id="SwitchCheckSizelg-{{ $index }}" value="1" {{ $facility['status'] == 1 ? 'checked' : '' }}>
                                                <span class="ms-2">{{ $facility['name'] }}</span>
                                            </label>
                                            <input type="hidden" name="facilities[{{ $index }}][name]" value="{{ $facility['name'] }}">
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Button to Add More Facilities -->
                                <button type="button" class="btn btn-success add-facility-btn">Add Facility</button>
                                @error('facilities')
                                <span class="invalid-feedback mt-0" style="display: block" role="alert">
        <strong>{{ $message }}</strong>
    </span>
                                @enderror
                                <input type="hidden" id="removed-facilities" name="removed_facilities">
                            </div>
                            <!-- Facilities Section -->


                            <!-- Services Section -->
                            <div class="form-group col-sm-12 mb-2">
                                <label for="services">Services(Select Hotel)</label>
                                <div id="services-container">
                                    @isset($package)
                                        @foreach($package->service as $index => $service)
                                            <div class="input-group mb-2">
                                                <input type="hidden" name="services[{{ $index }}][id]" value="{{ $service->id }}">
                                                <input type="text" name="services[{{ $index }}][name]" class="form-control" value="{{ $service->name }}" placeholder="Enter Service Name">
                                                <select required class="form-control" name="services[{{ $index }}][hotel_id]">
                                                    <optgroup label="Select Makkah Hotels">
                                                    @foreach ($makkahhotels as $makkahhotel)
                                                        <option value="{{ $makkahhotel->id }}"  @if ($service->hotel_id == $makkahhotel->id) selected @endif >{{ $makkahhotel->name }}</option>
                                                    @endforeach
                                                    </optgroup>

                                                    <optgroup label="Select Madina Hotels">
                                                        @foreach ($madinahotels as $madinahotel)
                                                            <option value="{{ $madinahotel->id }}"  @if ($service->hotel_id == $madinahotel->id) selected @endif >{{ $madinahotel->name }}</option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                                <button type="button" class="btn btn-danger remove-service-btn" data-id="{{ $service->id }}">-</button>
                                            </div>
                                        @endforeach
                                    @endisset
                                </div>
                                <button type="button" class="btn btn-success add-service-btn">Add Service</button>
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
        var makkahhotels = @json($makkahhotels);
        var madinahotels = @json($madinahotels);
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Function to add event listeners to remove buttons
            function attachRemoveEventListeners() {
                document.querySelectorAll('.remove-facility-btn').forEach(button => {
                    button.removeEventListener('click', handleRemoveFacility); // Remove any existing listeners to avoid duplication
                    button.addEventListener('click', handleRemoveFacility);
                });
            }

            // Remove facility button event handler
            function handleRemoveFacility() {
                const facilityId = this.getAttribute('data-id');
                if (facilityId) {
                    let removedFacilities = document.getElementById('removed-facilities').value;
                    removedFacilities = removedFacilities ? removedFacilities.split(',') : [];
                    removedFacilities.push(facilityId);
                    document.getElementById('removed-facilities').value = removedFacilities.join(',');
                }
                this.closest('.input-group').remove();
            }

            // Add facility button event
            document.querySelector('.add-facility-btn').addEventListener('click', function () {
                const facilitiesContainer = document.getElementById('facilities-container');
                const index = facilitiesContainer.children.length;

                const facilityTemplate = `
            <div class="input-group mb-2">
                <input type="hidden" name="facilities[${index}][id]" value="">
               <input type="hidden" name="facilities[${index}][status]" value="2">
                <input type="text" name="facilities[${index}][name]" class="form-control facility-name-input" placeholder="Enter Facility Name" required>
                <button type="button" class="btn btn-danger remove-facility-btn">-</button>
            </div>
        `;

                facilitiesContainer.insertAdjacentHTML('beforeend', facilityTemplate);

                const newStatusSelect = facilitiesContainer.querySelector(`select[name="facilities[${index}][status]"]`);
                newStatusSelect.addEventListener('change', function () {
                    toggleFacilityNameInput(index, this.value);
                });

                // Attach event listener to the new remove button
                attachRemoveEventListeners();
            });

            // Attach event listeners to existing remove buttons
            attachRemoveEventListeners();

        });
    </script>





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

                // Create hotel options dynamically
                var makkahOptions = '<optgroup label="Select Makkah Hotels">';
                makkahhotels.forEach(function(hotel) {
                    makkahOptions += `<option value="${hotel.id}">${hotel.name}</option>`;
                });
                makkahOptions += '</optgroup>';

                // Create hotel options dynamically for Madinah hotels
                var madinahOptions = '<optgroup label="Select Madinah Hotels">';
                madinahotels.forEach(function(hotel) {
                    madinahOptions += `<option value="${hotel.id}">${hotel.name}</option>`;
                });
                madinahOptions += '</optgroup>';

                newServiceInput.innerHTML = `
                <input type="hidden" name="services[${newIndex}][id]">
                <input type="text" name="services[${newIndex}][name]" class="form-control" placeholder="Enter Services Name" required>
         <select name="services[${newIndex}][hotel_id]" class="form-control status-dropdown">
                    ${makkahOptions}
                    ${madinahOptions}
                </select>
                <button type="button" class="btn btn-danger remove-service-btn">-</button>
            `;
                container.appendChild(newServiceInput);

                addRemoveButtonEventListener(newServiceInput.querySelector('.remove-service-btn'));

            });
            });



    </script>
@endsection
