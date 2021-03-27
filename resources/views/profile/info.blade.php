<form  id="infoForm">
  @csrf
<div class="tab-pane fade active show" id="account-info">
    <div class="card-body pb-2">
      <div class="form-group">
        <label class="form-label">Краткое резюме о себе или о своем опыте</label>
        <textarea class="form-control" rows="2" name="description" placeholder="Я давно уже работаю подготовщик .... ">{{$user->description}}</textarea>
      </div>
      <div class="form-group">
      <label class="fieldlabels">Ваш опыт</label>
        <select name="exp_level" class="form-select" aria-label="Default select example">
            <option selected>Выбрать</option>
            @if ($user->exp_level === 'beginner')
            <option selected value="beginner">Начинающий (до 1 года)</option>
            <option value="middle">Средний уровень(от 1 года)</option>
            <option value="senior">Опытный(Главный подготовщик ~ от 2 лет)</option>
            @elseif ($user->exp_level === 'middle') 
            <option value="beginner">Начинающий (до 1 года)</option>
            <option selected value="middle">Средний уровень(от 1 года)</option>
            <option value="senior">Опытный(Главный подготовщик ~ от 2 лет)</option>
            @else 
            <option value="beginner">Начинающий (до 1 года)</option>
            <option value="middle">Средний уровень(от 1 года)</option>
            <option selected value="senior">Опытный(Главный подготовщик ~ от 2 лет)</option>
            @endif
        </select> 
      </div>
      <div class="form-group">
      <label class="fieldlabels">Курсы подготовщика </label>
        <select name="educational_requirements" class="form-select" aria-label="Default select example">
            <option >Выбрать</option>
            @if ($user->educational_requirements === 'yes')
            <option selected value="yes">да</option>
            <option value="no">нет</option>
            @else   
            <option value="yes">да</option>
            <option selected value="no">нет</option>
            @endif
        </select> 
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
                  <h2>Облаться накрутки</h2>
                  @foreach($categories as $category)
                  <label class="check">
                  <input type="checkbox" name="categories[{{$category->id}}]" value="{{$category->id}}" checked> <span>{{$category->category_name}}</span></label>
                  @endforeach
                  @foreach($notCategories as $category)
                  <label class="check">
                  <input type="checkbox" name="categories[{{$category->id}}]" value="{{$category->id}}" unchecked> <span>{{$category->category_name}}</span></label>
                  @endforeach
              </div>
          </div>
      </div>
      </div>
    </div>
    <hr class="border-light m-0">
    <div class="card-body pb-2">
        <div class="form-group">
          <label class="form-label">Оплата за час</label>
          <input type="text" name="salaryHour" class="form-control" value="{{$user->salary_hour}}">
        </div>
        <div class="form-group">
          <label class="form-label">Оплата за трассу</label>
          <input type="text" name="salaryRoute" class="form-control" value="{{$user->salary_route}}">
        </div>
      <div class="form-group">
        <label class="form-label">Скалодром(на котором работаете постоянно)</label>
        <input type="text" class="form-control" name="company" value="{{$user->company}}">
      </div>
    </div>
  </div>
  <div class="text-right mt-4 ml-4 mb-4">
    <button id="saveChangesInfo" type="button" class="btn btn-primary">Save changes</button>
    <div id="ajax-alert" class="alert" style="display:none"></div>
  </div>
</form>