@extends('layouts.web')

@section('content')
    <main class="news-page">
        <div class="page-top">
            <div class="container">
                <div class="page-top__inner">
                    <h1 class="page-top__title ir-bold">News</h1>
                    <a href="#" class="page-top__logo">
                        <!-- <img src="images/logo.png" alt=""> -->
                    </a>
                </div>
            </div>
        </div>

        <div class="cards">
            <div class="container">
                <div class="cards__inner">
                    @foreach($news as $item)
                    <a href="{{ route('news_inner', ['id' => $item->id]) }}" class="card">
                        <div class="card__img">
                            <img src="{{ asset('uploads/news/' . $item->img) }}" alt="">
                        </div>
                        <p class="card__date">
                            {{ $item->date }}
                        </p>
                        <h6 class="card__title ir-bold">
                            {{ $item->title['ru'] }}
                            <img src="{{ asset('images/arrow-right-red-small.svg') }}" alt="">
                        </h6>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
