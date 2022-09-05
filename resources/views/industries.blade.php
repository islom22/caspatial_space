@extends('layouts.web1')
@section('title', 'CAST interenational FZCO')

@section('content')
    <main class="industries-page">
        <div class="page-top">
            <div class="container">
                <div class="page-top__inner">
                    <h1 class="page-top__title ir-bold">Areas of use</h1>
                    <a href="#" class="page-top__logo">
                        <!-- <img src="images/logo.png" alt=""> -->
                    </a>
                </div>
            </div>
        </div>

        @if (isset($industriescategories[0]))
            <div class="industries__items">
                <div class="container">
                    <div class="industries__items-inner">
                        @foreach ($industriescategories as $industricategory)
                            <a href="{{ route('industries-inner', ['industryCategory_id' => $industricategory->id]) }}" class="industries__item">
                                @if (isset($industricategory->icon))
                                    <div class="industries__item-icon">
                                        <img src="{{ asset('uploads/icon/' . $industricategory->icon) }}" alt="">
                                    </div>
                                @endif
                                @if (isset($industricategory->title))
                                    <h6 class="industries__item-title ir-bold">{{ isset($industricategory->title[$lang]) ? $industricategory->title[$lang] : $industricategory->title['en'] }}
                                    </h6>
                                @endif
                                @if (isset($industricategory->subtitle))
                                    <p class="industries__item-text">{!! isset($industricategory->subtitle[$lang]) ? $industricategory->subtitle[$lang] : $industricategory->subtitle['en']  !!}</p>
                                @endif
                                <div class="industries__item-link d-flex flex-column justify-content-between " style="margin-top:15px" >
                                    <img src="{{ asset('images/arrow-right-red.svg') }}" alt="">
                                </div>
                            </a>
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
