@if($recentlyEvent)
<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <p>Ближайшие события</p>
        </header>

        <div class="row gy-4" data-aos="fade-left">
            @foreach($recentlyEvent as $event)
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="box">
                    <h3>{{$event->event_title}}</h3>
                    <div class="price">{{date('d', strtotime($event->event_start_date))}}<span>/{{date('m', strtotime($event->event_start_date))}}/{{date('y', strtotime($event->event_start_date))}}</span></div>
                    <img src="{{asset('storage'.$event->event_image)}}" class="img-fluid" alt="">
                    <ul>
                        <li>{{$event->event_description}}</li>
                    </ul>
                    <a href="{{$event->event_url}}" class="btn-buy">Подробнее</a>
                </div>
            </div>
            @endforeach

        </div>

    </div>

</section><!-- End Pricing Section -->
@endif
