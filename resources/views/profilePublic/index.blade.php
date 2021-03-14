@extends('layout')

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <ol>
            <li><a href="{{route('home')}}">Главная</a></li>
            <li>Профиль</li>
          </ol>
          <h2>Профиль {{$user->name}}</h2><strong>Город</strong>: {{$user->city_name}}
          
        </div>
      </section><!-- End Breadcrumbs -->
  
      <!-- ======= Portfolio Details Section ======= -->
      <section id="portfolio-details" class="portfolio-details">
        <div class="container">
  
          <div class="row gy-4">
  
            <div class="col-lg-4">
              <div class="portfolio-details-slider swiper-container">
                <div class="swiper-wrapper align-items-center">
  
                  <div class="swiper-slide">
                    <img src="{{asset('storage/images/herors.jpeg')}}" alt="">
                  </div>
  
                  <div class="swiper-slide">
                    <img src="{{asset('storage/images/herors.jpeg')}}" alt="">
                  </div>
  
                  <div class="swiper-slide">
                    <img src="{{asset('storage/images/herors.jpeg')}}" alt="">
                  </div>
  
                </div>
                <div class="swiper-pagination"></div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="portfolio-info">
                <h3>Опыт подготовки</h3>
                <ul>
                  <li><strong>Подготовка национальных стартов</strong>: <br>
                    <div class="card-body">
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{12/$user->additional_requirements}}%" aria-valuenow="{{$user->additional_requirements}}" aria-valuemin="0" aria-valuemax="5"></div>
                      </div>
                    </div>
                    </li>
                  <li><strong>Подготовка международных стартов</strong>: <br>
                    <div class="card-body">
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{12/$user->experience_requirements}}%" aria-valuenow="{{$user->experience_requirements}}" aria-valuemin="0" aria-valuemax="5"></div>
                      </div>
                    </div></li>
                  <li><strong>Об опыте</strong>: <br>{{$user->description}}</li>
                  <li><strong>Контакты для связи</strong>: <br>{{$user->contact}}</li>
                  <li><strong>Место работы (скалодром)</strong>: <br>{{$user->company}}</li>
                  <li><strong>Уровень подготовки</strong>: <br>{{$user->exp_level}}</li>
                  <li><strong>Желаемая оплата</strong>: <br>{{$user->salary}}/час</li>
                  @if($user->educational_requirements === 'yes')
                  <li><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-patch-check" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                    <path d="M10.273 2.513l-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
                  </svg> - </i><strong> Прошел курсы подготовщиков</strong></li>
                  @endif
                </ul>
              </div>
            </div>
  
          </div>
  
        </div>
      </section>
@endsection