@if(count($latestMoves) > 1)
<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <p>Добавленные скалолазные движения</p>
            <a href="{{route('climbing-moves')}}"
               class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Посмотреть все</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </header>
        <div class="testimonials-slider swiper-container" id="video_moves">
            <div class="swiper-wrapper">
                @foreach ($latestMoves as $move)
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="profile mt-auto">
                                <video id="video{{$move->id}}" preload="metadata" muted width="200" height="240" autoplay controls loop playsinline>
                                    <source src="{{asset('storage'.$move->path)}}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <a href="{{$move->url}}"><i class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
@else
    <section id="pricing" class="pricing">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>Добавленные скалолазные движения</p>
                <a href="{{route('climbing-moves')}}"
                   class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                    <span>Посмотреть все</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </header>
            <div class="row gy-4" data-aos="fade-left">
                @foreach ($latestMoves as $move)
                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                        <div class="box">
                            <video id="video{{$move->id}}" preload="metadata" muted width="200" height="240" autoplay controls loop playsinline>
                                <source src="{{asset('storage'.$move->path)}}#t=0.1" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <a href="{{$move->url}}"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

