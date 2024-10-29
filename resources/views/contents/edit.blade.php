@extends('layouts.app')
@isset($content)
    @section('title', 'Edit Content')
@else
    @section('title', 'Add New Content')
@endisset
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    @isset($content)
                        <h4 class="mb-sm-0 font-size-18">Edit  Content</h4>
                    @else
                        <h4 class="mb-sm-0 font-size-18">Add New Content</h4>
                    @endisset
                    {{--                {{ $errors }}--}}
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Contents</li>
                            @isset($content)
                                <li class="breadcrumb-item active">Edit Content</li>
                            @else
                                <li class="breadcrumb-item active">Add New Content</li>
                            @endisset
                        </ol>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="card p-4 rounded cShadow container-fluid">
        @isset($content)
            <form action="{{ route('update.content', $content->id) }}" method="post" enctype="multipart/form-data">
                @else
                    <form action="{{ route('insert.content') }}" method="post" enctype="multipart/form-data">
                        @endisset
                        @csrf


                        <div class="row">

                            <div class="form-group col-sm-6 mb-2">
                                <label for="">Name<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" required class="form-control" name="name" @isset($content)value="{{$content->name}}" @endisset placeholder="Enter Name">
                                </div>
                                @error('name')
                                <span class="invalid-feedback mt-0" @error('name')style="display: block" @enderror role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group col-sm-6 mb-2">
                                <label for="image"> Image</label>
                                <input type="file" class="form-control" name="image" id="image" accept="image/png, image/jpg, image/jpeg, image/webp">
                                @isset($content)
        @if(!empty($content->image))
            <img src="{{ asset($content->image) }}" alt="Existing Icon" style="max-width: 100px;">
        @else
            <img src="{{ asset('facility_images/no-image.png') }}" alt="Default Icon" style="max-width: 100px;">
        @endif
    @endisset
                            </div>



                            <div class="form-group col-sm-6 mb-2">
                                <label for=""> Page Content<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <select required class="form-control" name="page">
                                        <option value="">Select Page</option>
                                        <option value="listing" @isset($content) @if ($content->page =="listing" ) selected @endif @endisset>Listing Page</option>
                                        <option value="detail" @isset($content) @if ($content->page == "detail") selected @endif @endisset>Package Detail</option>
                                        <option value="flight" @isset($content) @if ($content->page == "flight") selected @endif @endisset>Flight Page</option>
                                        <option value="hajj" @isset($content) @if ($content->page == "hajj") selected @endif @endisset>Hajj Page</option>
                                    </select>
                                </div>
                                @error('star')
                                <span class="invalid-feedback mt-0" style="display: block" role="alert">
        <strong>{{ $message }}</strong>
    </span>
                                @enderror
                            </div>



                            <div class="form-group col-sm-12 mb-2">
                                <label for="description">Description</label>
                                <div class="input-group">
                                    <textarea class="form-control" name="description" id="description" placeholder="Enter Description">@isset($content){{$content->description}}@endisset</textarea>
                                </div>
                                @error('description')
                                <span class="invalid-feedback mt-0" style="display: block" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>



                            <div class="form-group col-sm-6 mb-2 d-flex align-items-end">

                                <label for="switch4" data-on-label="Yes" data-off-label="No">
                                    <label for="">Status: </label>
                                    <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">

                                        <input class="form-check-input" name="status" type="checkbox" id="SwitchCheckSizelg" @if(isset($content) && $content->active == 1) checked="" @endif>
                                    </div>
                                </label>
                            </div>





                            <div class="form-group col-sm-12 mb-2">
                                <input type="submit" value="Submit" class="btn btn-primary btn-sm">
                            </div>

                        </div>
                    </form>
    </div>




    <script src="{{ asset('assets/libs/tinymce/tinymce.min.js') }}"></script>

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
                        var existingData = `{!! isset($content) ? $content->description : '' !!}`;
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

            function openImagePickerDialog(callback) {
                // Create an input element dynamically to select images
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function() {
                    var file = this.files[0];
                    var reader = new FileReader();

                    reader.onload = function() {
                        // When the file is loaded, call the callback with the file URL
                        callback(reader.result, {
                            alt: file.name
                        });
                    };

                    // Read the file as a data URL
                    reader.readAsDataURL(file);
                };

                // Trigger the file input click
                input.click();
            }
        });
    </script>


@endsection
