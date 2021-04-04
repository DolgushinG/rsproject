<header class="section-header">
    <p>Результат поиска</p>
    @if(isset($valueSearch['city']) && isset($valueSearch['categories']))
    <h2>По городу: </h2> 
    <h2>{{$valueSearch['city']}}</h2>
    <input id="city_search" value="{{$valueSearch['city']}}" style="display: none">
        <h2>Категории: </h2>
    @foreach ($valueSearch['categories'] as $category)
        <h2>{{$category->category_name}}</h2>
    @endforeach
    @elseif(isset($valueSearch['city']))
    <h2>По городу: </h2> 
    <h2>{{$valueSearch['city']}}</h2>
      <input id="city_search" value="{{$valueSearch['city']}}" style="display: none">
    @elseif(isset($valueSearch['categories']))
    <h2>Категории: </h2>
    @foreach ($valueSearch['categories'] as $category)
        <h2>{{$category->category_name}}</h2>
    @endforeach
    @endif
    <p>Найдено : {{$foundUsers}} подготовщиков</p>
</header>

<section id="team" class="team">
    <div class="container" data-aos="fade-up">
        <div id="content" class="row gy-4">
          <div class="row mx-auto mt-5">
            <p>Показано: {{count($users)}} из {{$foundUsers}}</p>  
            <div class="progress" style="padding-left: 0; padding-right: 0; margin-bottom: 2rem;">
              <div class="progress-bar
                                  progress-bar-striped
                                  progress-bar-animated" role="progressbar" aria-valuemin="100"
                  aria-valuemax="0" style="width:{{$users->lastItem() * 100 / $foundUsers}}%">
              </div>
          </div>
            <div class="col-lg-12 mb-4">
            {!! $users->links() !!}  
            </div>
           </div>
         @foreach ($users as $user)
            <div class="col-lg-2 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
              <div class="member">
                <div class="member-img">
                  <img src="{{ asset('storage/images/herors.jpeg')}}" class="img-fluid" alt="">
                  <div class="social">
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-telegram"></i></a>
                    <a href="{{route('profileDetails', $user->id)}}"><i class="bi bi-person-square"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <span>{{$user->city_name}} </span>
                  <a href="{{route('profileDetails', $user->id)}}"><h4>{{$user->name}}</h4>
                  @if($user->exp_level == 'senior')
                  <p> @lang('somewords.'.$user->exp_level) <i class="bi bi-info-circle-fill" title="@lang('somewords.Опытный')" data-toggle="tooltip" data-placement="bottom"></i></p></a>
                  @elseif($user->exp_level == 'middle')
                  <p> @lang('somewords.'.$user->exp_level) <i class="bi bi-info-circle-fill" title="@lang('somewords.Средний уровень')" data-toggle="tooltip" data-placement="bottom"></i></p></a>
                  @else 
                  <p> @lang('somewords.'.$user->exp_level) <i class="bi bi-info-circle-fill" title="@lang('somewords.Начинающий')" data-toggle="tooltip" data-placement="bottom"></i></p></a>
                  @endif
                  <span>Оплата: {{$user->salary_hour}}р / в час</span>
                  <span>Оплата: {{$user->salary_route}}р / за трассу</span>
                </div>
              </div>
            </div>
            @endforeach
        </div>
        <div class="row mx-auto mt-5">  
          <div class="col-lg-12">
          {!! $users->links() !!}
          </div>
         </div>
    </div>
</section>
<script>
  $(function () {
 $('[data-toggle="tooltip"]').tooltip({
   animation: false,
   delay: {"show": 100, "hide": 100}
 })
})
</script>