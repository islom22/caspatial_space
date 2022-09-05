@extends('layouts.web')
@section('title', 'CAST interenational FZCO')

@section('content')
    <main class="services-inner-page">
        @if (isset($services->title) || isset($services->subtitle))
            <div class="page-top">
                <div class="container">
                    <div class="page-top__inner">
                        @if (isset($services->title))
                            <h1 class="page-top__title ir-bold">{{ isset($services->title[$lang]) ? $services->title[$lang] : $services->title['en'] }}</h1>
                        @endif
                        @if (isset($services->subtitle))
                            <p class="page-top__text">{{ isset($services->subtitle[$lang]) ? $services->subtitle[$lang] : $services->subtitle['en'] }}</p>
                        @endif
                    </div>
                </div>
            </div>
        @endif

        @if (isset($services->serviceImage[0]->img))
            <div class="container">
                <div class="img">
                    <img src="{{ asset($services->serviceImage[0]->img) }}" alt="">
                </div>
            </div>
        @endif
        {{-- @if (!isset($services->serviceImage[0]->img))
            <div class="container">
                <div class="img">
                    <img src="{{ asset('upload/service/default-image-720x530.jpg') }}" alt="">
                </div>
            </div>
        @endif --}}


        @if (isset($services->desc))
            <div class="text">
                <div class="container">
                    {!! isset($services->desc[$lang]) ? $services->desc[$lang] : $services->desc['en'] !!}
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
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script type="text/javascript">
        @if (Session::has('message'))
            const notyf = new Notyf({
                position: {
                    x: 'right',
                    y: 'top',
                },
                types: [{
                    type: 'info',
                    background: '#0948B3'
                }]
            });
            notyf.open({
                type: 'info',
                message: '{{ Session::get('message') }}'
            });
        @endif
    </script>
@endsection
