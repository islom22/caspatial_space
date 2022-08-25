@extends('layouts.web')

@section('content')
    <main class="main-page">
        @if (isset($banners[0]))
            <section class="main">
                <div class="main__slider">
                    <div class="swiper-wrapper">
                        @if (isset($banners[0]))
                            @if (isset($banners[0]->img))
                                <div class="swiper-slide main__slider-item"
                                    style="background-image: url({{ asset('uploads/banners/' . $banners[0]->img) }});">
                                    <div class="main__slider-inner container">
                                        <div class="main__slider-content d-flex"
                                            style="flex-direction: column; align-items: baseline;">
                                            <div class="d-flex" style="display: flex;">
                                                @if (isset($banners[0]->title))
                                                    <h2 class="main__slider-title ir-bold">
                                                        {{ $banners[0]->title['ru'] }}
                                                    </h2>
                                                @endif
                                                <a href="{{ route('index') }}">
                                                    <img src="{{ asset('images/arrow-right.svg') }}" alt="">
                                                </a>
                                            </div>
                                            @if (isset($banners[0]->desc))
                                                <div class="main__slider-subtitle">
                                                    <p class="main__slider-subtitle">
                                                        {!! $banners[0]->desc['ru'] !!}
                                                    </p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                        @if (isset($banners[1]))
                            @if (isset($banners[1]->img))
                                <div class="swiper-slide main__slider-item"
                                    style="background-image: url({{ asset('uploads/banners/' . $banners[1]->img) }});">
                                    <div class="main__slider-inner container">
                                        <div class="main__slider-content d-flex"
                                            style="flex-direction: column; align-items: baseline;">
                                            <div class="d-flex" style="display: flex;">
                                                @if (isset($banners[1]->title))
                                                    <h2 class="main__slider-title ir-bold">
                                                        {{ $banners[1]->title['ru'] }}
                                                    </h2>
                                                @endif
                                                <a href="{{ route('index') }}">
                                                    <img src="{{ asset('images/arrow-right.svg') }}" alt="">
                                                </a>
                                            </div>
                                            @if (isset($banners[1]->desc))
                                                <div class="main__slider-subtitle">
                                                    <p class="main__slider-subtitle">
                                                        {!! $banners[1]->desc['ru'] !!}
                                                    </p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </section>
        @endif

        @if (isset($services[0]))
            <section class="services">
                <div class="container">
                    <div class="services__top">
                        <div class="title services__title">
                            <h3 class="ir-bold">Our services</h3>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis, consequuntur.</p>
                        </div>
                        <a href="{{ route('services') }}" class="ir-semibold services__top-link">All services</a>
                    </div>

                    <div class="services__slider">
                        <div class="swiper-wrapper">
                            @foreach ($services as $service)
                                <div class="swiper-slide services__slide">
                                    @foreach ($service as $item)
                                        {{-- @dd($item) --}}
                                        @if (isset($item['service_image'][0]['img']))
                                            <div class="services__slide-item"
                                                style="background-image: url({{ asset($item['service_image'][0]['img']) }});">
                                                @if (isset($item['title']))
                                                    <h4 class="services__slide-title ir-bold"> {{ $item['title']['ru'] }}
                                                    </h4>
                                                @endif
                                                <div class="services__slide-inner">
                                                    @if (isset($item['subtitle']))
                                                        <p class="services__slide-text">
                                                            {{ $item['subtitle']['ru'] }}
                                                        </p>
                                                    @endif
                                                    <a href="{{ route('services-show', ['id' => $item['id']]) }}"
                                                        class="services__slide-link">
                                                        <img src="{{ asset('images/arrow-right.svg') }}" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                        @if (!isset($item['service_image'][0]['img']))
                                            <div class="services__slide-item"
                                                style="background-image: url({{ asset('upload/service/default-image-720x530.jpg') }});">
                                                @if (isset($item['title']))
                                                    <h4 class="services__slide-title ir-bold"> {{ $item['title']['ru'] }}
                                                    </h4>
                                                @endif
                                                <div class="services__slide-inner">
                                                    @if (isset($item['subtitle']))
                                                        <p class="services__slide-text">
                                                            {{ $item['subtitle']['ru'] }}
                                                        </p>
                                                    @endif
                                                    <a href="{{ route('services-show', ['id' => $item['id']]) }}"
                                                        class="services__slide-link">
                                                        <img src="{{ asset('images/arrow-right.svg') }}" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </section>
        @endif

        <section class="development">
            <div class="container">
                <div class="development__top">
                    <div class="title development__title">
                        <h3 class="ir-bold">
                            Development of geoinformation systems</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, maxime architecto. Magnam
                            nulla laudantium sed?</p>
                    </div>
                </div>
                <div class="development__body">
                    <div class="development__info">
                        <p class="development__text">The CAST interenational FZCO company, a leading integrator in the
                            field of geoinformation technologies and aerospace monitoring, was founded in 2022.</p>
                        <p class="development__text">
                            The mission of the company is to provide society with objective information about the state of
                            the surrounding world.</p>
                        <p class="development__text">The strategic goal of the company: the widespread introduction of
                            geoinformation technologies in the life of society, business and government to improve the
                            efficiency of management decisions.</p>
                        <p class="development__text">The main area of ​​interest of the company: the latest information
                            technology. The CAST interenational FZCO company offers innovative approaches, working on
                            further improvement and development of technologies based on integrated server geoinformation
                            solutions and cloud computing.</p>
                    </div>
                    <a href="index.html" class="development__logo">
                        <img src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="development__bottom">
                    <ul class="development__list">
                        <li>Space photography</li>
                        <li>Stereo Monitors</li>
                        <li>Planet Monitoring</li>
                        <li>Space photography</li>
                    </ul>
                    <a href="#" class="development__link">
                        <img src="images/arrow-right.svg" alt="">
                    </a>
                </div>
            </div>
        </section>

        @if (isset($industriescategories[0]))
            <section class="industries">
                <div class="container">
                    <div class="title industries__title">
                        <h3 class="ir-bold">Industries</h3>
                    </div>
                    <div class="industries__items">
                        @foreach ($industriescategories as $industry)
                            <div class="industries__item">
                                @if (isset($industry->icon))
                                    <div class="industries__item-icon">
                                        <img src="{{ asset('uploads/icon/' . $industry->icon) }}" alt="">
                                    </div>
                                @endif
                                <div class="industries__item-info">
                                    @if (isset($industry->title))
                                        <h6 class="ir-bold">{{ $industry->title['ru'] }}</h6>
                                    @endif
                                    @if (isset($industry->subtitle))
                                        <p>{!! $industry->subtitle['ru'] !!}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <section class="about">
            <div class="container">
                <div class="about__inner">
                    <div class="about__info">
                        <div class="title about__title">
                            <h3 class="ir-bold">"Geoanalytics" - cloud intelligent geoinformation platform</h3>
                        </div>
                        <p class="about__text">We combine a wide range of services, including the provision of space and
                            unmanned aerial imagery data, geospatial software, special technical tools and online services,
                            to effectively help customers develop high-tech competitive solutions.</p>
                        <p class="about__text">CAST interenational FZCO LLC is an authorized partner of major world
                            software developers, remote sensing satellite operators and design companies.</p>
                        <ul class="about__list">
                            <li>
                                <div class="about__list-icon">
                                    <img src="images/chevron-left.svg" alt="">
                                </div>
                                <p>
                                    We combine a wide range of services, including the provision of space and unmanned
                                    aerial imagery data</p>
                            </li>
                            <li>
                                <div class="about__list-icon">
                                    <img src="images/chevron-left.svg" alt="">
                                </div>
                                <p>
                                    Geospatial software, special hardware and online services</p>
                            </li>
                            <li>
                                <div class="about__list-icon">
                                    <img src="images/chevron-left.svg" alt="">
                                </div>
                                <p>
                                    To provide customers with effective assistance in the development of high-tech
                                    competitive solutions.</p>
                            </li>
                            <li>
                                <div class="about__list-icon">
                                    <img src="images/chevron-left.svg" alt="">
                                </div>
                                <p>
                                    CAST interenational FZCO LLC is an authorized partner of major world software
                                    developers, remote sensing satellite operators and design companies.</p>
                            </li>
                        </ul>
                    </div>
                    <div class="about__img">
                        <img src="{{ asset('images/about.png') }}" alt="">
                    </div>
                </div>
        </section>
    </main>

@endsection
