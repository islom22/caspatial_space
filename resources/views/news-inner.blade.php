@extends('layouts.web')
@section('title', 'CAST interenational FZCO')

@section('content')
    <main class="services-inner-page">
        @if (isset($new->title) || isset($new->date))
            <div class="page-top">
                <div class="container">
                    <div class="page-top__inner">
                        @if (isset($new->title))
                            <h1 class="page-top__title ir-bold">{{ isset($new->title[$lang]) ? $new->title[$lang] : $new->title['en']  }}</h1>
                        @endif
                        @if (isset($new->date))
                            <p class="page-top__text">{{date('d.m.Y', strtotime($new->date))}}</p>
                        @endif
                    </div>
                </div>
            </div>
        @endif

        @if (isset($new->img))
            <div class="container">
                <div class="img">
                    <img src="{{ asset('uploads/news/' . $new->img) }}" alt="">
                </div>
            </div>
        @endif

        @if (isset($new->desc))
            <div class="text">
                <div class="container">
                    {!! isset($new->desc[$lang]) ? $new->desc[$lang] : $new->desc['en'] !!}
                </div>
            </div>
        @endif


        {{-- <main class="about-page">
    <div class="page-top">
      <div class="container">
        <div class="page-top__inner">
          
          <a href="#" class="page-top__logo">
            <!-- <img src="images/logo.png" alt=""> -->
          </a>
        </div>
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
