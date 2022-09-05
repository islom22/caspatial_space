@extends('layouts.web')
@section('title', 'CAST interenational FZCO')

@section('content')
    <main class="industries-inner-page">
        @if (isset($industriescategories->subtitle) || isset($industriescategories->title))
            <div class="top">
                <div class="container">
                    <div class="top__inner">
                        @if (isset($industriescategories->title))
                            <h1 class="top__title ir-bold">
                                <a href="{{ route('industries') }}" class="top__link">
                                    <img src="{{ asset('images/arrow-left-red.svg') }}" alt="">
                                </a>
                                {{ isset($industriescategories->title[$lang]) ? $industriescategories->title[$lang] : $industriescategories->title['en'] }}
                            </h1>
                        @endif
                        @if (isset($industriescategories->subtitle))
                            <p class="top__text">{!!  isset($industriescategories->subtitle[$lang]) ? $industriescategories->subtitle[$lang] : $industriescategories->subtitle['en']  !!}</p>
                        @endif
                    </div>
                </div>
            </div>
        @endif

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
                                        <img src="{{ asset('uploads/industrie/default-image-720x530.jpg') }}"
                                            alt="">
                                    </div>
                                @endif
                                @if (isset($industry->title))
                                    <h6 class="card__title ir-bold">
                                        {{ isset($industry->title[$lang]) ? $industry->title[$lang] : $industry->title['en'] }}
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
