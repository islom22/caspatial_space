@extends('layouts.web')
@section('title', 'CAST interenational FZCO')

@section('content')
    <main class="industries-inner-page">
        @if (isset($industries->title))
            <div class="page-top">
                <div class="container">
                    <div class="page-top__inner">
                        <h1 class="page-top__title ir-bold">{{ isset($industries->title[$lang]) ? $industries->title[$lang] : $industries->title['en'] }}</h1>
                        {{-- @if (isset($industries->subtitle))
                            <p class="page-top__text">{{ $industries->subtitle['ru'] }}</p>
                            @endif --}}
                    </div>
                </div>
            </div>
        @endif

        @if (isset($industries->img))
            <div class="container">
                <div class="img">
                    <img src="{{ asset('uploads/industrie/' . $industries->img) }}" alt="">
                </div>
            </div>
        @endif
        {{-- @if (!isset($industries->img))
            <div class="container">
                <div class="img">
                    <img src="{{ asset('uploads/industrie/default-image-720x530.jpg') }}" alt="">
                </div>
            </div>
        @endif --}}
        @if (isset($industries->desc))
            <div class="text">
                <div class="container">
                    {!! isset($industries->desc[$lang]) ? $industries->desc[$lang] : $industries->desc['en'] !!}
                </div>
            </div>
        @endif

       
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
