<header class="section-header">
    <p>Результат поиска</p>
    <h2>Найдено : {{$foundUsers}}</h2>
</header>

<section id="team" class="team">
    <div class="container" data-aos="fade-up">
        <div id="content" class="row gy-4">
          <div class="row mx-auto mt-5">
            <p>Показано: {{$users->firstItem()}} из {{$users->lastItem()}}</p>  
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
         @foreach ($users as $user => $key)
            <div class="col-lg-2 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
              <div class="member">
                <div class="member-img">
                  <img src="{{ asset('storage/images/herors.jpeg')}}" class="img-fluid" alt="">
                  <div class="social">
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-telegram"></i></a>
                    <a href="{{route('profileDetails', $key->id)}}"><i class="bi bi-person-square"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <a href="{{route('profileDetails', $key->id)}}"><h4>{{$key->name}}</h4>
                  <span>{{$key->description}}</span>
                  <p> @lang('somewords.'.$key->exp_level)</p></a>
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
