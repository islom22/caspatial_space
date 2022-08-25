@extends('layouts.web')

@section('content')
    <main class="industries-inner-page">
        <div class="page-top">
            <div class="container">
                <div class="page-top__inner">
                    @if (isset($industries->title))
                        <h1 class="page-top__title ir-bold">{{ $industries->title['ru'] }}</h1>
                    @endif
                    {{-- @if (isset($industries->subtitle))
                        <p class="page-top__text">{{ $industries->subtitle['ru'] }}</p>
                    @endif --}}
                </div>
            </div>
        </div>

        @if (isset($industries->img))
            <div class="container">
                <div class="img">
                    <img src="{{ asset('uploads/industrie/' . $industries->img) }}" alt="">
                </div>
            </div>
        @endif
        @if (!isset($industries->img))
            <div class="container">
                <div class="img">
                    <img src="{{asset('uploads/industrie/default-image-720x530.jpg') }}" alt="">
                </div>
            </div>
        @endif
        {{-- <div class="text">
            <div class="container">
                Remote sensing of the Earth (Space monitoring) is the regular receipt of information about the state of the
                earth's surface from spacecraft. Regular remote sensing of the Earth (ERS) helps to track natural processes,
                natural disasters, as well as changes caused by human and animal activities.
                Modern radar devices make it possible to observe the earth's surface at any time of the day, regardless of
                the state of the atmosphere.
            </div>
        </div> --}}

        {{-- <div class="text">
            <div class="container">
                Remote sensing of the Earth (Regular space monitoring) is an effective way to detect forest fires. Satellite
                systems take pictures in the infrared spectrum. This allows you to determine the temperature difference and
                identify thermal points - ignition sources. The images are processed and georeferenced. As a result, it is
                possible to determine the boundaries of the spread of fire. Another popular area is environmental
                monitoring, during which it is possible to identify.
            </div>
        </div> --}}

        {{-- <div class="text">
            <div class="container">
                Satellite images cover a large area at a time. Remote methods are suitable for the study of remote and
                hard-to-reach areas where it is impossible to reach by transport.
            </div>
        </div> --}}

        {{-- @if (isset($industries->desc))
            <div class="text">
                <div class="container">
                    {!! $industries->desc['ru'] !!}
                </div>
            </div>
        @endif --}}

        {{-- <div class="text">
            <div class="container">
                Remote sensing of the Earth (Space monitoring) is the regular receipt of information about the state of the
                earth's surface from spacecraft. Regular remote sensing of the Earth (ERS) helps to track natural processes,
                natural disasters, as well as changes caused by human and animal activities.
                Modern radar devices make it possible to observe the earth's surface at any time of the day, regardless of
                the state of the atmosphere.
            </div>
        </div> --}}
    </main>
@endsection
