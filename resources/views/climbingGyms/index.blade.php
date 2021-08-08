@extends('layout')
@section('content')
    <section id="team" class="team">
        <div class="container" data-aos="fade-up" style="margin-top: 4rem;">
            <div class="row">
                <div class="col-lg-8 d-flex flex-column justify-content-center" style="border-radius: 16px;background-color: rgb(253 253 253 / 90%);">
                    <div class="page-wrapper">
                        <div class="wrapper wrapper--w720">
                                    <ul class="tab-list" style="padding-top: 0px;">
                                        <li class="tab-list__item active">
                                            <a class="tab-list__link" href="#tab1" data-toggle="tab"
                                               style="color: #0a0302">Скалодромы <span class="badge badge-primary badge-pill">{{$allGymsCount}}</span></a>

                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                                            <div class="accordion accordion-flush" id="faqlist1">
                                                @foreach($listCity as $i => $city)
                                                    @php
                                                        $num = rand(1, 10000)+rand(1, 100)
                                                    @endphp
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#faq-content-{{$num}}">
                                                                <h6>{{$i}}  <span class="badge badge-primary badge-pill">{{count((array)$city)}}</span></h6>
                                                            </button>
                                                        </h2>
                                                        <div id="faq-content-{{$num}}"
                                                             class="accordion-collapse collapse"
                                                             data-bs-parent="#faqlist1">
                                                            <div class="accordion-body">
                                                                <div class="accordion accordion-flush" id="faqlist2">
                                                                    @foreach($city as $gym)
                                                                        <div class="accordion-item">
                                                                            <h4 class="accordion-header">
                                                                                <button
                                                                                    class="accordion-button collapsed"
                                                                                    type="button"
                                                                                    data-bs-toggle="collapse"
                                                                                    data-bs-target="#faq-content-{{$gym->id}}"
                                                                                    style="font-size: small">
                                                                                    {{$gym->name}}
                                                                                </button>
                                                                            </h4>
                                                                            <div id="faq-content-{{$gym->id}}"
                                                                                 class="accordion-collapse collapse"
                                                                                 data-bs-parent="#faqlist2">
                                                                                <div class="accordion-body">
                                                                                    Адрес: {{$gym->address}}<br>
                                                                                    Веб-сайт: <a
                                                                                        href="{{$gym->url}}">{{$gym->url}}</a><br>
                                                                                    Телефон: {{$gym->phone}}<br>
                                                                                    Часы работы: {{$gym->hours}}<br><br>
                                                                                    <span title="Likes" id="saveLikeDislike" data-type="like" data-gym="{{$gym->id}}"
                                                                                          class="mr-2 btn btn-sm btn-outline-primary d-inline font-weight-bold">
                                                                                    Нравится
                                                                                     <span class="like-count{{$gym->id}}">{{ $gym->likesGyms() }}</span>
                                                                                    </span>
                                                                                    <span title="Dislikes" id="saveLikeDislike" data-type="dislike"
                                                                                          data-gym="{{$gym->id}}" class="mr-2 btn btn-sm btn-outline-danger d-inline font-weight-bold"
                                                                                          style="margin-left: 5px;}">
                                                                                        Норм
                                                                                        <span class="dislike-count{{$gym->id}}">{{ $gym->dislikesGyms() }}</span>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 hero-img" data-aos="zoom-out" data-aos-delay="200">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center text-white"
                                    style="background-color: #007bff">
                                    <span class="align-items-right">Популярные скалодромы <i class="bi bi-info-circle-fill"
                                                                                             title="По кол-ву лайков"
                                                                                             data-toggle="tooltip"
                                                                                             data-placement="bottom"></i></span>
                                </li>
                                @foreach ($likesDislikesGyms as $gym)
                                    <li class="search_city list-group-item d-flex justify-content-between align-items-center table-hover">
                                        {{$gym->name}}<span class="badge badge-primary badge-pill" title="Количество лайков"
                                                                                           data-toggle="tooltip"
                                                                                           data-placement="bottom">{{$gym->sum_likes}}</span>
                                    </li>
                                    <div class="progress" title="{{100*$gym->sum_likes/1000}}%"
                                         data-toggle="tooltip"
                                         data-placement="bottom">
                                        <div class="progress-bar"  role="progressbar" style="width: {{100*$gym->sum_likes/1000}}%;" aria-valuenow="{{$gym->sum_likes}}" aria-valuemin="0" aria-valuemax="1000">{{$gym->sum_likes}}</div>
                                    </div>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
    </section>
    <style>
        .accordion-header:hover{
            border-radius: 15px;
            background-color: #e7f1ff;
        }
    </style>
    <script>
        $(document).on('click', '#saveLikeDislike', function () {
            let _gym = $(this).data('gym');
            let _type = $(this).data('type');
            let vm = $(this);
            let token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "/climbing-gyms/likeDisLikeGym",
                type: "post",
                dataType: 'json',
                data: {
                    gym: _gym,
                    type: _type,
                    _token: token,
                },

                beforeSend: function () {
                    vm.addClass('disabled');
                },
                success: function (res) {
                    if (res.bool == true) {
                        vm.removeClass('disabled').addClass('active');
                        vm.removeAttr('id');
                        var _prevCount = $("." + _type + "-count"+_gym).text();
                        console.log(_prevCount);
                        _prevCount++;
                        $("." + _type + "-count"+_gym).text(_prevCount);
                    }
                    if (res.bool == false) {
                        vm.removeClass('disabled').addClass('active');
                        vm.removeAttr('id');
                        var _prevCount = $("." + _type + "-count"+_gym).text();
                        _prevCount--;
                        $("." + _type + "-count"+_gym).text(_prevCount);
                    }
                }
            });

        });

    </script>
@endsection
