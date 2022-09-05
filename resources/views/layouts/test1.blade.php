@extends('layouts.web')
@section('title', 'CAST interenational FZCO')

@section('content')
    <main class="services-page">
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
                    <a data-id="0" data-tab="tab1" class="tabs__link tabs__link--active ir-regular  page-btn ">All
                        services</a>
                    {{-- @dd($servicecategories) --}}
                    @foreach ($servicecategories as $category)
                        @if (isset($category->title))
                            <a data-id="{{ $category->id }}" data-tab="tab2" class="tabs__link ir-regular  page-btn ">
                                {{ isset($category->title[$lang]) ? $category->title[$lang] : $category->title['en'] }}
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        @if (isset($services[0]))
            <div id="images" class="services__cards services__cards--active">
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
    </main>
        
    <script>
        $(document).ready(function() {
            $(document).on('click', '.page-btn', function() {
                const id = $(this).data('id');
                console.log('ss');
                if(id == 0){
                    $(".images_service").load('http://localhost:8000/services .services__cards-inner ');
                }else{
                    $(".images_service").load('http://localhost:8000/services-inner/' + id +' .services__cards-inner ');
                }
                $('.tabs__link').removeClass('tabs__link--active');
                $(this).addClass("tabs__link--active")
            });
        })
    </script>
@endsection
