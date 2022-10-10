
<div class="tab-pane active show" id="tab-edit">
    <form action="{{ route('editChanges') }}" method="POST" id="editForm">
        @csrf
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Email</label>
            <div class="col-lg-9">
                <input type="text" disabled id="email" name="email" class="form-control" value="{{$user->email}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Загрузить новое фото</label>
            <div class="col-lg-9">
                <input type="file" name="image" class="image">
                <div class="text-dark small mt-1">Допустимые форматы JPG, GIF or PNG. Макс. размер 8 мб</div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Город</label>
            <div class="col-lg-6">
                <input type="text" name="city_name" id="city" class="form-control" value="{{$user->city_name}}" required>
            </div>
        </div>
        <div class="form-group row"><label
                class="col-lg-3 col-form-label form-control-label">Имя</label>
            <div class="col-lg-9">
                <input type="text" id="name" name="name" class="form-control" value="{{$user->name}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">О себе</label>
            <div class="col-lg-9">
            <textarea type="text" name="description"
                      placeholder="Я давно уже работаю подготовщик .... ">{{$user->description}}</textarea>
            </div>
        </div>
        <h3>Опыт</h3>
        <hr>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Ваш опыт</label>
            <div class="col-lg-9">
                <select name="exp_level" class="form-select" aria-label="Default select example">
                <option selected value="">Выбрать</option>
                @if ($user->exp_level === 1)
                    <option selected value="1">Начинающий (до 1 года)</option>
                    <option value="2">Средний уровень (от 1 года)</option>
                    <option value="3">Опытный (Главный подготовщик ~ от 5 лет)</option>
                @elseif ($user->exp_level === 2)
                    <option value="1">Начинающий (до 1 года)</option>
                    <option selected value="2">Средний уровень (от 1 года)</option>
                    <option value="3">Опытный (Главный подготовщик ~ от 5 лет)</option>
                @elseif($user->exp_level === 3)
                    <option value="1">Начинающий (до 1 года)</option>
                    <option value="2">Средний уровень (от 1 года)</option>
                    <option selected value="3">Опытный (Главный подготовщик ~ от 5 лет)</option>
                @endif
            </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Курсы подготовщика</label>
            <div class="col-lg-9">
                <select name="educational_requirements" class="form-select" aria-label="Default select example">
                    <option>Выбрать</option>
                    @if ($user->educational_requirements === 'yes')
                        <option selected value="yes">проходил</option>
                        <option value="no">не проходил</option>
                    @else
                        <option value="yes">проходил</option>
                        <option selected value="no">не проходил</option>
                    @endif
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Максимальная категория лазания</label>
            <div class="col-lg-9">
                <select name="grade" class="form-select" aria-label="Default select example">
                    <option>Выбрать</option>
                    @foreach ($grades as $grade)
                        @if($grade->grades_name === $user->grade)
                            <option selected value="{{$grade->grades_name}}">{{$grade->grades_name}}</option>
                        @else
                            <option value="{{$grade->grades_name}}">{{$grade->grades_name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-9">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq-content-1">
                            Что означают эти шкалы внизу?
                        </button>
                    </h2>
                    <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                        <div class="accordion-body">
                            Опыт подготовки от 0 до 5 , по своему ощущению, на сколько часто вы крутили.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Опыт подготовки местных соревнований</label>
            <div class="col-lg-9">
                <input type="range" min="0" max="5" step="1" value="{{$user->exp_local}}" id="foo"
                       name="exp_local" style="width: 92%" oninput="this.nextElementSibling.value = this.value">
                <output>{{$user->exp_local}}</output>
                <label class="fieldlabels">Опыт подготовки Национальных соревнований</label>
                <input type="range" min="0" max="5" step="1" value="{{$user->exp_national}}" id="foo"
                       name="exp_national" style="width: 92%"
                       oninput="this.nextElementSibling.value = this.value">
                <output>{{$user->exp_national}}</output>
                <label class="fieldlabels">Опыт подготовки междунарожных соревнований</label>
                <input type="range" min="0" max="5" step="1" value="{{$user->exp_international}}" id="foo"
                       name="exp_international" style="width: 92%"
                       oninput="this.nextElementSibling.value = this.value">
                <output>{{$user->exp_international}}</output>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Облаcть накрутки</label>
            <div class="col-lg-9">
                    @foreach($categories as $category)
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="active" data-name="categories[{{$category->id}}]" type="checkbox" id="flexSwitchCheckChecked" checked value="1">
                        <label class="form-check-label" for="flexSwitchCheckChecked">{{$category->category_name}}</label>
                    </div>
                    @endforeach
                    @foreach($notCategories as $category)
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="active" data-name="categories[{{$category->id}}]" type="checkbox" id="flexSwitchCheckDefault" value="0">
                        <label class="form-check-label" for="flexSwitchCheckDefault">{{$category->category_name}}</label>
                    </div>
                    @endforeach
            </div>
        </div>
        <h3>Оплата</h3>
        <hr>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Оплата за час (любая дисциплина)</label>
            <div class="col-lg-9">
            <input type="text" name="salaryHour" class="form-control" value="{{$user->salary_hour}}"
                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Оплата за трассу трудность минимум</label>
            <div class="col-lg-9">
            <input type="text" name="salaryRouteRope" class="form-control"
                   value="{{$user->salary_route_rope}}"
                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Оплата за трассу боулдеринг минимум</label>
            <div class="col-lg-9">
            <input type="text" name="salaryRouteBouldering" class="form-control"
                   value="{{$user->salary_route_bouldering}}"
                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
            </div>
        </div>
        <h3>Работа</h3>
        <hr>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Скалодром (на котором работаете постоянно)</label>
            <div class="col-lg-9">
            <input type="text" class="form-control" name="company" value="{{$user->company}}">
            </div>
        </div>
        <h3>Контакты</h3>
        <hr>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Telegram</label>
            <div class="col-lg-9">
                <input class="form-control" name="telegram" type="text" value="{{$user->telegram}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Контакты</label>
            <div class="col-lg-9">
                <input type="text" name="contact" class="form-control" value="{{$user->contact}}">
            </div>
        </div>
        <hr>
        <div class="form-group row">
            <div class="checkbox">
              @if(!$user->active_status)
                <div class="form-check form-switch">
                    <input class="form-check-input" name="active" type="checkbox" id="flexSwitchCheckDefault" value="1">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Скрыть мое резюме</label>
                </div>
              @else
                <div class="form-check form-switch">
                    <input class="form-check-input" name="active" type="checkbox" id="flexSwitchCheckChecked" checked value="0">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Скрыть мое резюме</label>
                </div>
              @endif
            </div>
        </div>
        <div class="form-group row">
            <div class="checkbox">
              @if(!$user->other_city)
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="otherCity" type="checkbox" id="flexSwitchCheckDefault" value="1">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Не готов ездить в другие города</label>
                    </div>
              @else
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="otherCity" type="checkbox" id="flexSwitchCheckChecked" checked value="0">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Не готов ездить в другие города</label>
                    </div>
              @endif
            </div>
        </div>
        <div class="form-group row">
            <div class="checkbox">
              @if(!$user->all_time)
                <div class="form-check form-switch">
                    <input class="form-check-input" name="allTime" type="checkbox" id="flexSwitchCheckDefault" value="1">
                    <label class="form-check-label" for="flexSwitchCheckDefault">В поиске работы на постоянной основе</label>
                </div>
              @else
              <div class="form-check form-switch">
                <input class="form-check-input" name="allTime" type="checkbox" id="flexSwitchCheckChecked" checked value="0">
                <label class="form-check-label" for="flexSwitchCheckChecked">В поиске работы на постоянной основе</label>
              </div>
              @endif

            </div>
        </div>
        <div class="form-group row">
            <div class="checkbox">
              <label for="color-3">Посмотреть как выглядит мой профиль у других людей</label>
              <a href="profile/{{$user->id}}">мой профиль</a>
            </div>
        </div>
        <button id="saveChanges" type="button" class="btn btn-submit" style="color: white!important;">Сохранить</button>
        <div id="ajax-alert" class="alert" style="display:none"></div>
    </form>
</div>
