@extends('layouts.web')
@section('title', 'CAST interenational FZCO')

@section('content')
    <main class="contacts-page" style="padding-top:60px">
        <!-- <div class="map">
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2995.4994806108966!2d69.28949371479528!3d41.341496006802856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38aef4ac6f104ea9%3A0x556bc75f6a220366!2zQm9kb216b3Iga28nY2hhc2ksINCi0L7RiNC60LXQvdGCLCBVemJla2lzdGFu!5e0!3m2!1sen!2s!4v1634381136430!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div> -->
        <div class="contacts__content">
            <div class="container">
                <div class="contacts__body">
                    <div class="contacts__left">
                        <h1 class="contacts__left-title ir-semibold">Contacts</h1>
                        <div class="contacts__left-item">
                            <div class="contacts__left-item-icon">
                                <img src="{{ asset('images/phone.svg') }}" alt="">
                            </div>
                            @if (isset($about->phone))
                                <div class="contacts__left-item-info">
                                    <span>Connect with us:</span>
                                    {{-- <a href="tel:971585697653" class="ir-semibold">+971 58 569 7653</a> --}}
                                    <a href="tel:+998{{ $about->phone }}" class="ir-semibold">{{ $about->phone }}</a>
                                </div>
                            @endif
                        </div>
                        @if (isset($about->address1) || isset($about->address2))
                            <div class="contacts__left-item">
                                <div class="contacts__left-item-icon">
                                    <img src="{{ asset('images/location.svg') }}" alt="">
                                </div>
                                <div class="contacts__left-item-info">
                                    <span>The address:</span>
                                    <p class="ir-semibold">
                                        {{ $about->address1 ? $about->address1 : '' }}
                                        {{ $about->address2 ? ', ' . $about->address2 : '' }}
                                    </p>
                                </div>
                            </div>
                        @endif
                        {{-- <a href="#" class="map-link ir-italic">To show on the map</a> --}}
                        @if (isset($about->email))
                            <div class="contacts__left-item">
                                <div class="contacts__left-item-icon">
                                    <img src="{{ asset('images/mail.svg') }}" alt="">
                                </div>
                                <div class="contacts__left-item-info">
                                    <span>Mail</span>
                                    <a href="mailto:info@caspatial.space" class="ir-semibold">{{ $about->email }}</a>
                                </div>
                            </div>
                        @endif
                        @if (isset($about->facebook) || isset($about->instagram) || isset($about->linkedin) || isset($about->twitter))
                            <div class="contacts__social">
                                @if (isset($about->twitter))
                                    <a href="{{ $about->twitter }}" class="contacts__social-item">
                                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.5 0C5.5975 0 0 5.5975 0 12.5C0 19.4025 5.5975 25 12.5 25C19.4025 25 25 19.4025 25 12.5C25 5.5975 19.4025 0 12.5 0ZM18.2074 9.74617C18.2129 9.86919 18.2156 9.99279 18.2156 10.117C18.2156 13.9082 15.3297 18.28 10.0523 18.2802H10.0525H10.0523C8.43201 18.2802 6.92425 17.8053 5.65453 16.9914C5.87902 17.0179 6.10752 17.0311 6.33888 17.0311C7.68318 17.0311 8.92029 16.5726 9.90238 15.803C8.64639 15.7797 7.58743 14.9502 7.22198 13.8102C7.39689 13.8437 7.57675 13.862 7.76119 13.862C8.02307 13.862 8.27675 13.8268 8.51784 13.7609C7.20501 13.4981 6.21605 12.3379 6.21605 10.9486C6.21605 10.9356 6.21605 10.924 6.21643 10.9119C6.60305 11.1269 7.04517 11.2562 7.51591 11.2707C6.74553 10.7567 6.23913 9.87797 6.23913 8.88252C6.23913 8.35686 6.38123 7.86438 6.62766 7.44038C8.04253 9.17645 10.157 10.3182 12.5416 10.4382C12.4924 10.228 12.467 10.009 12.467 9.78394C12.467 8.20007 13.752 6.91509 15.3364 6.91509C16.1617 6.91509 16.9071 7.26395 17.4307 7.82166C18.0843 7.69272 18.6981 7.45392 19.2526 7.12528C19.038 7.79495 18.5833 8.35686 17.9909 8.7122C18.5713 8.64277 19.1244 8.48885 19.6384 8.26035C19.2545 8.83579 18.7675 9.34124 18.2074 9.74617Z"
                                                fill="black" />
                                        </svg>
                                    </a>
                                @endif
                                @if (isset($about->linkedin))
                                    <a href="{{ $about->linkedin }}" class="contacts__social-item">
                                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.5 0C5.5975 0 0 5.5975 0 12.5C0 19.4025 5.5975 25 12.5 25C19.4025 25 25 19.4025 25 12.5C25 5.5975 19.4025 0 12.5 0ZM8.86765 18.8965H5.82333V9.73759H8.86765V18.8965ZM7.34558 8.48694H7.32574C6.30417 8.48694 5.64346 7.7837 5.64346 6.90479C5.64346 6.00605 6.32439 5.32227 7.3658 5.32227C8.40721 5.32227 9.04808 6.00605 9.06792 6.90479C9.06792 7.7837 8.40721 8.48694 7.34558 8.48694ZM19.8448 18.8965H16.8009V13.9967C16.8009 12.7653 16.3601 11.9255 15.2586 11.9255C14.4176 11.9255 13.9168 12.492 13.6967 13.0388C13.6162 13.2345 13.5965 13.508 13.5965 13.7817V18.8965H10.5524C10.5524 18.8965 10.5923 10.5968 10.5524 9.73759H13.5965V11.0344C14.0011 10.4103 14.7249 9.52263 16.3401 9.52263C18.343 9.52263 19.8448 10.8316 19.8448 13.6448V18.8965Z"
                                                fill="black" />
                                        </svg>
                                    </a>
                                @endif
                                @if (isset($about->instagram))
                                    <a href="{{ $about->instagram }}" class="contacts__social-item">
                                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.5 0C5.5975 0 0 5.5975 0 12.5C0 19.4025 5.5975 25 12.5 25C19.4025 25 25 19.4025 25 12.5C25 5.5975 19.4025 0 12.5 0ZM18.2074 9.74617C18.2129 9.86919 18.2156 9.99279 18.2156 10.117C18.2156 13.9082 15.3297 18.28 10.0523 18.2802H10.0525H10.0523C8.43201 18.2802 6.92425 17.8053 5.65453 16.9914C5.87902 17.0179 6.10752 17.0311 6.33888 17.0311C7.68318 17.0311 8.92029 16.5726 9.90238 15.803C8.64639 15.7797 7.58743 14.9502 7.22198 13.8102C7.39689 13.8437 7.57675 13.862 7.76119 13.862C8.02307 13.862 8.27675 13.8268 8.51784 13.7609C7.20501 13.4981 6.21605 12.3379 6.21605 10.9486C6.21605 10.9356 6.21605 10.924 6.21643 10.9119C6.60305 11.1269 7.04517 11.2562 7.51591 11.2707C6.74553 10.7567 6.23913 9.87797 6.23913 8.88252C6.23913 8.35686 6.38123 7.86438 6.62766 7.44038C8.04253 9.17645 10.157 10.3182 12.5416 10.4382C12.4924 10.228 12.467 10.009 12.467 9.78394C12.467 8.20007 13.752 6.91509 15.3364 6.91509C16.1617 6.91509 16.9071 7.26395 17.4307 7.82166C18.0843 7.69272 18.6981 7.45392 19.2526 7.12528C19.038 7.79495 18.5833 8.35686 17.9909 8.7122C18.5713 8.64277 19.1244 8.48885 19.6384 8.26035C19.2545 8.83579 18.7675 9.34124 18.2074 9.74617Z"
                                                fill="black" />
                                        </svg>
                                    </a>
                                @endif
                                @if (isset($about->facebook))
                                    <a href="{{ $about->facebook }}" class="contacts__social-item">
                                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25 12.5C25 5.5957 19.4043 0 12.5 0C5.5957 0 0 5.5957 0 12.5C0 19.4043 5.5957 25 12.5 25C12.5732 25 12.6465 25 12.7197 24.9951V15.2686H10.0342V12.1387H12.7197V9.83398C12.7197 7.16309 14.3506 5.70801 16.7334 5.70801C17.876 5.70801 18.8574 5.79102 19.1406 5.83008V8.62305H17.5C16.2061 8.62305 15.9521 9.23828 15.9521 10.1416V12.1338H19.0527L18.6475 15.2637H15.9521V24.5166C21.1768 23.0176 25 18.208 25 12.5Z"
                                                fill="black" />
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        @endif
                    </div>
                    <div class="contacts__right">
                        <h2 class="contacts__right-title ir-semibold">Connect with us</h2>
                        <p class="contacts__right-subtitle">Leave your contact details and we will contact you.</p>
                        {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}
                        <form class="contacts__form" action="{{ route('order') }}" method="get"
                            enctype='multipart/form-data'>
                            @csrf
                            <input type="text" class="ir-regular" name="name" required value="{{ old('name') }}"
                                placeholder="First Name Last Name">
                            <input type="text" class=" ir-regular" name="phone" required value="{{ old('phone') }}"
                                placeholder="Phone number">
                            <input type="email" class="ir-regular" name="email" value="{{ old('email') }}"
                                placeholder="Mail">
                            <button type="submit" class="ir-semibold">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
