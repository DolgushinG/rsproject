@extends('layout')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/css/suggestions.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/js/jquery.suggestions.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.60/inputmask/jquery.inputmask.js"></script>

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <!-- ======= Contact Section ======= -->
                <section id="contact" class="contact">
                    <div class="container" data-aos="fade-up">
                        <header class="section-header">
                            <h2>Добавить скалодром</h2>
                        </header>
                        <div class="row gy-4">
                            <div class="col-lg-6">
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <div class="info-box">
                                            <i class="bi bi-calendar2-check"></i>
                                            <h3>1 шаг</h3>
                                            <p>Заполните данные</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-box">
                                            <i class="bi bi-check-square-fill"></i>
                                            <h3>2 шаг</h3>
                                            <p>Если корректно нажмите отправить</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-box">
                                            <i class="bi bi-eye-fill"></i>
                                            <h3>3 шаг</h3>
                                            <p>Вашу заявку рассмотрят</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-box">
                                            <i class="bi bi-file-earmark-richtext"></i>
                                            <h3>После одобрения скалодром будет видно в течение дня</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <form action="{{route('add-cl-gyms')}}" method="POST" class="php-email-form-add-new">
                                    @csrf
                                    <div class="row gy-4">
                                        <div class="col-md-6">
                                            <input type="text" name="name" class="form-control" placeholder="Ваше имя"
                                                   required>
                                        </div>
                                        <div class="col-md-6 ">
                                            <input id="country" type="text" name="country" class="form-control"
                                                   placeholder="Введите страну" required>
                                        </div>
                                        <div class="col-md-6 ">
                                            <input id="address" type="text" name="address" class="form-control"
                                                   placeholder="Введите адрес" required>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="url" placeholder="Введите ссылку на веб-сайт" >
                                        </div>
                                        <div class="col-md-12">
                                            <input class="form-control" id="telephone" type="tel" name="phone" pattern="(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?" title="Введите номер телефона в формате +7 XXX XXX XX XX" required>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="time1">Время работы с</label>
                                            <input class="form-control" type="time" id="time1"  name="time1" rows="6" placeholder="Время работы с"
                                                      required>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="time2">Время работы до</label>
                                            <input class="form-control" type="time" id="time2" name="time2" rows="6" placeholder="Время работы до"
                                                      required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="scheduleDay">Дни работы</label>
                                            <select name="scheduleDay[]" id="scheduleDay" class="form-select" required aria-label="select example" multiple>
                                                <option value="Пн">Пн</option>
                                                <option value="Вт">Вт</option>
                                                <option value="Ср">Ср</option>
                                                <option value="Чт">Чт</option>
                                                <option value="Сб">Сб</option>
                                                <option value="Вс">Вс</option>
                                            </select>
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

            let forms = document.querySelectorAll('.php-email-form-add-new');

            forms.forEach( function(e) {
                e.addEventListener('submit', function(event) {
                    event.preventDefault();

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
                        } else {
                            throw new Error(`${response.statusText}`);
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

        $(document).ready(function(){
            $('#telephone').inputmask('+7(999)-999-9999');
        });
    </script>
    <script type="text/javascript" src="{{ asset('js/ddata.js') }}"></script>
    <!-- End Team Section -->
@endsection
