<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <p>Недавно добавленные скалолазные движения</p>
            <a href="{{route('climbing-moves')}}"
               class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Посмотреть все</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </header>
        <div class="testimonials-slider swiper-container">
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
