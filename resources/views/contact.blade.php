@extends('layout')
@section('content')

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <!-- ======= Contact Section ======= -->
                <section id="contact" class="contact">
                    <div class="container" data-aos="fade-up">
                        <header class="section-header">
                            <h2>Связь с нами</h2>
                        </header>
                        <div class="row gy-4">
                            <div class="col-lg-6">
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <div class="info-box">
                                            <i class="bi bi-geo-alt"></i>
                                            <h3>Адрес</h3>
                                            <p>Санкт-Петербург</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-box">
                                            <i class="bi bi-telephone"></i>
                                            <h3>Звонок нам</h3>
                                            <p><a href="tel: +74951234567">+7 (999) 209-55-96</a></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-box">
                                            <i class="bi bi-envelope"></i>
                                            <h3>Email Us</h3>
                                            <p>info@routesetters.ru</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-box">
                                            <i class="bi bi-emoji-wink"></i>
                                            <h3>Мы читаем ваши сообщение и реагируем</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <form action="{{route('postfeedback')}}" method="POST" class="php-email-form">
                                    @csrf
                                    <div class="row gy-4">
                                        <div class="col-md-6">
                                            <input type="text" name="name" class="form-control" placeholder="Ваше имя"
                                                   required>
                                        </div>
                                        <div class="col-md-6 ">
                                            <input type="email" class="form-control" name="email"
                                                   placeholder="Ваш Email" required>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="subject" placeholder="Тема сообщения"
                                                   required>
                                        </div>
                                        <div class="col-md-12">
                                            <textarea class="form-control" name="message" rows="6" placeholder="Текст сообщения"
                                                      required></textarea>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <div class="loading">Loading</div>
                                            <div class="error-message"></div>
                                            <div class="sent-message">Ваше сообщение было отправлено</div>
                                            <button type="submit">Отправить</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section><!-- End Contact Section -->
            </div>
        </div>
    </section><!-- End Team Section -->
@endsection
