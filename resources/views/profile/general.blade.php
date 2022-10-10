{{--<div class="col-md-9">--}}
{{--    <div class="tab-content">--}}
{{--    <div class="tab-pane fade active show" id="account-general">--}}
{{--        <div class="card-body media align-items-center">--}}
{{--            @if ($user->photo === null)--}}
{{--            <img src="https://eu.ui-avatars.com/api/?name={{ Auth::user()->name }}&background=a73737&color=050202&font-size=0.33&size=150" class="d-block ui-w-80" alt="{{$user->name}}">--}}
{{--        @else--}}
{{--            <img src="storage/{{$user->photo}}" alt="" class="d-block ui-w-80">--}}
{{--        @endif--}}
{{--        <div class="media-body ml-4"> <label class="btn btn-outline-primary"> Загрузить новое фото--}}
{{--            <input type="file" name="image" class="image">--}}
{{--            <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>--}}
{{--        </div>--}}
{{--        <form id="generalForm" enctype="multipart/form-data">--}}
{{--            @csrf--}}
{{--        </div>--}}
{{--        <hr class="border-light m-0">--}}
{{--        <div class="card-body">--}}
{{--            <div class="form-group"> <label class="form-label">Имя и Фамилия</label>--}}
{{--                <input type="text" id="name" name="name" class="form-control mb-1" value="{{$user->name}}"></div>--}}
{{--            <div class="form-group"> <label class="form-label">E-mail</label>--}}
{{--                <input type="text" disabled id="email" name="email" class="form-control mb-1" value="{{$user->email}}">--}}
{{--            </div>--}}
{{--            <div class="form-group"> <label class="form-label" for="city">Город</label>--}}
{{--                <input type="text" name="city_name" id="city" class="form-control" value="{{$user->city_name}}" required>--}}
{{--            </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="text-right mt-4 ml-4 mb-4">--}}
{{--    <button id="saveChangesGeneral" type="button" class="btn btn-primary">Сохранить</button>--}}
{{--</div>--}}
<div class="tab-pane active show" id="tab-general">
    <div class="row">
        <div class="col-md-6"><h6>О себе</h6>
            <p> {{$user->description}}</p><h6>Мой опыт</h6>
            @if ($user->exp_level === 1)
            <p>Начинающий (до 1 года)</p>
            @elseif ($user->exp_level === 2)
            <p>Средний уровень (от 1 года)</p>
            @elseif($user->exp_level === 3)
            <p>Опытный (Главный подготовщик ~ от 5 лет)</p>
            @endif
        </div>
        <div class="col-md-6"><h6>Облаcть накрутки</h6>
            @foreach($categories as $category)
            <span class="badge badge-dark badge-pill">{{$category->category_name}}</span>
            @endforeach
            <hr>
            @foreach ($grades as $grade)
                @if($grade->grades_name === $user->grade)
                    <span class="badge badge-primary"><i class="fa fa-beer"></i> Категория {{$grade->grades_name}}</span>
                @endif
            @endforeach
            <span class="badge badge-success"><i class="fa fa-suitcase"></i> {{$user->company}}</span>
            <span class="badge badge-danger"><i class="fa fa-money"></i> В час {{$user->salary_hour}} р</span>
        </div>
        <hr>
        <div class="col-md-12"><h5 class="mt-2 mb-3" style="margin-left: 1.7rem;!important;"> Опыт подготовки </h5>
            <div class="card-body">
                <strong>Подготовка местных стартов (фестивалей)</strong>: <br>
                <div class="progress mb-3" style="height: 15px">
                    <div class="progress-bar bg-primary" role="progressbar"
                         style="width: {{100*$user->exp_local/5}}%"
                         aria-valuemin="0"
                         aria-valuemax="5">{{100*$user->exp_local/5}}%
                    </div>

                </div>
            </div>

            <div class="card-body">
                <strong>Подготовка национальных стартов</strong>: <br>
                <div class="progress mb-3" style="height: 15px">
                    <div class="progress-bar bg-primary" role="progressbar"
                         style="width: {{100*$user->exp_national/5}}%"
                         aria-valuemin="0"
                         aria-valuemax="5">{{100*$user->exp_national/5}}%
                    </div>
                </div>
            </div>

            <div class="card-body">
                <strong>Подготовка международных стартов</strong>: <br>
                <div class="progress mb-3" style="height: 15px">
                    <div class="progress-bar bg-primary" role="progressbar"
                         style="width: {{100*$user->exp_international/5}}%"
                         aria-valuenow="0"
                         aria-valuemax="5">{{100*$user->exp_international/5}}%
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


