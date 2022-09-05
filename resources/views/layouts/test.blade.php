<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>CAST interenational FZCO</title> --}}
    <title>@yield('title')</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
</head>

<body>

    <header class="header">
        <div class="header__bottom">
            <div class="container">
                <nav class="header__bottom-inner">
                    <a href="{{ route('index') }}" class="header__logo">
                        <picture>
                            <source srcset="{{ asset('images/logo-white.png') }}" media="(max-width: 1024px)">
                            <img src="{{ asset('images/logo.png') }}" alt="">
                        </picture>
                    </a>
                    <div class="header__burger">
                        <span></span>
                    </div>
                    <div class="header__menu">
                        <ul class="header__list">
                            <li>
                                <a href="{{ route('index') }}"
                                    class="header__link 	@if (request()->is('/') || request()->is('/*') || request()->is('*/*') || request()->is('*/'))  active header__contact @endif">
                                    {{-- <p class="font-weight-bold" style="font-weight: 600"> --}}
                                    Main
                                    {{-- </p> --}}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('services') }}"
                                    class="header__link
								@if (request()->is('services') || request()->is('services/*') || request()->is('*/services/*') || request()->is('*/services')) active header__contact @endif
								">
                                    {{-- <p class="font-weight-bold" style="font-weight: 600"> --}}
                                    Services
                                    {{-- </p> --}}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('industries') }}"
                                    class="header__link
								@if (request()->is('industries') || request()->is('industries/*') || request()->is('*/industries/*') || request()->is('*/industries')) active header__contact @endif
								">
                                    {{-- <p class="font-weight-bold" style="font-weight: 600"> --}}
                                    Industries
                                    {{-- </p> --}}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('about') }}"
                                    class="header__link
								@if (request()->is('about') || request()->is('about/*') || request()->is('*/about/*')|| request()->is('*/about')) active header__contact @endif
								">
                                    {{-- <p class="font-weight-bold" style="font-weight: 600"> --}}
                                    About
                                    {{-- </p> --}}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('news') }}"
                                    class="header__link
								@if (request()->is('news') || request()->is('news/*') || request()->is('*/news/*') || request()->is('*/news')) active header__contact @endif
								">
                                    {{-- <p class="font-weight-bold" style="font-weight: 600"> --}}
                                    News
                                    {{-- </p> --}}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('connect') }}"
                                    class="header__link
								@if (request()->is('connect') || request()->is('connect/*') || request()->is('*/connect/*') || request()->is('*/connect')) active header__contact @endif
								">
                                    {{-- <p class="font-weight-bold" style="font-weight: 600"> --}}
                                    Contacts
                                    {{-- </p> --}}
                                </a>
                            </li>
                            <button class="header__btn  ir-semibold form-trigger">Connect with us</button>
                            
                            <li>

                                <div class="header__lang header__lang--mobile">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16.998 9C16.998 13.4172 13.4172 16.998 9.00001 16.998M16.998 9C16.998 4.58283 13.4172 1.002 9.00001 1.002M16.998 9H1.00201M9.00001 16.998C4.58284 16.998 1.00201 13.4172 1.00201 9M9.00001 16.998C10.7944 16.998 12.249 13.4172 12.249 9C12.249 4.58283 10.7944 1.002 9.00001 1.002M9.00001 16.998C7.20564 16.998 5.75101 13.4172 5.75101 9C5.75101 4.58283 7.20564 1.002 9.00001 1.002M1.00201 9C1.00201 4.58283 4.58284 1.002 9.00001 1.002"
                                            stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <a href="{{ route('setlocale', ['lang' => 'en']) }}" class="header__lang-item header__lang-item--active">En</a>
                                    <a href="{{ route('setlocale', ['lang' => 'ru']) }}" class="header__lang-item">Ru</a>
                                </div>
        
                                <div class="header__lang ">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16.998 9C16.998 13.4172 13.4172 16.998 9.00001 16.998M16.998 9C16.998 4.58283 13.4172 1.002 9.00001 1.002M16.998 9H1.00201M9.00001 16.998C4.58284 16.998 1.00201 13.4172 1.00201 9M9.00001 16.998C10.7944 16.998 12.249 13.4172 12.249 9C12.249 4.58283 10.7944 1.002 9.00001 1.002M9.00001 16.998C7.20564 16.998 5.75101 13.4172 5.75101 9C5.75101 4.58283 7.20564 1.002 9.00001 1.002M1.00201 9C1.00201 4.58283 4.58284 1.002 9.00001 1.002"
                                            stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <a href="{{ route('setlocale', ['lang' => 'en']) }}"
                                        class="header__lang-item header__lang-item @if (!(request()->is('/') || request()->is('/*') || request()->is('*/*') )) active @endif"
                                        onclick="activeFun">En</a>
                                    <a href="{{ route('setlocale', ['lang' => 'ru']) }}"
                                        class="header__lang-item @if (request()->is('/') || request()->is('/*') || request()->is('*/*') )  active @endif"
                                        onclick="activeFun">Ru</a>
                                </div>
        
                            </li>
                        </ul>

                        {{-- <div class="header__lang header__lang--mobile">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.998 9C16.998 13.4172 13.4172 16.998 9.00001 16.998M16.998 9C16.998 4.58283 13.4172 1.002 9.00001 1.002M16.998 9H1.00201M9.00001 16.998C4.58284 16.998 1.00201 13.4172 1.00201 9M9.00001 16.998C10.7944 16.998 12.249 13.4172 12.249 9C12.249 4.58283 10.7944 1.002 9.00001 1.002M9.00001 16.998C7.20564 16.998 5.75101 13.4172 5.75101 9C5.75101 4.58283 7.20564 1.002 9.00001 1.002M1.00201 9C1.00201 4.58283 4.58284 1.002 9.00001 1.002"
                                    stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <a href="#" class="header__lang-item header__lang-item--active">Ру</a>
                            <a href="#" class="header__lang-item">En</a>
                        </div> --}}

                        @if (isset($about->phone))
                            <div class="header__phone header__phone--mobile">
                                <div class="header__phone-icon">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.9892 1.27083C14.16 1.27083 16.73 3.84083 16.73 7.01167M10.9892 4.22083C12.53 4.22083 13.78 5.47 13.78 7.01167M7.00501 10.9708C7.75501 11.69 8.63417 12.275 9.60584 12.69L10.0383 12.8742L11.3675 11.5242C11.6975 11.1892 12.175 11.0442 12.6358 11.1408L15.8558 11.815C16.4008 11.9308 16.79 12.4117 16.79 12.9683V15.2867C16.79 16.1158 16.1183 16.7875 15.2892 16.7875H14.5767C11.2983 16.7875 8.06334 15.7017 5.61667 13.52C5.41501 13.3408 5.21917 13.155 5.02834 12.965L5.05917 12.9958C4.86834 12.805 4.68334 12.6092 4.50417 12.4075C2.32167 9.96167 1.23584 6.72667 1.23584 3.44833V2.73583C1.23584 1.90667 1.90751 1.235 2.73667 1.235H5.05501C5.61167 1.235 6.09251 1.62417 6.20834 2.16917L6.88334 5.38917C6.97917 5.84917 6.83501 6.3275 6.50001 6.6575L5.15001 7.98667L5.33417 8.41917C5.74917 9.39 6.28501 10.2208 7.00501 10.9708Z"
                                            stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="header__phone-info">
                                    <span>Phone number</span>
                                    <a class="ir-semibold" href="tel:+998{{ $about->phone }}">{{ $about->phone }}</a>
                                </div>
                            </div>
                        @endif
                        <!-- <button class="header__contact ir-semibold form-trigger">Связаться с нами</button> -->
                    </div>
                </nav>
            </div>
        </div>
    </header>

    @yield('content')

    <footer class="footer">
        <div class="footer__top">
            <div class="container">
                <div class="footer__inner">
                    <div class="footer__left">
                        <ul class="footer__list">
                            <li>
                                <a href="{{ route('index') }}"
                                    class="footer__link 
                                    	@if (request()->is('/') || request()->is('//*')) active @endif
                                        ">Main</a>
                            </li>
                            <li>
                                <a href="{{ route('services') }}"
                                    class="footer__link
								@if (request()->is('services') || request()->is('services/*')) active @endif
								">Services</a>
                            </li>
                            <li>
                                <a href="{{ route('industries') }}"
                                    class="footer__link
								@if (request()->is('industries') || request()->is('industries/*')) active @endif
								">Industries</a>
                            </li>
                            <li>
                                <a href="{{ route('about') }}"
                                    class="footer__link
								@if (request()->is('about') || request()->is('about/*')) active @endif
								">About</a>
                            </li>
                            <li>
                                <a href="{{ route('news') }}"
                                    class="footer__link
								@if (request()->is('news') || request()->is('news/*')) active @endif
								">News</a>
                            </li>
                            <li>
                                <a href="{{ route('connect') }}"
                                    class="footer__link
								@if (request()->is('connect') || request()->is('connect/*')) active @endif
								">Contacts</a>
                            </li>
                        </ul>
                    </div>
                    {{-- @DD($about); --}}
                    <div class="footer__center">
                        <a href="{{ route('index') }}" class="footer__logo">
                            <img src="{{ asset('images/logo-white.png') }}" alt="">
                        </a>
                        @if (isset($about->facebook) || isset($about->instagram) || isset($about->linkedin) || isset($about->twitter))
                            <div class="footer__social">
                                @if (isset($about->twitter))
                                    <a href="{{ $about->twitter }}" class="footer__social-item">
                                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                            xmlns="{{ asset('http://www.w3.org/2000/svg') }}">
                                            <path
                                                d="M12.5 0C5.5975 0 0 5.5975 0 12.5C0 19.4025 5.5975 25 12.5 25C19.4025 25 25 19.4025 25 12.5C25 5.5975 19.4025 0 12.5 0ZM18.2074 9.74617C18.2129 9.86919 18.2156 9.99279 18.2156 10.117C18.2156 13.9082 15.3297 18.28 10.0523 18.2802H10.0525H10.0523C8.43201 18.2802 6.92425 17.8053 5.65453 16.9914C5.87902 17.0179 6.10752 17.0311 6.33888 17.0311C7.68318 17.0311 8.92029 16.5726 9.90238 15.803C8.64639 15.7797 7.58743 14.9502 7.22198 13.8102C7.39689 13.8437 7.57675 13.862 7.76119 13.862C8.02307 13.862 8.27675 13.8268 8.51784 13.7609C7.20501 13.4981 6.21605 12.3379 6.21605 10.9486C6.21605 10.9356 6.21605 10.924 6.21643 10.9119C6.60305 11.1269 7.04517 11.2562 7.51591 11.2707C6.74553 10.7567 6.23913 9.87797 6.23913 8.88252C6.23913 8.35686 6.38123 7.86438 6.62766 7.44038C8.04253 9.17645 10.157 10.3182 12.5416 10.4382C12.4924 10.228 12.467 10.009 12.467 9.78394C12.467 8.20007 13.752 6.91509 15.3364 6.91509C16.1617 6.91509 16.9071 7.26395 17.4307 7.82166C18.0843 7.69272 18.6981 7.45392 19.2526 7.12528C19.038 7.79495 18.5833 8.35686 17.9909 8.7122C18.5713 8.64277 19.1244 8.48885 19.6384 8.26035C19.2545 8.83579 18.7675 9.34124 18.2074 9.74617Z"
                                                fill="white" />
                                        </svg>
                                    </a>
                                @endif
                                @if (isset($about->linkedin))
                                    <a href="{{ $about->linkedin }}" class="footer__social-item">
                                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                            xmlns="{{ asset('http://www.w3.org/2000/svg') }}">
                                            <path
                                                d="M12.5 0C5.5975 0 0 5.5975 0 12.5C0 19.4025 5.5975 25 12.5 25C19.4025 25 25 19.4025 25 12.5C25 5.5975 19.4025 0 12.5 0ZM8.86765 18.8965H5.82333V9.73759H8.86765V18.8965ZM7.34558 8.48694H7.32574C6.30417 8.48694 5.64346 7.7837 5.64346 6.90479C5.64346 6.00605 6.32439 5.32227 7.3658 5.32227C8.40721 5.32227 9.04808 6.00605 9.06792 6.90479C9.06792 7.7837 8.40721 8.48694 7.34558 8.48694ZM19.8448 18.8965H16.8009V13.9967C16.8009 12.7653 16.3601 11.9255 15.2586 11.9255C14.4176 11.9255 13.9168 12.492 13.6967 13.0388C13.6162 13.2345 13.5965 13.508 13.5965 13.7817V18.8965H10.5524C10.5524 18.8965 10.5923 10.5968 10.5524 9.73759H13.5965V11.0344C14.0011 10.4103 14.7249 9.52263 16.3401 9.52263C18.343 9.52263 19.8448 10.8316 19.8448 13.6448V18.8965Z"
                                                fill="white" />
                                        </svg>
                                    </a>
                                @endif
                                @if (isset($about->instagram))
                                    <a href="{{ $about->instagram }}" class="footer__social-item">
                                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                            xmlns="{{ asset('http://www.w3.org/2000/svg') }}">
                                            <path
                                                d="M12.5 0C5.5975 0 0 5.5975 0 12.5C0 19.4025 5.5975 25 12.5 25C19.4025 25 25 19.4025 25 12.5C25 5.5975 19.4025 0 12.5 0ZM18.2074 9.74617C18.2129 9.86919 18.2156 9.99279 18.2156 10.117C18.2156 13.9082 15.3297 18.28 10.0523 18.2802H10.0525H10.0523C8.43201 18.2802 6.92425 17.8053 5.65453 16.9914C5.87902 17.0179 6.10752 17.0311 6.33888 17.0311C7.68318 17.0311 8.92029 16.5726 9.90238 15.803C8.64639 15.7797 7.58743 14.9502 7.22198 13.8102C7.39689 13.8437 7.57675 13.862 7.76119 13.862C8.02307 13.862 8.27675 13.8268 8.51784 13.7609C7.20501 13.4981 6.21605 12.3379 6.21605 10.9486C6.21605 10.9356 6.21605 10.924 6.21643 10.9119C6.60305 11.1269 7.04517 11.2562 7.51591 11.2707C6.74553 10.7567 6.23913 9.87797 6.23913 8.88252C6.23913 8.35686 6.38123 7.86438 6.62766 7.44038C8.04253 9.17645 10.157 10.3182 12.5416 10.4382C12.4924 10.228 12.467 10.009 12.467 9.78394C12.467 8.20007 13.752 6.91509 15.3364 6.91509C16.1617 6.91509 16.9071 7.26395 17.4307 7.82166C18.0843 7.69272 18.6981 7.45392 19.2526 7.12528C19.038 7.79495 18.5833 8.35686 17.9909 8.7122C18.5713 8.64277 19.1244 8.48885 19.6384 8.26035C19.2545 8.83579 18.7675 9.34124 18.2074 9.74617Z"
                                                fill="white" />
                                        </svg>
                                    </a>
                                @endif
                                @if (isset($about->facebook))
                                    <a href="{{ $about->facebook }}" class="footer__social-item">
                                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                            xmlns="{{ asset('http://www.w3.org/2000/svg') }}">
                                            <path
                                                d="M25 12.5C25 5.5957 19.4043 0 12.5 0C5.5957 0 0 5.5957 0 12.5C0 19.4043 5.5957 25 12.5 25C12.5732 25 12.6465 25 12.7197 24.9951V15.2686H10.0342V12.1387H12.7197V9.83398C12.7197 7.16309 14.3506 5.70801 16.7334 5.70801C17.876 5.70801 18.8574 5.79102 19.1406 5.83008V8.62305H17.5C16.2061 8.62305 15.9521 9.23828 15.9521 10.1416V12.1338H19.0527L18.6475 15.2637H15.9521V24.5166C21.1768 23.0176 25 18.208 25 12.5Z"
                                                fill="white" />
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        @endif
                    </div>
                    <div class="footer__right">
                        @if (isset($about->phone))
                            <div class="footer__right-item">
                                <div class="footer__right-item-icon">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.9892 1.27083C14.16 1.27083 16.73 3.84083 16.73 7.01167M10.9892 4.22083C12.53 4.22083 13.78 5.47 13.78 7.01167M7.00501 10.9708C7.75501 11.69 8.63417 12.275 9.60584 12.69L10.0383 12.8742L11.3675 11.5242C11.6975 11.1892 12.175 11.0442 12.6358 11.1408L15.8558 11.815C16.4008 11.9308 16.79 12.4117 16.79 12.9683V15.2867C16.79 16.1158 16.1183 16.7875 15.2892 16.7875H14.5767C11.2983 16.7875 8.06334 15.7017 5.61667 13.52C5.41501 13.3408 5.21917 13.155 5.02834 12.965L5.05917 12.9958C4.86834 12.805 4.68334 12.6092 4.50417 12.4075C2.32167 9.96167 1.23584 6.72667 1.23584 3.44833V2.73583C1.23584 1.90667 1.90751 1.235 2.73667 1.235H5.05501C5.61167 1.235 6.09251 1.62417 6.20834 2.16917L6.88334 5.38917C6.97917 5.84917 6.83501 6.3275 6.50001 6.6575L5.15001 7.98667L5.33417 8.41917C5.74917 9.39 6.28501 10.2208 7.00501 10.9708Z"
                                            stroke="#2f86f4" stroke-width="1.5" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="footer__right-item-info">
                                    <span>Connect with us:</span>
                                    <a href="tel:+998{{ $about->phone }}"
                                        class="ir-semibold">{{ $about->phone }}</a>
                                </div>
                            </div>
                        @endif
                        @if (isset($about->address1) || isset($about->address2))
                            <div class="footer__right-item">
                                <div class="footer__right-item-icon">
                                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.99832 16.7767C7.99832 16.7767 1.52832 12.8892 1.52832 7.70335C1.52832 4.12335 4.42999 1.22168 8.00999 1.22168C11.59 1.22168 14.4917 4.12335 14.4917 7.70335C14.4917 12.8892 7.99832 16.7767 7.99832 16.7767Z"
                                            stroke="#2f86f4" stroke-width="1.5" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M8.00999 10.2967C9.44178 10.2967 10.6025 9.13598 10.6025 7.70418C10.6025 6.27238 9.44178 5.11168 8.00999 5.11168C6.57819 5.11168 5.41749 6.27238 5.41749 7.70418C5.41749 9.13598 6.57819 10.2967 8.00999 10.2967Z"
                                            stroke="#2f86f4" stroke-width="1.5" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="footer__right-item-info">
                                    <span>The address:</span>
                                    <p>
                                        {{ $about->address1 ? $about->address1 : '' }}
                                        {{ $about->address2 ? ', ' . $about->address2 : '' }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="footer__bottom">
   <div class="container">
    <div class="footer__bottom-inner">
     <p>“High tech cosmos” sinse 2014</p>
     <p>Сайт разработал <a href="#">ItUnity</a></p>
    </div>
   </div>
  </div> -->
    </footer>

    <div class="modal-bg"></div>
    <div class="modal">

        <div class="modal__inner">
            <h2 class="modal__title ir-bold">Submit your application</h2>
            <p class="modal__subtitle">Leave your contact details and we will contact you!</p>
            <form class="modal__form" action="{{ route('order') }}" method="get" enctype='multipart/form-data'>
                <div class="modal__form-input-box">
                    <input class="ir-regular" type="text" name="name" required value="{{ old('name') }}"
                        placeholder="*Your name">
                </div>
                <div class="modal__form-input-box">
                    {{-- <span>+998</span> --}}
                    <input class=" ir-regular" name="phone" required value="{{ old('phone') }}" type="text"
                        placeholder="XX XXX XX XX">
                </div>
                <button type="submit">
                    Send
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9.5533 5.71084L12.8425 9.00001L9.5533 12.2892M5.17747 9.00001H12.8325M16.7783 9.00001C16.7783 13.2963 13.2955 16.7792 8.99914 16.7792C4.70282 16.7792 1.21997 13.2963 1.21997 9.00001C1.21997 4.70369 4.70282 1.22084 8.99914 1.22084C13.2955 1.22084 16.7783 4.70369 16.7783 9.00001Z"
                            stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
            </form>
        </div>
        <button type="button" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <script src="{{ asset('js/libs.min.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
<style>
    .active {
        font-weight: 600;
    }
</style>
<style>
    .close {
        top: 171px;
        right: 578px;   
        position: absolute;
    }
</style>

</html>
