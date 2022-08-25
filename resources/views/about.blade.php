@extends('layouts.web')

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
                    {{ $about->desc }}
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
@endsection
