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
                    <a href="{{ route('services') }}" data-tab="tab1" class="tabs__link ir-regular">All
                        services</a>
                    @foreach ($servicecategories as $category)
                        @if (isset($category->title))
                            <a href="{{ route('services-inner', ['serviceCategory_id' => $category->id]) }}" data-tab="tab2"
                                class="tabs__link ir-regular" href="">{{ isset($category->title[$lang]) ? $category->title[$lang] : $category->title['en'] }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        @if (isset($services[0]))
            <div id="tab1" class="services__cards services__cards--active">
                <div class="container">
                    <div class="services__cards-inner">
                        @foreach ($services as $service)
                            @if (isset($service->serviceImage[0]->img))
                                <div class="services__card"
                                    style="background-image: url({{ asset($service->serviceImage[0]->img) }})">
                                    @if (isset($service->title))
                                        <h6 class="ir-bold">{{ isset($service->title[$lang]) ? $service->title[$lang] : $service->title['en'] }}</h6>
                                    @endif
                                    <div class="services__card-bottom">
                                        @if (isset($service->subtitle))
                                            <p>{{ isset($service->subtitle[$lang]) ? $service->subtitle[$lang] : $service->subtitle['en']  }}</p>
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
                                        <h6 class="ir-bold">{{ isset($service->title[$lang]) ? $service->title[$lang] : $service->title['en']  }}</h6>
                                    @endif
                                    <div class="services__card-bottom">
                                        @if (isset($service->subtitle))
                                            <p>{{ isset($service->subtitle[$lang]) ? $service->subtitle[$lang] : $service->subtitle['en']  }}</p>
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
