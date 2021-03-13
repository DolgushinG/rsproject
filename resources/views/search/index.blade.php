

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
                        <ul class="tab-list">
                            <li class="tab-list__item active">
                                <a class="tab-list__link" href="#tab1" data-toggle="tab">Поиск подготовщиков</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                              <form action="{{ route('getresultsearch') }}" method="POST" id="searchForm">
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
                                    <button class="btn-submit searchUser" type="button">search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
       </div>
      <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <table class="table-fill">
            <thead>
            <tr>
            <th class="text-left">Город</th>
            <th class="text-left">Кол-во подготовщиков</th>
            </tr>
            </thead>
            <tbody class="table-hover">
              @foreach ($cityList as $city)
            <tr>
            <td class="text-left">{{ $city->city_name }}</td>
            <td class="text-left">{{ $cityCount[$city->city_name]}}</td>
            </tr>
            @endforeach
            </tbody>
            </table>
    </div>
  </div>
</div>



        <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-person-circle"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="{{$userCount}}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Подготовщиков</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="{{count($cityList)}}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Городов</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-headset" style="color: #15be56;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
                <p>Статьи</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-people" style="color: #bb0852;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                <p>Отзывов</p>
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
