@extends('layout')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="index.html">Домой</a></li>
                <li>Информация о соревнованиях</li>
            </ol>
            <h2>Информация о соревнованиях</h2>

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
                        <h3>{{$event->event_title }}</h3>
                        <ul>
                            <li><strong>Организация/скалодром </strong>{{$event->event_start_date}}</li>
                            <li><strong>Даты проведения </strong>{{$event->event_start_date.' - '. $event->event_end_date}}</li>
                            <li><strong>Ссылка на регистрацию</strong>: <a href="#">{{$event->event_title}}</a></li>
                        </ul>
                    </div>
                    <div class="portfolio-description">
                        <h2>Краткое описание соревнований</h2>
                        <p>
                            {{$event->event_description }}
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->
@endsection
