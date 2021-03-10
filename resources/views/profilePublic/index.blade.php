@extends('layout')

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <ol>
            <li><a href="{{route('home')}}">Главная</a></li>
            <li>Профиль</li>
          </ol>
          <h2>Профиль {{$user->name}}</h2>
  
        </div>
      </section><!-- End Breadcrumbs -->
  
      <!-- ======= Portfolio Details Section ======= -->
      <section id="portfolio-details" class="portfolio-details">
        <div class="container">
  
          <div class="row gy-4">
  
            <div class="col-lg-8">
              <div class="portfolio-details-slider swiper-container">
                <div class="swiper-wrapper align-items-center">
  
                  <div class="swiper-slide">
                    <img src="{{asset('storage/images/portfolio/portfolio-1.jpg')}}" alt="">
                  </div>
  
                  <div class="swiper-slide">
                    <img src="{{asset('storage/images/portfolio/portfolio-2.jpg')}}" alt="">
                  </div>
  
                  <div class="swiper-slide">
                    <img src="{{asset('storage/images/portfolio/portfolio-3.jpg')}}" alt="">
                  </div>
  
                </div>
                <div class="swiper-pagination"></div>
              </div>
            </div>
  
            <div class="col-lg-4">
              <div class="portfolio-info">
                <h3>{{$user->name}}</h3>
                <ul>
                  <li><strong>Город</strong>: {{$user->city_name}}</li>
                  <li><strong>Пол</strong>: {{$user->gender}}</li>
                  <li><strong>Project date</strong>: 01 March, 2020</li>
                  <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
                </ul>
              </div>
              <div class="portfolio-description">
                <h2>Описание</h2>
                <p>
                  {{$user->description}}
                </p>
              </div>
            </div>
  
          </div>
  
        </div>
      </section>
@endsection