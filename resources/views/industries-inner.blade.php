@extends('layouts.web')

@section('content')
    <main class="industries-inner-page">
        <div class="top">
            <div class="container">
                <div class="top__inner">
                    <h1 class="top__title ir-bold">
                        <a href="{{ route('industries') }}" class="top__link">
                            <img src="{{ asset('images/arrow-left-red.svg') }}" alt="">
                        </a>
                        {{ $industriescategories->title['ru'] }}
                    </h1>
                    <p class="top__text">{!! $industriescategories->subtitle['ru'] !!}</p>
                </div>
            </div>
        </div>

        @if (isset($industries[0]))
            <div class="cards">
                <div class="container">
                    <div class="cards__inner">
                        @foreach ($industries as $industry)
                            <a href="{{ route('industries-show', ['id' => $industry->id]) }}" class="card">
                                @if (isset($industry->img))
                                    <div class="card__img">
                                        <img src="{{ asset('uploads/industrie/' . $industry->img) }}" alt="">
                                    </div>
                                @endif
                                @if (!isset($industry->img))
                                    <div class="card__img">
                                        <img src="{{ asset('uploads/industrie/default-image-720x530.jpg') }}" alt="">
                                    </div>
                                @endif
                                @if (isset($industry->title))
                                    <h6 class="card__title ir-bold">
                                        {{ $industry->title['ru'] }}
                                        <img src="{{ asset('images/arrow-right-black.svg') }}" alt="">
                                    </h6>
                                @endif
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </main>

@endsection
