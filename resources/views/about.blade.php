@extends('layouts.web')
@section('title', 'CAST interenational FZCO')

@section('content')
    <main class="about-page">
        <div class="page-top">
            <div class="container">
                <div class="page-top__inner">

                    <a href="#" class="page-top__logo">
                        <!-- <img src="images/logo.png" alt=""> -->
                    </a>
                </div>
            </div>
        </div>

        <div class="text">
            <div class="container">
                <h1 class="page-top__title ir-bold">About company</h1>

            </div>
        </div>

        @if (isset($about->img))
            <div class="container">
                <div class="img">
                    <img src="{{ asset('uploads/about/' . $about->img) }}" alt="">
                </div>
            </div>
        @endif

        <div class="text">
            <div class="container">

            </div>
        </div>

        @if (isset($about->desc))
            <div class="text">
                <div class="container">
                    {!! isset($about->desc[$lang]) ? $about->desc[$lang] : $about->desc['en'] !!}
                </div>
            </div>
        @endif

        {{-- <div class="text">
            <div class="container">
                The strategic goal of the company: the widespread introduction of geoinformation technologies in the life of
                society, business and government to improve the efficiency of management decisions.
            </div>
        </div>

        <div class="text">
            <div class="container">
                The main area of ​​interest of the company: the latest information technology. The CAST interenational FZCO
                company offers innovative approaches, working on further improvement and development of technologies based
                on integrated server geoinformation solutions and cloud computing.
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
