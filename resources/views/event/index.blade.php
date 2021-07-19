@extends('layout')
@section('content')
        <link href="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/css/suggestions.min.css"
              rel="stylesheet"/>
        <script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/js/jquery.suggestions.min.js"></script>
        <!-- ======= Hero Section ======= -->
        <div class="container">
            <div class="row justify-content-center">
            </div>
        </div>
                <!-- ======= Contact Section ======= -->
                <section id="contact" class="contact">
                    <div class="container" data-aos="fade-up">
                        <header class="section-header">
                            <h2>Отправить данные о соревнованиях</h2>
                        </header>
                        <div class="row gy-4">
                            <div class="col-lg-6">
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <div class="info-box">
                                            <i class="bi bi-geo-alt"></i>
                                            <h3>1 шаг</h3>
                                            <p>Заполните данные</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-box">
                                            <i class="bi bi-telephone"></i>
                                            <h3>2 шаг</h3>
                                            <p>Если корректно нажмите отправить</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-box">
                                            <i class="bi bi-envelope"></i>
                                            <h3>3 шаг</h3>
                                            <p>Вашу заявку рассмотрят</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-box">
                                            <i class="bi bi-emoji-wink"></i>
                                            <h3>После одобрения соревнование будет видно в течение дня</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <form action="{{route('add-event')}}" method="POST" class="php-email-form-add-event"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row gy-4">
                                        <div class="col-md-12">
                                            <input type="text" name="event_title" class="form-control"
                                                   placeholder="Ваше название соревнований"
                                                   required>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card-body text-center">
                                                <h3>Облаcть соревнования</h3>
                                                <div class="row">
                                                    @foreach($categories as $category)
                                                        <div class="col-6 col-md-4">
                                                            <label class="check"
                                                                   style="margin-left: 0px;margin-top: 5px;">
                                                                <input type="checkbox" id="event_categories"
                                                                       name="event_categories[{{$category->id}}]"
                                                                       value="{{$category->id}}" unchecked> <span
                                                                    style="border-radius: 15px; padding: 0px 14px;">{{$category->category_name}}</span></label><br>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="event_start_date">Дата старта соревнований</label>
                                            <input type="date" id="event_start_date" class="form-control"
                                                   name="event_start_date"
                                                   placeholder="Введите старт соревнований" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="event_start_time">Время старта соревнований</label>
                                            <input type="time" id="event_start_time" class="form-control"
                                                   name="event_start_time"
                                                   placeholder="Введите старт соревнований" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="event_end_date">Конец соревнований</label>
                                            <input type="date" class="form-control" id="event_end_date"
                                                   name="event_end_date"
                                                   placeholder="Введите конец соревнований" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="event_start_time">Время конца соревнований</label>
                                            <input type="time" id="event_end_time" class="form-control"
                                                   name="event_end_time"
                                                   placeholder="Введите старт соревнований" required>
                                        </div>
                                        <div class="col-md-12">
                                            <input id="city" type="text" class="form-control" name="event_city"
                                                   placeholder="Город"
                                                   required>
                                        </div>
                                        <div class="col-md-12">
                                            <textarea class="form-control" name="event_description" rows="6"
                                                      placeholder="Краткое описание"
                                                      required></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="file" class="form-control" name="event_image" rows="6"
                                                   placeholder="Прикрепите фото или афишу"
                                                   required>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="event_url" rows="6"
                                                   placeholder="Введите ссылку на соревнование"
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
                </section>
            </div>
        </div>

    <!-- End Contact Section -->
    <script>
        /**
         * PHP Email Form Validation - v3.0
         * URL: https://bootstrapmade.com/php-email-form/
         * Author: BootstrapMade.com
         */
        (function () {
            "use strict";
            let forms = document.querySelectorAll('.php-email-form-add-event');
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
    </script>
    <script type="text/javascript" src="{{ asset('js/ddata.js') }}"></script><!-- End Team Section -->
@endsection
