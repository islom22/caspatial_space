@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mt-5">Industry Categories</h1>

    <div class="headcrumbs d-flex mb-3">
        <a href="{{ route('industricategories.index') }}" class="d-flex text-uppercase me-2" style="opacity:25%">Industri Categories</a> >> <a class="d-flex text-uppercase ms-2">Add</a>
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

    <form action="{{ route('industricategories.store') }}" method="post" enctype='multipart/form-data'>
        @csrf
        <div class="row">
            <div class="col-6 mb-4">
                <div class="card border-0 shadow components-section">
                    <div class="card-body">
                        <nav>
                            <div class="nav nav-tabs border-bottom mb-4" id="nav-tab" role="tablist">
                                @foreach($languages as $language)
                                    <button class="nav-link border-bottom" id="{{ $language->lang }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $language->lang }}" type="button" role="tab" aria-controls="{{ $language->lang }}" aria-selected="true">{{ $language->lang }}</button>
                                @endforeach
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            @foreach($languages as $language)
                                <div class="tab-pane fade" id="{{ $language->lang }}" role="tabpanel" aria-labelledby="{{ $language->lang }}-tab">
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <!-- Form -->
                                            <div class="mb-4">
                                                <label for="email">Title</label>
                                                <input type="text" class="form-control" name="title[{{ $language->small }}]" placeholder="title" value="{{ old('title.'.$language->small) }}">
                                            </div>
                                            <div class="mb-4">
                                                <label for="textarea">Subtitle</label>
                                                <textarea type="text" class="form-control ckeditor" id="subtitle" name="subtitle[{{ $language->small }}]"
                                                    placeholder="subtitle" value="{{ old('subtitle.' . $language->small) }}">{{ old('subtitle.' . $language->small) }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                {{-- <div class="mb-4">
                                    <label for="">Icons</label>
                                    <input type="text" class="form-control" 
                                         name="icon"
                                        placeholder="icon" value="{{ old('icon') }}">
                                </div>    --}}
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Icon</label>
                                    <input class="form-control" value="{{ old('icon') }}" type="file" name="icon" >
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success px-5 text-white" type="submit" style="padding:12px">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

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

@endsection
