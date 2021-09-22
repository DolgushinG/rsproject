@extends('layout')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/css/suggestions.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/js/jquery.suggestions.min.js"></script>
    <!-- ======= Values Section ======= -->
    <section id="values" class="values">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>База производителей зацепок</p>
            </header>

            @auth
                <div class="accordion accordion-flush" id="faqlist1">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#faq-content-1">
                                <header class="section-header">
                                    <h2>Добавить производителя зацеп</h2>
                                </header>
                            </button>
                        </h2>
                        <div id="faq-content-1"
                             class="accordion-collapse collapse"
                             data-bs-parent="#faqlist1">
                            <div class="accordion-body">
                                <section id="contact" class="contact">
                                    <div class="container" data-aos="fade-up">
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
                                                            <h3>После одобрения производителя будет видно в течение дня</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <form action="{{route('send-hold')}}" method="POST" class="php-email-form-add-new-holds">
                                                    @csrf
                                                    <div class="row gy-4">
                                                        <div class="col-md-6">
                                                            <input type="text" name="name" class="form-control" placeholder="Введите название производителя"
                                                                   required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <select name="materials[]" class="form-select" required aria-label="select example" multiple>
                                                                <option value="PU">PU</option>
                                                                <option value="fiberglass">fiberglass</option>
                                                                <option value="wood">wood</option>
                                                                <option value="holds">holds</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <select name="zone" class="form-select" required aria-label="select example">
                                                                <option value="Europe">Europe</option>
                                                                <option value="Asia">Asia</option>
                                                                <option value="Oceania">Oceania</option>
                                                                <option value="USA">USA</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 ">
                                                            <input id="country" type="text" name="country" class="form-control"
                                                                   placeholder="Введите страну" required>
                                                        </div>
                                                        <div class="col-md-6 ">
                                                            <input id="city" type="text" name="city" class="form-control"
                                                                   placeholder="Введите город" required>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="url" placeholder="Введите ссылку на веб-сайт" >
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="file">Прикрепите лого</label>
                                                            <input type="file" id="file" class="form-control" name="image"
                                                                   placeholder="Прикрепите лого"
                                                                   required>
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
            @endauth
                <div class="row" id="holds">
                    @include('holds.holds')
                </div>
        </div>
    </section>
    <script>
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
                            getHolds()
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
        // Замените на свой API-ключ
        var token = "33c419ffb77324c6b14c23909f66ac321646a8cc";

        var type  = "ADDRESS";
        var $region = $("#region");
        var $city   = $("#city");
        var $country = $("#country");
        // регион и район
        $region.suggestions({
            token: token,
            type: type,
            hint: false,
            bounds: "region-area"
        });
        $country.suggestions({
            token: token,
            type: "COUNTRY",
            onSelect: function(suggestion) {
            }
        });
        // город и населенный пункт
        $city.suggestions({
            token: token,
            type: type,
            hint: false,
            bounds: "city-settlement",
            constraints: $region
        });
    </script>
@endsection
