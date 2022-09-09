@extends('layouts.web')

@section('title', 'CAST interenational FZCO')

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
                                                        {{ isset($banners[0]->title[$lang]) ? $banners[0]->title[$lang] : $banners[0]->title['en'] }}
                                                    </h2>
                                                @endif
                                                <a href="{{ $banners[0]->link }}">
                                                    <img src="{{ asset('images/arrow-right.svg') }}" alt="">
                                                </a>
                                            </div>
                                            @if (isset($banners[0]->desc))
                                                <div class="main__slider-subtitle">
                                                    <p class="main__slider-subtitle">
                                                        {!! isset($banners[0]->desc[$lang]) ? $banners[0]->desc[$lang] : $banners[0]->desc['en']  !!}
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
                                                        {{ isset($banners[1]->title[$lang]) ? $banners[1]->title[$lang] : $banners[1]->title['en']  }}
                                                    </h2>
                                                @endif
                                                <a href="{{ $banners[1]->link   }}">
                                                    <img src="{{ asset('images/arrow-right.svg') }}" alt="">
                                                </a>
                                            </div>
                                            @if (isset($banners[1]->desc))
                                                <div class="main__slider-subtitle">
                                                    <p class="main__slider-subtitle">
                                                        {!! isset($banners[1]->desc[$lang]) ? $banners[1]->desc[$lang] : $banners[1]->desc['en']  !!}
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
                            <p>Creation of detailed photorealistic 3D surface models in the required coordinate system.</p>
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
                                                    <h4 class="services__slide-title ir-bold"> {{ isset($item['title'][$lang]) ? $item['title'][$lang] : $item['title']['en'] }}
                                                    </h4> 
                                                @endif
                                                <div class="services__slide-inner">
                                                    @if (isset($item['subtitle']))
                                                        <p class="services__slide-text">
                                                            {{  isset($item['subtitle'][$lang]) ? $item['subtitle'][$lang] : $item['subtitle']['en'] }}
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
                                                    <h4 class="services__slide-title ir-bold">  {{ isset($item['title'][$lang]) ? $item['title'][$lang] : $item['title']['en']  }} 
                                                    </h4>
                                                @endif
                                                <div class="services__slide-inner">
                                                    @if (isset($item['subtitle']))
                                                        <p class="services__slide-text">
                                                             {{  isset($item['subtitle'][$lang]) ? $item['subtitle'][$lang] : $item['subtitle']['en'] }} 
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
                             {{ translation('olma') }}</h3>
                        <p>
                            {{ translation('apple') }}
                        </p>
                    </div>
                </div>
                <div class="development__body">
                    <div class="development__info">
                        <p class="development__text">{{ translation('hi') }}</p>
                        <p class="development__text">
                            {{ translation('one') }}</p>
                        <p class="development__text">{{ translation('two') }}</p>
                        <p class="development__text">{{ translation('three') }}.</p>
                    </div>
                    <a href="{{ route('index') }}" class="development__logo">
                        <img src="{{ asset('images/logo.png') }}" alt="">
                    </a>
                </div>
                <div class="development__bottom">
                    <ul class="development__list">
                        <li>{{ translation('first') }}</li>
                        <li>{{ translation('second') }}</li>
                        <li>{{ translation('third') }}</li>
                        <li>{{ translation('four') }}</li>
                    </ul>
                    <a href="{{ route('services') }}" class="development__link">
                        <img src="{{ asset('images/arrow-right.svg') }}" alt="">
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
                                        <h6 class="ir-bold">{{ isset($industry->title[$lang]) ? $industry->title[$lang] : $industry->title['en']  }}</h6>
                                    @endif
                                    @if (isset($industry->subtitle))
                                        <p>{!! isset($industry->subtitle[$lang]) ? $industry->subtitle[$lang] : $industry->subtitle['en'] !!}</p>
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
                            <h3 class="ir-bold">{{ translation('birinchi') }}</h3>
                        </div>
                        <p class="about__text">{{ translation('ikkinchi') }}</p>
                        <p class="about__text">{{ translation('uchinchi') }}</p>
                        <ul class="about__list">
                            <li>
                                <div class="about__list-icon">
                                    <img src="{{ asset('images/chevron-left.svg') }}" alt="">
                                </div>
                                <p>
                                    {{ translation('to`rtinchi') }}</p>
                            </li>
                            <li>
                                <div class="about__list-icon">
                                    <img src="{{ asset('images/chevron-left.svg') }}" alt="">
                                </div>
                                <p>
                                    {{ translation('beshinchi') }}</p>
                            </li>
                            <li>
                                <div class="about__list-icon">
                                    <img src="{{ asset('images/chevron-left.svg') }}" alt="">
                                </div>
                                <p>
                                    {{ translation('oltinchi') }}</p>
                            </li>
                            <li>
                                <div class="about__list-icon">
                                    <img src="{{ asset('images/chevron-left.svg') }}" alt="">
                                </div>
                                <p>
                                    {{ translation('yettinchi') }}</p>
                            </li>
                        </ul>
                    </div>
                    <div class="about__img">
                        <img src="{{ asset('images/about.png') }}" alt="">
                    </div>
                </div>
        </section>
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
