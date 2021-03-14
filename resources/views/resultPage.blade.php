@extends('layout')
@section('content')

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">

        <div class="container" data-aos="fade-up">
          <div class="row justify-content-center">
          <header class="section-header">
            <h2>Рутсуттеры</h2>
            <p>Поиск по городам и области накрутки и опыта</p>
          </header>
<section class="search-sec">
    <div class="container">
        <form action="#" method="post" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <input type="text" class="form-control search-slt" placeholder="Enter Pickup City">
                        </div>
                         <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <input type="text" class="form-control search-slt" placeholder="Enter Drop City">
                        </div>
                          <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            @foreach($categories as $category)
                            <label class="check">
                            <input type="checkbox" name="categories[{{$category->id}}]" value="{{$category->id}}" unchecked> <span>{{$category->category_name}}</span></label>
                            @endforeach
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <button type="button" class="btn btn-danger wrn-btn">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<header class="section-header">
  <p>Результат поиска</p>
  <h2>Найдено : </h2>
</header>
          <div class="row gy-4">
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
              <div class="member">
                <div class="member-img">
                  <img src="{{ asset('storage/images/herors.jpeg')}}" class="img-fluid" alt="">
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Долгушин Георгий</h4>
                  <span>опыт работы 6 лет</span>
                  <p>Rerum voluptate non adipisci animi distinctio et deserunt amet voluptas. Quia aut aliquid doloremque ut possimus ipsum officia.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section><!-- End Team Section -->
      @endsection