<div class="accordion accordion-flush" id="faqlist22">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#faq-content-22" id="europe">
                <header class="section-header">
                     <img id="europe" src="{{asset('storage/images/holds/europe.png')}}" alt="europe">
                </header>
                <header class="section-header" style="margin-left: 2em">
                    <p id="europe">Europe <br> <h2 id="europe"> Кол-во производителей зацеп - {{count($euroHolds)}}</h2></p>
                </header>
            </button>
        </h2>
        <div id="faq-content-22"
             class="accordion-collapse collapse"
             data-bs-parent="#faqlist22">
            <div class="accordion-body">
                <div class="col-xl-8 d-flex content" style="width: 85.666667%; margin-left: 2em">
                    <div class="row align-self-center gy-4">
                        @foreach($euroHolds as $euroHold)
                        <div class="col-lg-4 mt-4 mt-lg-0">
                            <div class="box" data-aos="fade-up" data-aos-delay="200">
                                @if($euroHold->members)
                                <img src="storage{{$euroHold->members}}" alt="">
                                @endif
                                <br>
                                <h4><a href="{{$euroHold->url}}">{{$euroHold->name}}</a></h4>
                                <p>Тип - {{$euroHold->type}}</p>
                                <p>Материал - {{$euroHold->materials}}</p>
                                <p>Производство - {{$euroHold->headquarters}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="accordion accordion-flush" id="faqlist33">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#faq-content-33" id="asia">
                <header class="section-header">
                    <img id="asia" src="{{asset('storage/images/holds/asia.jpeg')}}" alt="asia">
                </header>
                <header class="section-header" style="margin-left: 2em" id="asia">
                    <p id="asia">Asia <br> <h2 id="asia"> Кол-во производителей зацеп - {{count($asia)}}</h2></p>
                </header>
            </button>
        </h2>
        <div id="faq-content-33"
             class="accordion-collapse collapse"
             data-bs-parent="#faqlist33">
            <div class="accordion-body">
                <div class="col-xl-8 d-flex content" style="width: 85.666667%; margin-left: 2em">
                    <div class="row align-self-center gy-4" >
                        @foreach($asia as $asiaHold)
                        <div class="col-lg-4 mt-4 mt-lg-0">
                            <div class="box" data-aos="fade-up" data-aos-delay="200">
                                @if($asiaHold->members)
                                <img src="storage{{$asiaHold->members}}" alt="">
                                @endif
                                <br>
                                <h4><a href="{{$asiaHold->url}}">{{$asiaHold->name}}</a></h4>
                                <p>Тип - {{$asiaHold->type}}</p>
                                <p>Материал - {{$asiaHold->materials}}</p>
                                <p>Производство - {{$asiaHold->headquarters}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="accordion accordion-flush" id="faqlist44">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#faq-content-44" id="usa">
                <header class="section-header">
                    <img id="usa" src="{{asset('storage/images/holds/usa.png')}}" alt="usa">
                </header>
                <header class="section-header" style="margin-left: 2em" >
                    <p id="usa">USA <br> <h2 id="usa"> Кол-во производителей зацеп - {{count($usa)}}</h2></p>
                </header>
            </button>
        </h2>
        <div id="faq-content-44"
             class="accordion-collapse collapse"
             data-bs-parent="#faqlist44">
            <div class="accordion-body">
                <div class="col-xl-8 d-flex content"  style="width: 85.666667%; margin-left: 2em">
                    <div class="row align-self-center gy-4">
                        @foreach($usa as $usaHold)
                        <div class="col-lg-4 mt-4 mt-lg-0">
                            <div class="box" data-aos="fade-up" data-aos-delay="200">
                                @if($usaHold->members)
                                <img src="storage{{$usaHold->members}}" alt="">
                                @endif
                                <br>
                                <h4><a href="{{$usaHold->url}}">{{$usaHold->name}}</a></h4>
                                <p>Тип - {{$usaHold->type}}</p>
                                <p>Материал - {{$usaHold->materials}}</p>
                                <p>Производство - {{$usaHold->headquarters}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="accordion accordion-flush" id="faqlist55">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#faq-content-55" id="oceania">
                <header class="section-header" id="oceania">
                    <img id="oceania" src="{{asset('storage/images/holds/oceania.jpeg')}}" alt="oceania">
                </header>
                <header class="section-header" style="margin-left: 2em" id="oceania">
                    <p id="oceania">Oceania <br> <h2 id="oceania"> Кол-во производителей зацеп - {{count($oceania)}}</h2></p>
                </header>
            </button>
        </h2>
        <div id="faq-content-55"
             class="accordion-collapse collapse"
             data-bs-parent="#faqlist55">
            <div class="accordion-body">
                <div class="col-xl-8 d-flex content" style="width: 85.666667%; margin-left: 2em">
                    <div class="row align-self-center gy-4">
                        @foreach($oceania as $oceaniaHold)
                        <div class="col-lg-4 mt-4 mt-lg-0">
                            <div class="box" data-aos="fade-up" data-aos-delay="200">
                                @if($oceaniaHold->members)
                                <img src="storage{{$oceaniaHold->members}}" alt="">
                                @endif
                                <br>
                                <h4><a href="{{$oceaniaHold->url}}">{{$oceaniaHold->name}}</a></h4>
                                <p>Тип - {{$oceaniaHold->type}}</p>
                                <p>Материал - {{$oceaniaHold->materials}}</p>
                                <p>Производство - {{$oceaniaHold->headquarters}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
