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
        <div class="col-md-6 pb-2"><h6>Облаcть накрутки</h6>
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
        <div class="col-md-12"><h5 class="mt-2 mb-3"> Опыт подготовки </h5>
            <div class="card-body" style="padding-left: 0;">
                <strong>Подготовка местных стартов (фестивалей)</strong>: <br>
                <div class="progress mb-3" style="height: 15px">
                    <div class="progress-bar bg-primary" role="progressbar"
                         style="width: {{100*$user->exp_local/5}}%"
                         aria-valuemin="0"
                         aria-valuemax="5">{{100*$user->exp_local/5}}%
                    </div>

                </div>
            </div>

            <div class="card-body" style="padding-left: 0;">
                <strong>Подготовка национальных стартов</strong>: <br>
                <div class="progress mb-3" style="height: 15px">
                    <div class="progress-bar bg-primary" role="progressbar"
                         style="width: {{100*$user->exp_national/5}}%"
                         aria-valuemin="0"
                         aria-valuemax="5">{{100*$user->exp_national/5}}%
                    </div>
                </div>
            </div>

            <div class="card-body" style="padding-left: 0;">
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


