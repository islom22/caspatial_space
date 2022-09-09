@extends('layouts.web')
@section('title', 'CAST interenational FZCO')

@section('content')
    <main class="services-page" style="min-height: 60vh">
        <div class="page-top">
            <div class="container">
                <div class="page-top__inner">
                    <h1 class="page-top__title ir-bold">Services</h1>
                    <a href="#" class="page-top__logo">
                        <!-- <img src="images/logo.png" alt=""> -->
                    </a>
                </div>
            </div>
        </div>

        <div class="tabs">
            <div class="container">
                <button class="dropdown-btn ir-bold">Категории</button>
                <div class="tabs__inner">
                    <a href="#tab0" data-id="0" data-tab="tab0"
                        class="tabs__link tabs__link--active ir-regular  page-btn " onclick="openCity(this)">All
                        services</a>

                    @foreach ($servicecategories as $category)
                        @if (isset($category->title))
                            <a data-id="{{ $category->id }}" data-tab="tab{{ $category->id }}"
                                class="tabs__link ir-regular  page-btn" onclick="openCity(this)">
                                {{ isset($category->title[$lang]) ? $category->title[$lang] : $category->title['en'] }}
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        @if (isset($services[0]))
            @foreach ($servicecategories as $index => $category)
                <div id="tab{{ $category->id }}" class="ddcard " style="display: none">
                    <div class="container">
                        <div class="services__cards-inner">
                            @if ($category->service()->exists())
                                @foreach ($category->service as $service)
                                    @if (isset($service->serviceImage[0]->img))
                                        <div class="services__card"
                                            style="background-image: url({{ asset($service->serviceImage[0]->img) }})">
                                            @if (isset($service->title))
                                                <h6 class="ir-bold">
                                                    {{ isset($service->title[$lang]) ? $service->title[$lang] : $service->title['en'] }}
                                                </h6>
                                            @endif
                                            <div class="services__card-bottom">
                                                @if (isset($service->subtitle))
                                                    <p>{{ isset($service->subtitle[$lang]) ? $service->subtitle[$lang] : $service->subtitle['en'] }}
                                                    </p>
                                                @endif
                                                <a href="{{ route('services-show', ['id' => $service->id]) }}"
                                                    class="services__card-link">
                                                    <img src="{{ asset('images/arrow-right.svg') }}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                    @if (!isset($service->serviceImage[0]->img))
                                        <div class="services__card"
                                            style="background-image: url({{ asset('upload/service/default-image-720x530.jpg') }})">
                                            @if (isset($service->title))
                                                <h6 class="ir-bold">
                                                    {{ isset($service->title[$lang]) ? $service->title[$lang] : $service->title['en'] }}
                                                </h6>
                                            @endif
                                            <div class="services__card-bottom">
                                                @if (isset($service->subtitle))
                                                    <p>{{ isset($service->subtitle[$lang]) ? $service->subtitle[$lang] : $service->subtitle['en'] }}
                                                    </p>
                                                @endif
                                                <a href="{{ route('services-show', ['id' => $service->id]) }}"
                                                    class="services__card-link">
                                                    <img src="{{ asset('images/arrow-right.svg') }}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @endif


        @if (isset($services[0]))
            <div id="tab0" class="ddcard services__cards--active page-btn">
                <div class="container images_service">
                    <div class="services__cards-inner images_services">
                        @foreach ($services as $service)
                            @if (isset($service->serviceImage[0]->img))
                                <div class="services__card"
                                    style="background-image: url({{ asset($service->serviceImage[0]->img) }})">
                                    @if (isset($service->title))
                                        <h6 class="ir-bold">
                                            {{ isset($service->title[$lang]) ? $service->title[$lang] : $service->title['en'] }}
                                        </h6>
                                    @endif
                                    <div class="services__card-bottom">
                                        @if (isset($service->subtitle))
                                            <p>{{ isset($service->subtitle[$lang]) ? $service->subtitle[$lang] : $service->subtitle['en'] }}
                                            </p>
                                        @endif
                                        <a href="{{ route('services-show', ['id' => $service->id]) }}"
                                            class="services__card-link">
                                            <img src="{{ asset('images/arrow-right.svg') }}" alt="">
                                        </a>
                                    </div>
                                </div>
                            @endif
                            @if (!isset($service->serviceImage[0]->img))
                                <div class="services__card"
                                    style="background-image: url({{ asset('upload/service/default-image-720x530.jpg') }})">
                                    @if (isset($service->title))
                                        <h6 class="ir-bold">
                                            {{ isset($service->title[$lang]) ? $service->title[$lang] : $service->title['en'] }}
                                        </h6>
                                    @endif
                                    <div class="services__card-bottom">
                                        @if (isset($service->subtitle))
                                            <p>{{ isset($service->subtitle[$lang]) ? $service->subtitle[$lang] : $service->subtitle['en'] }}
                                            </p>
                                        @endif
                                        <a href="{{ route('services-show', ['id' => $service->id]) }}"
                                            class="services__card-link">
                                            <img src="{{ asset('images/arrow-right.svg') }}" alt="">
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <div class="mt-4" style="    margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        padding-inline-start: 40px;
        }">
            {!! $services->links() !!}
        </div>
        
    </main>
    <style>
        .services__cards {
            display: none !important
        }

        .active_tab {
            display: block !important
        }
    </style>
    <script>
        function openCity(val) {
            let attr = val.getAttribute('data-tab');
            var i;
            var x = document.getElementsByClassName("ddcard");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(attr).style.display = "block";
        }
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.page-btn', function() {
                const id = $(this).data('id');
                if (id == 0) {
                    // $(".images_service").load('http://localhost:8000/services .services__cards-inner ');
                }
                $('.tabs__link').removeClass('tabs__link--active');
                $(this).addClass("tabs__link--active")
            });
        })
    </script>
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
