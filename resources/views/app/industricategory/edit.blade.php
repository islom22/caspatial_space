@extends('layouts.app')

@section('content')
    <h1 class="text-uppercase mt-5">Industry Categories</h1>

    <div class="headcrumbs d-flex mb-3">
        <a href="{{ route('industricategories.index') }}" class="d-flex text-uppercase me-2" style="opacity:25%">Industry
            Category</a> >> <a class="d-flex text-uppercase ms-2">Edit</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3  fileUploadBlock">
                <p style="font-weight: 600" class="mb-2">Icon </p>
                <div class="d-flex flex-wrap previewFiles" id="images">
                    @csrf
                    {{-- @foreach ($product->productImage as $products) --}}
                    @if (!($industricategory->icon == null))
                        {{-- <form action="{{ route('delete-icon') }}" method="POST">
                        @csrf --}}
                        {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
                        <div id="full_image" class="d-flex align-items-center justify-content-center me-2"
                            style="width: 100px; height: 100px; background-color: #eeeeee82; border-radius: 12px; border: 1px dashed #ccc; cursor: pointer; position: relative ">
                            <input type="hidden" name="id" value="{{ $industricategory->id }}">
                            @if ($industricategory)
                                <img src="{{ asset('uploads/icon/' . $industricategory->icon) }}" alt=""
                                    style="height: 100%; width:100%; border-radius: 12px;object-fit: cover;">
                            @endif
                            <input type="hidden" name="icon[]">
                            <button class=" delete btn-delete btn btn-danger rmFile" type="submit"
                                data-id="{{ $industricategory->id }}" data-token="{{ csrf_token() }}"
                                style="position: absolute;top: -7px;padding: 0.15rem 0.55rem;right: -7px;"><i
                                    class="fas fa-times"></i></button>
                        </div>
                        {{-- </form> --}}
                    @endif
                    {{-- @endforeach --}}
                    <div id="empty_image">
                        @if ($industricategory->icon == null)
                            {{-- <form action="{{ route('upload-icon') }}" method="POST" enctype="multipart/form-data">
                            @csrf --}}
                            <input type="hidden" name="id" value="{{ $industricategory->id }}">
                            <input name="icon" id="add_icon" type="file"
                                class="form-control btn-update fileUploadInput" data-id="{{ $industricategory->id }}"
                                data-token="{{ csrf_token() }}" {{-- onchange="this.form.submit()" --}}
                                style="position: fixed;
                                        opacity: 0;
                                        z-index: -1;">

                            <label for="add_icon" class="d-flex align-items-center justify-content-center openFileDialog"
                                style="width: 100px; height: 100px; background-color: #eeeeee82; border-radius: 12px; border: 1px dashed #ccc; cursor: pointer">
                                <i class="fas fa-plus fa-2x" style="color: #2a313b;"></i>
                            </label>
                            {{-- </form> --}}
                        @endif
                    </div>
                </div>
                <input class="form-control fileUploadInput" type="file" style="display: none" name="icon[] ">
            </div>
            <form action="{{ route('industricategories.update', ['industricategory' => $industricategory]) }}"
                method="post" enctype='multipart/form-data'>
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="card border-0 shadow components-section">
                            <div class="card-body">
                                <nav>
                                    <div class="nav nav-tabs border-bottom mb-3" id="nav-tab" role="tablist">
                                        @foreach ($languages as $language)
                                            <button class="nav-link border-bottom" id="{{ $language->lang }}-tab"
                                                data-bs-toggle="tab" data-bs-target="#{{ $language->lang }}" type="button"
                                                role="tab" aria-controls="{{ $language->lang }}"
                                                aria-selected="true">{{ $language->lang }}</button>
                                        @endforeach
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    @foreach ($languages as $language)
                                        <div class="tab-pane fade" id="{{ $language->lang }}" role="tabpanel"
                                            aria-labelledby="{{ $language->lang }}-tab">
                                            <div class="row mb-4">
                                                <div class="col-12">
                                                    <!-- Form -->
                                                    <div class="mb-4">
                                                        <label for="email">Title</label>
                                                        @if (isset($industricategory->title[$language->small]))
                                                            <input type="text" class="form-control"
                                                                name="title[{{ $language->small }}]" placeholder="title"
                                                                value="{{ old('title.' . $language->small) ? old('title.' . $language->small) : $industricategory->title[$language->small] }}">
                                                        @else
                                                            <input type="text" class="form-control"
                                                                name="title[{{ $language->small }}]" placeholder="title"
                                                                value="{{ old('title.' . $language->small) }}">
                                                        @endif
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="textarea">Subtitle</label>
                                                        @if (isset($industricategory->subtitle[$language->small]))
                                                            <textarea class="form-control ckeditor" placeholder="Enter your description..." rows="4"
                                                                name="subtitle[{{ $language->small }}]">{{ old('subtitle.' . $language->small, $industricategory->subtitle[$language->small]) }}</textarea>
                                                        @else
                                                            <textarea type="text" class="form-control ckeditor" id="subtitle" name="subtitle[{{ $language->small }}]"
                                                                placeholder="subtitle" value="{{ old('subtitle.' . $language->small) }}">{{ old('subtitle.' . $language->small) }}</textarea>
                                                        @endif
                                                    </div>
                                                    <!-- End of Form -->
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                {{-- <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <label for="">Icons</label>
                                            <input type="text" class="form-control" 
                                                name="icon" placeholder="icon"
                                                value="{{ old('icon', $industricategory->icon) }}">
                                        </div>
                                    </div>
                                </div> --}}
                                <button class="btn btn-success px-5 text-white" type="submit"
                                    style="padding:12px">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function selectValue(val, key) {
            if (key == 0) {
                document.getElementById('exampleFormControlSelect1').value = val.value;
            } else document.getElementById('exampleFormControlSelect0').value = val.value;
        }

        function Icon(val, key) {
            if (key == 0) {
                document.getElementById('icon1').value = val.value;
            } else document.getElementById('icon0').value = val.value;
        }
    </script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $(document).on('click', '.btn-delete', function() {
                const id = $(this).data('id');
                var token = $(this).data("token");
                if (id) {


                    $.ajax({
                        url: "/admin/delete-icon",
                        type: 'POST',
                        dataType: "JSON",
                        data: {
                            "id": id,
                            "_method": 'POST',
                            "_token": token,
                        },
                        complete: function() {
                            $("#images").load(
                                'http://localhost:8000/admin/industricategories/' + id +
                                '/edit #images');

                        }
                    });
                }
            });


            $(document).on('change', '.btn-update', function() {
                const id = $(this).data('id');
                var token = $(this).data("token");
                var icon = $('#add_icon')[0].files;

                const formData = new FormData();

                formData.append("id", id);
                formData.append("_token", token);
                formData.append("_method", "POST");
                formData.append("icon", icon[0]);
                console.log(icon)
                if (id) {

                    $.ajax({
                        url: "/admin/upload-icon",
                        type: 'POST',
                        dataType: "JSON",
                        data: formData,
                        contentType: false,
                        processData: false,
                        complete: function() {

                            $("#images").load(
                                'http://localhost:8000/admin/industricategories/' + id +
                                '/edit #images');
                        }
                    });
                }
            });

        })
    </script>
@endsection
