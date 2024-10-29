@extends('layouts.app')
@isset($category)
    @section('title', 'Edit Category')
@else
    @section('title', 'Add New Category')
@endisset
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    @isset($category)
                        <h4 class="mb-sm-0 font-size-18">Edit  Category</h4>
                    @else
                        <h4 class="mb-sm-0 font-size-18">Add New Category</h4>
                    @endisset
                    {{--                {{ $errors }}--}}
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Category</li>
                            @isset($category)
                                <li class="breadcrumb-item active">Edit Category</li>
                            @else
                                <li class="breadcrumb-item active">Add New Hotel</li>
                            @endisset
                        </ol>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="card p-4 rounded cShadow container-fluid">
        @isset($category)
            <form action="{{ route('update.category', $category->id) }}" method="post" enctype="multipart/form-data">
                @else
                    <form action="{{ route('insert.category') }}" method="post" enctype="multipart/form-data">
                        @endisset
                        @csrf


                        <div class="row">

                            <div class="form-group col-sm-6 mb-2">
                                <label for="">Name<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" required class="form-control" name="name" @isset($category)value="{{$category->name}}" @endisset placeholder="Enter Name">
                                </div>
                                @error('name')
                                <span class="invalid-feedback mt-0" @error('name')style="display: block" @enderror role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6 mb-2 d-flex align-items-end">

                                <label for="switch4" data-on-label="Yes" data-off-label="No">
                                    <label for="">Status: </label>
                                    <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">

                                        <input class="form-check-input" name="status" type="checkbox" id="SwitchCheckSizelg" @if(isset($category) && $category->status == 1) checked="" @endif>
                                    </div>
                                </label>
                            </div>

         
                            
                            <!-- subcategories Section -->
                            <div class="form-group col-sm-12 mb-2">
                                <label for="subcategories">Sub Categoires</label>
                                <div id="subcategories-container">
                                    @isset($category)
                                        @foreach($category->subcategory as $index => $subcategory)
                                            <div class="input-group mb-2">
                                                <input type="hidden" name="subcategories[{{ $index }}][id]" value="{{ $subcategory->id }}">
                                                <input type="text" name="subcategories[{{ $index }}][name]" class="form-control" value="{{ $subcategory->name }}" placeholder="Enter sub category Name">
                                                <button type="button" class="btn btn-danger remove-subcategory-btn" data-id="{{ $subcategory->id }}">-</button>
                                            </div>
                                        @endforeach
                                    @endisset
                                </div>
                                <button type="button" class="btn btn-success add-subcategory-btn">Add Sub Category</button>
                                @error('subcategories')
                                <span class="invalid-feedback mt-0" style="display: block" role="alert">
        <strong>{{ $message }}</strong>
    </span>
                                @enderror
                                <input type="hidden" name="deleted_subcategories" id="deleted_subcategories">

                            </div>
                            <!-- Sub Category Section -->



                            <div class="form-group col-sm-12 mb-2">
                                <input type="submit" value="Submit" class="btn btn-primary btn-sm">
                            </div>

                        </div>
                    </form>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {


            var deletedSubcategories = [];

            // Function to attach the click event listener to the remove button
            function addRemoveButtonEventListener(button) {
                button.addEventListener('click', function() {
                    var subcategoryId = this.closest('.input-group').querySelector('input[name*="[id]"]').value; // Get the subcategory ID
                    if (subcategoryId) {
                        deletedSubcategories.push(subcategoryId);
                        document.getElementById('deleted_subcategories').value = deletedSubcategories.join(',');
                    }
                    this.closest('.input-group').remove(); // Remove the subcategory from the frontend
                });
            }

            // Add event listeners to existing remove buttons
            document.querySelectorAll('.remove-subcategory-btn').forEach(function(button) {
                addRemoveButtonEventListener(button);
            });




            document.querySelector('.add-subcategory-btn').addEventListener('click', function() {
                var container = document.getElementById('subcategories-container');
                var newIndex = container.children.length;
                var newCategoryInput = document.createElement('div');
                newCategoryInput.classList.add('input-group', 'mb-2');



                newCategoryInput.innerHTML = `
                <input type="hidden" name="subcategories[${newIndex}][id]">
                <input type="text" name="subcategories[${newIndex}][name]" class="form-control" placeholder="Enter Sub Category Name">
                     <button type="button" class="btn btn-danger remove-subcategory-btn">-</button>
            `;
                container.appendChild(newCategoryInput);

                addRemoveButtonEventListener(newCategoryInput.querySelector('.remove-subcategory-btn'));

            });
            });



    </script>
@endsection
