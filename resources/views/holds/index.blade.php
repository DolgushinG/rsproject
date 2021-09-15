@extends('layout')
@section('content')
    <section id="features" class="features">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>База скалолазных зацепок</p>
            </header>
            <div class="row">
                <!-- Feature Icons -->
                <div class="row feature-icons" data-aos="fade-up">
                    <div class="row">
                        <div id="holds">
                            @include('holds.holds')
                        </div>
                    </div>
                </div>
                <div class="accordion accordion-flush" id="faqlist1">
                    <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-1">
                                    <h6> name accordion </h6>
                                </button>
                            </h2>
                            <div id="faq-content-1"
                                 class="accordion-collapse collapse"
                                 data-bs-parent="#faqlist1">
                                <div class="accordion-body">
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
                                                    <form action="{{route('sendHold')}}" method="POST" class="php-email-form-add-new-holds">
                                                        @csrf
                                                        <div class="row gy-4">
                                                            <div class="col-md-6">
                                                                <input type="text" name="name" class="form-control" placeholder="Введите название скалодрома"
                                                                       required>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                                <input id="country" type="text" name="country" class="form-control"
                                                                       placeholder="Введите страну" required>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                                <input id="region" type="text" name="region" class="form-control"
                                                                       placeholder="Введите регион" required>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                                <input id="city" type="text" name="city" class="form-control"
                                                                       placeholder="Введите город" required>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                                <input id="street" type="text" name="street" class="form-control"
                                                                       placeholder="Введите улицу" required>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                                <input id="house" type="text" name="house" class="form-control"
                                                                       placeholder="Введите дом" required>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" name="url" placeholder="Введите ссылку на веб-сайт" >
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="telephone">Телефон</label>
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
                        </div>
                </div>
                <!-- End Feature Icons -->
            </div>
        </div>
    </section>
    <script>
        getHolds();
        function getHolds() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: '/climbing-holds/holds',
                success: function (data) {
                    $('#holds').html(data);
                },
            });
        }

        /**
         * PHP Email Form Validation - v3.0
         * URL: https://bootstrapmade.com/php-email-form/
         * Author: BootstrapMade.com
         */
        (function () {
            "use strict";

            let forms = document.querySelectorAll('.php-email-form-add-new-holds');

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

    </script>
@endsection
