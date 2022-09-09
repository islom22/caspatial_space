@extends('layouts.web')

@section('title', 'CAST interenational FZCO')

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

        @if (isset($news[0]))
            <div class="cards">
                <div class="container">
                    <div class="cards__inner">
                        @foreach ($news as $item)
                            <a href="{{ route('news_inner', ['id' => $item->id]) }}" class="card" style="border: none  !important;">
                                @if (isset($item->img))
                                    <div class="card__img">
                                        <img src="{{ asset('uploads/news/' . $item->img) }}" alt="">
                                    </div>
                                @else
                                    <div class="card__img">
                                        <img src="{{ asset('upload/service/default-image-720x530.jpg') }}" alt="">
                                    </div>
                                @endif
                                @if (isset($item->date))
                                    <p class="card__date">
                                        {{-- {{ $item->date }} --}}
                                        {{date('d.m.Y', strtotime($item->date))}}
                                    </p>
                                @endif
                                @if (isset($item->title))
                                    <h6 class="card__title ir-bold ">
                                        {{ isset($item->title[$lang]) ? $item->title[$lang] : $item->title['en'] }}
                                        <img src="{{ asset('images/arrow-right-red-small.svg') }}" alt="">
                                    </h6>
                                @endif
                            </a>
                        @endforeach
                    </div>
                    <div class="mt-4" style="    margin-block-start: 1em;
                    margin-block-end: 1em;
                    margin-inline-start: 0px;
                    margin-inline-end: 0px;
                    padding-inline-start: 40px;
                    }">
                        {!! $news->links() !!}
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
