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
    </section>
    <script>
        /**
         * PHP Email Form Validation - v3.0
         * URL: https://bootstrapmade.com/php-email-form/
         * Author: BootstrapMade.com
         */
        (function () {
            "use strict";

            let forms = document.querySelectorAll('.php-email-form');

            forms.forEach( function(e) {
                e.addEventListener('submit', function(event) {
                    event.preventDefault();
                    var option = document.getElementsByClassName('star');
                    if (!(option[0].checked || option[1].checked || option[2].checked || option[3].checked || option[4].checked)) {
                        displayError(this, 'Проголосуйте звездочками это обязательно для заполнения');
                        return;
                    }
                    let thisForm = this;
                    let action = thisForm.getAttribute('action');
                    let recaptcha = thisForm.getAttribute('data-recaptcha-site-key');
                    if( ! action ) {
                        displayError(thisForm, 'The form action property is not set!')
                        return;
                    }
                    thisForm.querySelector('.loading').classList.add('d-block');
                    thisForm.querySelector('.error-message').classList.remove('d-block');
                    thisForm.querySelector('.sent-message').classList.remove('d-block');

                    let formData = new FormData( thisForm );

                    if ( recaptcha ) {
                        if(typeof grecaptcha !== "undefined" ) {
                            grecaptcha.ready(function() {
                                try {
                                    grecaptcha.execute(recaptcha, {action: 'php_email_form_submit'})
                                        .then(token => {
                                            formData.set('recaptcha-response', token);
                                            php_email_form_submit(thisForm, action, formData);
                                        })
                                } catch(error) {
                                    displayError(thisForm, error)
                                }
                            });
                        } else {
                            displayError(thisForm, 'The reCaptcha javascript API url is not loaded!')
                        }
                    } else {
                        php_email_form_submit(thisForm, action, formData);
                    }
                });
            });

            function php_email_form_submit(thisForm, action, formData) {
                let userId = $('#userId').val();

                fetch(action, {
                    method: 'POST',
                    body: formData,
                    headers: {'X-Requested-With': 'XMLHttpRequest'}
                })
                    .then(response => {
                        if( response.ok ) {
                            thisForm.querySelector('.loading').classList.remove('d-block');
                            thisForm.querySelector('.sent-message').classList.add('d-block');
                            thisForm.reset();
                            if(userId !== undefined){
                                getProfileReviewAndRate(userId);
                            }
                        } else {
                            if(userId !== undefined){
                                if(response.statusText === 'You already did review') {
                                    let msg = 'Вы уже сделали отзыв';
                                    throw new Error(msg);
                                }

                            }
                            throw new Error(`${response.status} ${response.statusText} ${response.url}`);
                        }
                    })
                    .catch((error) => {
                        displayError(thisForm, error);
                    });
            }

            function displayError(thisForm, error) {
                thisForm.querySelector('.loading').classList.remove('d-block');
                thisForm.querySelector('.error-message').innerHTML = error;
                thisForm.querySelector('.error-message').classList.add('d-block');
            }

        })();
        function getProfileReviewAndRate(userId){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: '/getrating',
                data: {
                    userId: userId,
                },
                success: function(data) {
                    $('#allReview').html(data);
                },
                error: function(data) {
                }
            });
        }

    </script>
    <!-- End Team Section -->
@endsection
