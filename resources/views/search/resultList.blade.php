<header class="section-header">
    <p>Результат поиска</p>
    <h2>Найдено : {{count($users)}}</h2>
</header>
<section id="team" class="team">
    <div class="container" data-aos="fade-up">
        <div id="content" class="row gy-4">
         @foreach ($users as $user)
            <div class="col-lg-2 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
              <div class="member">
                <div class="member-img">
                  <img src="{{ asset('storage/images/herors.jpeg')}}" class="img-fluid" alt="">
                  <div class="social">
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-telegram"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <a href="{{route('profileDetails', $user->id)}}"><h4>{{$user->name}}</h4></a>
                  <span>{{$user->description}}</span>
                  <p> @lang('somewords.'.$user->exp_level)</p>
                </div>
              </div>
            </div>
            @endforeach
        </div>
    </div>
</section>