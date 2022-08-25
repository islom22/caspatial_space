@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mt-5">Industry</h1>

    <div class="headcrumbs d-flex mb-3">
        <a href="{{ route('industries.index') }}" class="d-flex text-uppercase me-2" style="opacity:25%">Industry</a> >> <a class="d-flex text-uppercase ms-2">Add category</a>
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

    <form action="{{ route('industries.store') }}" method="post" enctype='multipart/form-data'>
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
                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <!-- Form -->
                                            <div class="mb-2">
                                                <label for="email">Title</label>
                                                <input type="text" class="form-control" name="title[{{ $language->small }}]" placeholder="title" value="{{ old('title.'.$language->small) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row mb-2">  
                            <div class="col-12">
                                <div>
                                    <label for="">Category_id</label>
                                    <select class="form-control" name="industryCategory_id">
                                        @foreach ($industriescategories as $category)
                                            <option value="{{ $category->id }}" @if(old('industryCategory_id') == $category->id) selected @endif>
                                                {{ $category->title['ru'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Photo</label>
                                    <input class="form-control" type="file" name="img" accept="image/*">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success px-5 text-white" type="submit" style="padding:12px">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


@endsection
