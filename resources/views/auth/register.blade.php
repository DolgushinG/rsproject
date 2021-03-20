@extends('layout')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/css/suggestions.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/js/jquery.suggestions.min.js"></script>
 <!-- ======= Hero Section ======= -->
 <section id="register" class="register">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-5
                                text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2 id="heading">Sign Up Your User Account</h2>
                    <p>Fill all form field to go to next step</p>
                    <form action="{{ route('register') }}" method="POST" id="msform">
                        @csrf
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account"><strong>Account</strong></li>
                            <li id="personal"><strong>Personal</strong></li>
                            <li id="confirm"><strong>Finish</strong></li>
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
                                        <h2 class="fs-title">Account Information:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 1 - 4</h2>
                                    </div>
                                </div>
                                <label class="fieldlabels">Email:*</label>
                                <input id="email" type="email" name="email" placeholder="Email">
                                <label class="fieldlabels">Username: *</label>
                                <input id="name" type="text" name="name" placeholder="UserName" required autocomplete="username">
                                <label class="fieldlabels">Password:*</label>
                                <input id="password" name="password" type="password" required autocomplete="new-password"> 
                                <label class="fieldlabels">Confirm Password: *</label>
                                <input id="password-confirm" type="password" name="password-confirm" placeholder="Confirm Password" required autocomplete="new-password">
                            </div>
                            <input type="button" name="next" class="next action-button" value="Next"/>
                            </fieldset>
                            <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Personal Information:</h2>
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
                                                @foreach($categories as $category)
                                                <label class="check">
                                                <input type="checkbox" name="categories[{{$category->id}}]" value="{{$category->id}}" unchecked> <span>{{$category->category_name}}</span></label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <label class="fieldlabels">Оплата за час</label>
                                <input type="text" name="salary" placeholder="salary"/>
                                <label class="fieldlabels">Ваш опыт</label>
                                <select name="exp_level" class="form-select" aria-label="Default select example">
                                    <option selected>Выбрать</option>
                                    <option value="beginner">Начинающий (до 1 года)</option>
                                    <option value="middle">Средний уровень(от 1 года)</option>
                                    <option value="senior">Опытный(Главный подготовщик ~ от 2 лет)</option>
                                </select> 
                                <label class="fieldlabels">О себе </label>
                                <textarea type="text" name="description" placeholder="Я крутил там"></textarea>
                                <label class="fieldlabels">Курсы подготовщика </label>
                                <select name="educational_requirements" class="form-select" aria-label="Default select example">
                                    <option selected>Выбрать</option>
                                    <option value="yes">да</option>
                                    <option value="no">нет</option>
                                    </select> 
                                </div>
                                <label class="fieldlabels">Опыт подготовки местных соревнований</label>
                                <input type="range" min="0" max="5" step="1" value="1" id="foo" name="exp_local">
                                <label class="fieldlabels">Опыт подготовки Национальных соревнований</label>
                                <input type="range" min="0" max="5" step="1" value="1" id="foo" name="exp_national">
                                <label class="fieldlabels">Опыт подготовки междунарожных соревнований</label>
                                <input type="range" min="0" max="5" step="1" value="1" id="foo" name="exp_international">
                                <input type="button" name="next" class="next action-button" value="Next"/>
                                <input type="button" name="previous" class="previous action-button-previous"
                                value="Previous"/>
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
                                <input type="text" id="city" name="city_name" placeholder="salary"/>
                                <label class="fieldlabels">Ваш пол</label>
                                <select name="gender" class="form-select" aria-label="Default select example">
                                    <option selected>Выбрать</option>
                                    <option value="male">Муж</option>
                                    <option value="female">Жен</option>
                                </select> 
                                <label class="fieldlabels">Место работы</label>
                                <input type="text" name="company" placeholder="скалодром">
                                <label class="fieldlabels">Контакты для связи </label>
                                <input type="text" name="contact" placeholder="Telegram, email, или ссылка на соц сеть.">
                            </div>
                            <button type="submit" name="next" value="Submit">
                                <span id="regLoader" style="display: none"><i
                                        class="fa fa-spinner fa-pulse"></i><span
                                        class="sr-only">Loading...</span>&nbsp;</span>
                                регистрация</button>
                            <input type="button" name="previous" class="previous action-button-previous"
                                value="Назад">
                            </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section> 

<script type="text/javascript" src="{{ asset('js/ddata.js') }}"></script>
@endsection
