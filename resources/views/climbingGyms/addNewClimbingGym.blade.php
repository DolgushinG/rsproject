@extends('layout')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/css/suggestions.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/js/jquery.suggestions.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.60/inputmask/jquery.inputmask.js"></script>
    <div class="container">
        <div class="row justify-content-center">
        </div>
    </div>
                <!-- ======= Contact Section ======= -->
                <section id="contact" class="contact2">
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
                                            <input type="text" name="name" class="form-control"
                                                   placeholder="Введите название скалодрома"
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
                                            <input type="text" class="form-control" name="url"
                                                   placeholder="Введите ссылку на веб-сайт">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="telephone">Телефон</label>
                                            <input class="form-control" id="telephone" type="tel" name="phone"
                                                   pattern="(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?"
                                                   title="Введите номер телефона в формате +7 XXX XXX XX XX" required>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="time1">Время работы с</label>
                                            <input class="form-control" type="time" id="time1" name="time1" rows="6"
                                                   placeholder="Время работы с"
                                                   required>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="time2">Время работы до</label>
                                            <input class="form-control" type="time" id="time2" name="time2" rows="6"
                                                   placeholder="Время работы до"
                                                   required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="scheduleDay">Дни работы</label>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="scheduleDay[1]" type="checkbox" id="flexSwitchCheckDefault" value="Пн">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Пн</label>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="scheduleDay[2]" type="checkbox" id="flexSwitchCheckDefault" value="Вт">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Вт</label>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="scheduleDay[3]" type="checkbox" id="flexSwitchCheckDefault" value="Ср">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Ср</label>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="scheduleDay[4]" type="checkbox" id="flexSwitchCheckDefault" value="Чт">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Чт</label>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="scheduleDay[5]" type="checkbox" id="flexSwitchCheckDefault" value="Пт">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Пт</label>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="scheduleDay[6]" type="checkbox" id="flexSwitchCheckDefault" value="Сб">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Сб</label>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="scheduleDay[7]" type="checkbox" id="flexSwitchCheckDefault" value="Вс">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Вс</label>
                                            </div>
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

    <script>

        /**
         * PHP Email Form Validation - v3.0
         * URL: https://bootstrapmade.com/php-email-form/
         * Author: BootstrapMade.com
         */
        (function () {
            "use strict";

            let forms = document.querySelectorAll('.php-email-form-add-new');

            forms.forEach(function (e) {
                e.addEventListener('submit', function (event) {
                    event.preventDefault();

                    let thisForm = this;

                    let action = thisForm.getAttribute('action');
                    let recaptcha = thisForm.getAttribute('data-recaptcha-site-key');
                    if (!action) {
                        displayError(thisForm, 'The form action property is not set!')
                        return;
                    }
                    thisForm.querySelector('.loading').classList.add('d-block');
                    thisForm.querySelector('.error-message').classList.remove('d-block');
                    thisForm.querySelector('.sent-message').classList.remove('d-block');

                    let formData = new FormData(thisForm);

                    if (recaptcha) {
                        if (typeof grecaptcha !== "undefined") {
                            grecaptcha.ready(function () {
                                try {
                                    grecaptcha.execute(recaptcha, {action: 'php_email_form_submit'})
                                        .then(token => {
                                            formData.set('recaptcha-response', token);
                                            php_email_form_submit(thisForm, action, formData);
                                        })
                                } catch (error) {
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
                        if (response.ok) {
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

        $(document).ready(function () {
            $('#telephone').inputmask('+7(999)-999-9999');
        });

        // Замените на свой API-ключ
        var token = "33c419ffb77324c6b14c23909f66ac321646a8cc";

        var type = "ADDRESS";
        var $region = $("#region");
        var $city = $("#city");
        var $street = $("#street");
        var $house = $("#house");
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
            onSelect: function (suggestion) {
            }
        });
        // город и населенный пункт
        $city.suggestions({
            token: token,
            type: "ADDRESS",
            hint: false,
            bounds: "city",
            constraints: {
                locations: { city_type_full: "город" }
            },
            formatResult: formatResult,
            formatSelected: formatSelected,
            onSelect: function(suggestion) {
                console.log(suggestion);
            }
        });

        // улица
        $street.suggestions({
            token: token,
            type: type,
            hint: false,
            bounds: "street",
            constraints: $city,
            count: 15
        });

        // дом
        $house.suggestions({
            token: token,
            type: type,
            hint: false,
            noSuggestionsHint: false,
            bounds: "house",
            constraints: $street
        });
        var defaultFormatResult = $.Suggestions.prototype.formatResult;

        function formatResult(value, currentValue, suggestion, options) {
            var newValue = suggestion.data.city;
            suggestion.value = newValue;
            return defaultFormatResult.call(this, newValue, currentValue, suggestion, options);
        }

        function formatSelected(suggestion) {
            return suggestion.data.city;
        }

    </script>
    <!-- End Team Section -->

@endsection
