<form id="infoForm">
  @csrf
<div class="tab-pane fade active show" id="account-info">
    <div class="card-body pb-2">
      <div class="form-group">
        <label class="fieldlabels">Краткое резюме о себе или о своем опыте</label>
        <textarea type="text" name="description" placeholder="Я давно уже работаю подготовщик .... ">{{$user->description}}</textarea>
      </div>
      <div class="form-group">
      <label class="fieldlabels">Ваш опыт</label>
        <select name="exp_level" class="form-select" aria-label="Default select example">
            <option selected>Выбрать</option>
            @if ($user->exp_level === 'beginner')
            <option selected value="beginner">Начинающий (до 1 года)</option>
            <option value="middle">Средний уровень (от 1 года)</option>
            <option value="senior">Опытный (Главный подготовщик ~ от 5 лет)</option>
            @elseif ($user->exp_level === 'middle')
            <option value="beginner">Начинающий (до 1 года)</option>
            <option selected value="middle">Средний уровень (от 1 года)</option>
            <option value="senior">Опытный (Главный подготовщик ~ от 5 лет)</option>
            @else
            <option value="beginner">Начинающий (до 1 года)</option>
            <option value="middle">Средний уровень (от 1 года)</option>
            <option selected value="senior">Опытный (Главный подготовщик ~ от 5 лет)</option>
            @endif
        </select>
      </div>
      <div class="form-group">
      <label class="fieldlabels">Курсы подготовщика </label>
        <select name="educational_requirements" class="form-select" aria-label="Default select example">
            <option >Выбрать</option>
            @if ($user->educational_requirements === 'yes')
            <option selected value="yes">проходил</option>
            <option value="no">не проходил</option>
            @else
            <option value="yes">проходил</option>
            <option selected value="no">не проходил</option>
            @endif
        </select>
      </div>
        <div class="form-group">
        <label class="fieldlabels">Максимальная категория лазания</label>
        <select name="grade" class="form-select" aria-label="Default select example">
            <option >Выбрать</option>
            @foreach ($grades as $grade)
            @if($grade->grades_name === $user->grade)
            <option selected value="{{$grade->grades_name}}">{{$grade->grades_name}}</option>
            @else
            <option value="{{$grade->grades_name}}">{{$grade->grades_name}}</option>
            @endif
            @endforeach
        </select>
        </div>
        <div class="form-group">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
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

        <div class="form-group">
          <label class="fieldlabels">Опыт подготовки местных соревнований</label>
          <input type="range" min="0" max="5" step="1" value="{{$user->exp_local}}" id="foo" name="exp_local">
          <label class="fieldlabels">Опыт подготовки Национальных соревнований</label>
          <input type="range" min="0" max="5" step="1" value="{{$user->exp_national}}" id="foo" name="exp_national">
          <label class="fieldlabels">Опыт подготовки междунарожных соревнований</label>
          <input type="range" min="0" max="5" step="1" value="{{$user->exp_international}}" id="foo" name="exp_international">
        </div>
    </div>

      <div class="form-group">
        <div class="col-md-10">
              <div class="card-body text-center">
                  <h2>Облаcть накрутки</h2>
                  @foreach($categories as $category)
                  <label class="check">
                  <input type="checkbox" name="categories[{{$category->id}}]" value="{{$category->id}}" checked> <span style="border-radius: 15px">{{$category->category_name}}</span></label>
                  @endforeach
                  @foreach($notCategories as $category)
                  <label class="check">
                  <input type="checkbox" name="categories[{{$category->id}}]" value="{{$category->id}}" unchecked> <span style="border-radius: 15px">{{$category->category_name}}</span></label>
                  @endforeach
              </div>
          </div>
      </div>
      </div>
    </div>
    <hr class="border-light m-0">
    <div class="card-body pb-2">
        <div class="form-group">
          <label class="form-label">Оплата за час (любая дисциплина)</label>
          <input type="text" name="salaryHour" class="form-control" value="{{$user->salary_hour}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
        </div>
        <div class="form-group">
          <label class="form-label">Оплата за трассу трудность минимум</label>
          <input type="text" name="salaryRouteRope" class="form-control" value="{{$user->salary_route_rope}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
        </div><div class="form-group">
          <label class="form-label">Оплата за трассу боулдеринг минимум</label>
          <input type="text" name="salaryRouteBouldering" class="form-control" value="{{$user->salary_route_bouldering}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
        </div>
      <div class="form-group">
        <label class="form-label">Скалодром (на котором работаете постоянно)</label>
        <input type="text" class="form-control" name="company" value="{{$user->company}}">
      </div>
    </div>
  </div>
  <div class="text-right mt-4 ml-4 mb-4">
    <button id="saveChangesInfo" type="button" class="btn btn-primary">Сохранить</button>
    <div id="ajax-alert" class="alert" style="display:none"></div>
  </div>
</form>


<script>
    $('textarea').on('input', function (){
        $(this).outerHeight(38).outerHeight(this.scrollHeight);
    });
</script>
