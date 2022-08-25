@extends('layouts.web')

@section('content')
    <main class="industries-page">
        <div class="page-top">
            <div class="container">
                <div class="page-top__inner">
                    <h1 class="page-top__title ir-bold">Areas of use</h1>
                    <a href="#" class="page-top__logo">
                        <!-- <img src="images/logo.png" alt=""> -->
                    </a>
                </div>
            </div>
        </div>

        @if (isset($industriescategories[0]))
            <div class="industries__items">
                <div class="container">
                    <div class="industries__items-inner">
                        @foreach ($industriescategories as $industricategory)
                            <a href="{{ route('industries-inner', ['industryCategory_id' => $industricategory->id]) }}" class="industries__item">
                                @if (isset($industricategory->icon))
                                    <div class="industries__item-icon">
                                        <img src="{{ asset('uploads/icon/' . $industricategory->icon) }}" alt="">
                                    </div>
                                @endif
                                @if (isset($industricategory->title))
                                    <h6 class="industries__item-title ir-bold">{{ $industricategory->title['ru'] }}
                                    </h6>
                                @endif
                                @if (isset($industricategory->subtitle))
                                    <p class="industries__item-text">{!! $industricategory->subtitle['ru'] !!}</p>
                                @endif
                                <div class="industries__item-link">
                                    <img src="{{ asset('images/arrow-right-red.svg') }}" alt="">
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </main>
@endsection
