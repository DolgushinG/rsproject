@extends('layout')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/css/suggestions.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/js/jquery.suggestions.min.js"></script>
    <!-- ======= Hero Section ======= -->
    <section id="register" class="register fadeInDown">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-5
                                    text-center p-0 mt-3 mb-2">
                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <span class="text-uppercase text-primary d-block mb-3" data-aos="fade-left" data-aos-delay="300">{{ $error }}</span>
                            @endforeach
                        @endif

                        @if(session('success'))
                            <div class="text-uppercase text-primary text-success aos-init aos-animate" data-aos="fade-left" data-aos-delay="300" role="alert">
                                <p>{{session('success')}} </p>
                            </div>
                        @endif

                        <h2 id="heading">Регистрация вашего личного профиля</h2>
                        <p>Заполните поля в следующих 3-х шагах</p>
                        <form action="{{ route('register') }}" method="POST" id="msform"  name="frmSample" class="was-validated">
                            @csrf
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Аккаунт</strong></li>
                                <li id="personal"><strong>Личный</strong></li>
                                <li id="confirm"><strong>Почти всё</strong></li>
                            </ul>
                            <div class="progress">
                                <div class="progress-bar
                                                    progress-bar-striped
                                                    progress-bar-animated" role="progressbar" aria-valuemin="0"
                                    aria-valuemax="100">
                                </div>
                            </div>
                            <br> <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="fs-title">Информация об аккаунте:</h2>
                                        </div>
                                        <div class="col-5">
                                            <h2 class="steps">Шаг 1 - 4</h2>
                                        </div>
                                    </div>
                                    <label for="validationInput" class="fieldlabels">Email:*</label>
                                    <div class="mb-3">
                                    <input id="email" type="email" name="email" class="email_id form-control"
                                        placeholder="" required>
                                    </div>
                                    <label class="fieldlabels">Имя и фамилия:*</label>
                                    <div class="mb-3">
                                    <input id="name" type="text" name="name"
                                        class="form-control register_input" placeholder="" required
                                        autocomplete="username">
                                    </div>
                                    <label class="fieldlabels">Пароль:*</label>
                                    <div class="mb-3">
                                    <input id="password" name="password" type="password"
                                    class="form-control register_input" required
                                        autocomplete="new-password">
                                        <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        <div id="messageError2" class="alert alert-danger hide_error" role="alert">
                                            Пароль должен быть больше 6 символов, включая большие и маленькие буквы и цифры
                                        </div>
                                    </div>
                                    <label class="fieldlabels">Подтверждение пароля:*</label>
                                    <input id="password-confirm" type="password"
                                    class="form-control register_input" name="password_confirmation"
                                        placeholder="" required autocomplete="new-password">
                                        <span toggle="#password-confirm" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        <div id="messageError" class="alert alert-danger hide_error" role="alert">
                                            Пароли не совпадают
                                        </div>
                                </div>
                                <input type="button" name="next" class="next action-button" value="Дальше" disabled/>
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="fs-title">Информация об опыте:</h2>
                                        </div>
                                        <div class="col-5">
                                            <h2 class="steps">Step 2 - 4</h2>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center mt-100">
                                        <div class="col-md-10">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <h2>Облаться накрутки</h2>
                                                    @foreach ($categories as $category)
                                                        <label class="check">
                                                            <input id="categories{{ $category->id }}" type="checkbox" name="categories[{{ $category->id }}]"
                                                                value="{{ $category->id }}" unchecked>
                                                            <span>{{ $category->category_name }}</span></label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <label class="fieldlabels">Оплата за час</label>
                                    <div class="mb-3">
                                    <input type="text" id="salary_hour" class="form-control is-invalid" name="salary_hour" placeholder="" required>
                                    </div>
                                    <label class="fieldlabels">Оплата за трассу</label>
                                    <div class="mb-3">
                                    <input type="text" id="salary_route" class="form-control is-invalid" name="salary_route" placeholder="" required>
                                    </div>
                                    <label class="fieldlabels">Ваш опыт</label>
                                    <div class="mb-3">
                                        <select name="exp_level" id="exp_level" class="form-select" required aria-label="select example">
                                            <option value="">Выбрать</option>
                                            <option value="beginner">Начинающий (до 1 года)</option>
                                            <option value="middle">Средний уровень(от 1 года)</option>
                                            <option value="senior">Опытный(Главный подготовщик ~ от 2 лет)</option>
                                        </select>
                                        <div class="invalid-feedback">Выберите ваш уровень</div>
                                    </div>
                                    <label class="fieldlabels is-invalid" for="validationTextarea">О себе</label>
                                    <textarea type="text" id="validationTextarea" name="description"
                                        placeholder=""></textarea>

                                    <label class="fieldlabels">Курсы подготовщика </label>
                                    <div class="mb-3">
                                        <select name="educational_requirements" id="educational_requirements" class="form-select" required
                                            aria-label="Default select example">
                                            <option value="">Выбрать</option>
                                            <option value="yes">да</option>
                                            <option value="no">нет</option>
                                        </select>
                                        <div class="invalid-feedback">Выберите ваш уровень</div>
                                    </div>
                                    <label class="fieldlabels">Максимальная категория лазания</label>
                                    <div class="mb-3">
                                        <select name="grade" class="form-select" id="grade" required aria-label="Default select example">
                                            <option value="">Выбрать</option>
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->grades_name }}">{{ $grade->grades_name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">Выберите максимальную категорию</div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                <label class="fieldlabels">Опыт подготовки Местных соревнований</label>
                                <input type="range" min="0" max="5" step="1" value="0" id="foo1" name="exp_local" style="padding: 8px 15px 8px 0px;">
                                <label class="fieldlabels">Опыт подготовки Национальных соревнований</label>
                                <input type="range" min="0" max="5" step="1" value="0" id="foo2" name="exp_national" style="padding: 8px 15px 8px 0px;">
                                <label class="fieldlabels">Опыт подготовки Междунарожных соревнований</label>
                                <input type="range" min="0" max="5" step="1" value="0" id="foo3" name="exp_international" style="padding: 8px 15px 8px 0px;">
                                </div>
                                <div id="messageError3" class="alert alert-danger hide_error" role="alert">
                                    <p>Вы забыли выбрать область накрутки наверху страницы</p>
                                </div>
                                <input type="button" name="next" class="next action-button next2" value="Дальше" disabled>
                                <input type="button" name="previous" class="previous action-button-previous"
                                    value="Назад">
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="fs-title">Последний шаг</h2>
                                        </div>
                                        <div class="col-5">
                                            <h2 class="steps">Шаг 2 - 3</h2>
                                        </div>
                                    </div>
                                    <label class="fieldlabels">Ваш город</label>
                                    <input type="text" id="city" class="form-control is-invalid" name="city_name" placeholder="" required/>
                                    <label class="fieldlabels">Место работы (скалодром)</label>
                                    <input type="text" name="company" placeholder="">
                                    <div class="col-7">
                                        <h2 class="fs-title">Как с вами связаться?(не обязательные поля)</h2>
                                    </div>
                                    <label class="fieldlabels">Telegram</label>
                                    <input type="text" id="telegram" name="telegram" placeholder="Имя в телеграмме, после @">
                                    <label class="fieldlabels">Instagram </label>
                                    <input type="text" id="instagram" name="instagram" placeholder="Имя после https://instagram.com/">
                                    <label class="fieldlabels">Если нет telegram и instagram? запасной контакт для
                                        связи</label>
                                    <input type="text" id="contact" class="form-control is-invalid" name="contact" placeholder="ссылка на соц.сети или телефон" required>
                                </div>
                                <button type="submit" class="action-button next3" name="next" value="Submit" disabled>
                                    <span id="regLoader" style="display: none"><i class="fa fa-spinner fa-pulse"></i><span
                                            class="sr-only">Loading...</span>&nbsp;</span>
                                    регистрация</button>
                                <input type="button" name="previous" class="previous action-button-previous" value="Назад">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="{{ asset('js/ddata.js') }}"></script>
    <script src="{{ asset('js/register.js') }}"></script>
@endsection
