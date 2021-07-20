@extends('layout')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h2 data-aos="fade-up" data-aos-delay="400">Поддержка дальнейшего развития сайта</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="https://www.tinkoff.ru/collectmoney/crowd/dolgushin.georgiy1/nuEen8709/?short_link=1ZyTiSRkXmZ&httpMethod=GET"
                               class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Поддержать</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{asset('storage/images/tin.png')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
    <main id="main" style="margin-top: -10rem;margin-bottom: 10em;" >
        <!-- ======= F.A.Q Section ======= -->
        <section id="faq" class="faq" style="padding: 0px 0;">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h1>На что идут деньги?</h1>
                </header>
                <div class="row">
                    <div class="col-lg-6">
                        <!-- F.A.Q List 1-->
                        <div class="accordion accordion-flush" id="faqlist1">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faq-content-1">
                                        Обслуживание сайта
                                    </button>
                                </h2>
                                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                                    <div class="accordion-body">
                                        - Аренда сервера
                                        - Продление домена
                                        - Покупка ssl сертификата
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faq-content-2">
                                        Разработка новых возможностей сайта
                                    </button>
                                </h2>
                                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                                    <div class="accordion-body">
                                        Развитие сайта, очень трудоемкий процесс, так как я один, приходится смотреть что было
                                        красиво, функционально, юзерфрендли и все дела.
                                        А так же адаптивность на всех устройства отнимает много времени.
                                        Может кто то помочь? welcome!
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faq-content-3">
                                        Пришла идеи которая может скалолазному сообществу ?
                                    </button>
                                </h2>
                                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                                    <div class="accordion-body">
                                        Пишите, рассмотрим, обсудим
                                        добавим, новый функционал.
                                        Разработка ведется в свободное время, поэтмому терпение наш лучший друг!
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6">

                        <!-- F.A.Q List 2-->
                        <div class="accordion accordion-flush" id="faqlist2">

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faq2-content-1">
                                       Зачем все это?
                                    </button>
                                </h2>
                                <div id="faq2-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                                    <div class="accordion-body">
                                        Проект нацелен на развитие скалолазного сообщества, по всем аспектам.
                                        Наша цель внедрять технологии и упрощать жизнь.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faq2-content-2">
                                        Что за подписка на главной странице?
                                    </button>
                                </h2>
                                <div id="faq2-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                                    <div class="accordion-body">
                                       Подписка для тех кто не хочет пропускать скалолазную движуху соревнований и каждую
                                        неделю будет приходить письмо со скалолазными событиями.
                                        Категории - трудность, боулдеринг, местный старты по всей России.
                                        *База пополняется поэтому возможно если здесь вы не нашли событие, не серчайте,
                                        вы можете нам помочь и добавить их самостоятельно <a href="{{route('add-event')}}">здесь</a>.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faq2-content-3">
                                        Нашли ошибку, баг, что не работает?
                                    </button>
                                </h2>
                                <div id="faq2-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                                    <div class="accordion-body">
                                        Свяжитесь с нами и сообщите об этом, мы это быстро поправим.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
