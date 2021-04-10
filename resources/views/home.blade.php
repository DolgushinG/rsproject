@extends('layout')

@section('content')
<main id="main">
<link href="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/css/suggestions.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/js/jquery.suggestions.min.js"></script>
<!-- ======= Team Section ======= -->
<section id="team" class="team">
  <div class="container" data-aos="fade-up" style="margin-top: 4rem;">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center" style="background-color: #ffffffeb;
        border-radius: 16px;">
           <div class="page-wrapper">
            <div class="wrapper wrapper--w720">
                <div class="card card-3">
                    <div class="card-body">
                        <ul class="tab-list" style="padding-top: 0px;">
                            <li class="tab-list__item active">
                                <a class="tab-list__link" href="#tab1" data-toggle="tab">Поиск подготовщиков</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                              <form method="POST" id="searchForm">
                                @csrf
                                    <div class="input-group">
                                        <label class="label">Город</label>
                                        <input class="input--style-1 search-slt" type="text" id="city" name="city_name" placeholder="Введите город" required="required">
                                        <i class="zmdi zmdi-pin input-group-symbol"></i>
                                    </div>
                                    @foreach ($categories as $category)
                                    <div class="checkbox-row">
                                        <label class="checkbox-container m-r-45">{{ $category->category_name }}
                                            <input type="checkbox" id="categories" name="categories[{{ $category->id }}]"
                                            value="{{ $category->id }}" unchecked >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    @endforeach
                                    <button id="search" href="#content" class="btn-submit get-started scrollto searchUser" style="font-size: 18px" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg> поиск</button>
                                </form>
                                <div class="container" style="margin-top: 1rem;
                                margin-bottom: -1rem;">
                                  <a href="{{route('register')}}"> <span>хотите чтобы вас нашли ?</span> зарегистрируйтесь</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
       </div>
       
      <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-center text-white" style="background-color: #292F4A">
            Город
            <span class="align-items-right">Кол-во подготовщиков</span>
          </li>
          @foreach ($cityList as $city)
          <button id="cityTable" value="{{$city->city_name}}" style="border: 0;"><li class="search_city list-group-item d-flex justify-content-between align-items-center table-hover">
              {{$city->city_name }}
            <span class="badge badge-primary badge-pill">{{ $cityCount[$city->city_name]}}</span></button>
            @endforeach
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>



        <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-people"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="{{$userCount}}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Всего подготовщиков</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-building" style="color: #ee6c20;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="{{count($cityList)}}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Городов</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-patch-check" style="color: #15be56;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="{{$usersWithCours}}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Те кто прошел курсы</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-person-circle" style="color: #bb0852;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="{{$usersSenior}}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Главные подготовщики</p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->
      <div id="content" style="padding-top: 2rem">
        <div id="resultList"></div>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript" src="{{ asset('js/search.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/ddata.js') }}"></script>
<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials">

  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <p>Недавно зарегистрированные подготовщики</p>
    </header>

    <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="200">
      <div class="swiper-wrapper">
        @foreach ($latestUsers as $user)
        <div class="swiper-slide">
          <div class="testimonial-item">
            <p>
              <a href="{{route('profileDetails', $user->id)}}"><h4>{{$user->name}}</h4></a>
             
            </p>
            <div class="profile mt-auto">
              <img src="storage/{{$user->photo}}" class="testimonial-img" alt="">
            </div>
            <p>
              {{$user->description}}
              </p>
          </div>
        </div><!-- End testimonial item -->
        @endforeach

      </div>
      <div class="swiper-pagination"></div>
    </div>

  </div>

</section><!-- End Testimonials Section -->
  </main><!-- End #main -->
@endsection
