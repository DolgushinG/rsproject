@extends('layout') @section('content')
<link href="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/css/suggestions.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/js/jquery.suggestions.min.js"></script>
<!-- ======= Team Section ======= -->
<section id="team" class="team">
  <div class="container" data-aos="fade-up">
    <div class="row justify-content-center">
      <header class="section-header">
        <h1>Подготовщики</h1>
        <p>Поиск по городам и области накрутки и опыта</p>
      </header>
      
      <section class="search-sec">
        <div class="container">
          <form action="{{ route('getresultsearch') }}" method="POST" id="searchForm">
            @csrf
            <div class="row">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                    <input type="text" id="city" name="city_name" class="form-control search-slt" placeholder="Введите город">
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                    @foreach ($categories as $category)
                    <label class="check">
                      <input type="checkbox" id="categories" name="categories[{{ $category->id }}]"
                        value="{{ $category->id }}" unchecked />
                      <span>{{ $category->category_name }}</span></label>
                    @endforeach
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                    <button type="button" class="btn btn-danger wrn-btn searchUser">
                      Search
                    </button>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                    <div class="scroll-table">
                      <table>
                        <thead>
                          <tr>
                            <th>Город</th>
                            <th>Подготовщиков</th>
                          </tr>
                        </thead>
                      </table>
                      <div class="scroll-table-body">
                        <table>
                          <tbody>
                            @foreach ($cityList as
                            $city)
                            <tr>
                              <td>
                                {{ $city->city_name }}
                              </td>
                              <td>
                                {{ $cityCount[$city->city_name]}}
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </section>
      <div id="content" style="padding-top: 2rem">
        <div id="resultList"></div>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript" src="{{ asset('js/search.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/ddata.js') }}"></script>
@endsection