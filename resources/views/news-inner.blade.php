
@extends('layouts.web')

@section('content')
	<main class="services-inner-page">
    <div class="page-top">
      <div class="container">
        <div class="page-top__inner">
          <h1 class="page-top__title ir-bold">{{ $new->title['ru'] }}</h1>
          <p class="page-top__text">{{ $new->date }}</p>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="img">
        <img src="{{ asset('uploads/news/' . $new->img) }}" alt="">
      </div>
    </div>

    <div class="text">
      <div class="container">
				{!! $new->desc['ru'] !!}
      </div>
    </div>

  

	{{-- <main class="about-page">
    <div class="page-top">
      <div class="container">
        <div class="page-top__inner">
          
          <a href="#" class="page-top__logo">
            <!-- <img src="images/logo.png" alt=""> -->
          </a>
        </div>
      </div>
    </div> --}}

  </main>

@endsection