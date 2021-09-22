<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <p>Производители зацеп</p>
        </header>

        <div class="row gy-4" data-aos="fade-left">
            @foreach($latestHolds as $hold)
                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="box">
                        <h3>{{$hold->name}}</h3>
                        <img src="{{asset('storage'.$hold->members)}}" class="img-fluid" alt="">
                        <ul>
                            <li>{{$hold->zone}}</li>
                            <li>{{$hold->headquarters}}</li>
                        </ul>
                        <a href="{{$hold->url}}" class="btn-buy">Подробнее</a>
                    </div>
                </div>
            @endforeach

        </div>

    </div>

</section><!-- End Pricing Section -->
