@extends('layouts.web')

@section('content')
    <main class="services-inner-page">
        <div class="page-top">
            <div class="container">
                <div class="page-top__inner">
                    @if (isset($services->title))
                        <h1 class="page-top__title ir-bold">{{ $services->title['ru'] }}</h1>
                    @endif
                    @if (isset($services->subtitle))
                        <p class="page-top__text">{{ $services->subtitle['ru'] }}</p>
                    @endif
                </div>
            </div>
        </div>

        @if (isset($services->serviceImage[0]->img))
            <div class="container">
                <div class="img">
                    <img src="{{ asset($services->serviceImage[0]->img) }}" alt="">
                </div>
            </div>
        @endif
        @if (!isset($services->serviceImage[0]->img))
            <div class="container">
                <div class="img">
                    <img src="{{ asset('upload/service/default-image-720x530.jpg') }}" alt="">
                </div>
            </div>
        @endif


        @if (isset($services->desc))
            <div class="text">
                <div class="container">
                    {!! $services->desc['ru'] !!}
                </div>
            </div>
        @endif

        @if (isset($services->serviceImage[1]->img))
            <div class="container">
                <div class="img">
                    <img src="{{ asset($services->serviceImage[1]->img) }}" alt="">
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
    </main>
@endsection
