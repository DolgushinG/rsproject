{{--<div class="col-md-3 pt-0">--}}
{{--    <div class="list-group list-group-flush account-settings-links">--}}
{{--      <a class="list-group-item list-group-item-action" data-toggle="list" id="general">Основная инфа</a>--}}
{{--      <a class="list-group-item list-group-item-action" data-toggle="list" id="info">Информация об опыте</a>--}}
{{--      <a class="list-group-item list-group-item-action" data-toggle="list" id="socialLinks">Контакты для связи</a>--}}
{{--      <a class="list-group-item list-group-item-action" data-toggle="list" id="notifications">Приватность</a>--}}
{{--    </div>--}}
{{--  </div>--}}

<div class="col-lg-4">
    <div class="profile-card-4 z-depth-3">
        <div class="card">
            <div class="card-body text-center bg-primary rounded-top">

                <div class="user-box">
                    @if ($user->photo === null)}}
                        <img src="https://eu.ui-avatars.com/api/?name={{ Auth::user()->name }}&background=a73737&color=050202&font-size=0.33&size=150" alt="{{$user->name}}">
                    @else
                        <img src="storage/{{$user->photo}}" alt="user avatar">
                    @endif
                </div>
                <h5 class="mb-1 text-white">{{$user->name}}</h5><h6 class="text-gray">{{$user->city_name}}</h6></div>
            <div class="card-body">
                <ul class="list-group shadow-none">
                    <li class="list-group-item">
                        <div class="list-icon"><i class="fa fa-phone-square"></i></div>
                        <div class="list-details"><span>{{$user->contact}}</span> <small>Mobile
                                Number</small></div>
                    </li>
                    <li class="list-group-item">
                        <div class="list-icon"><i class="fa fa-envelope"></i></div>
                        <div class="list-details"><span>{{$user->email}}</span> <small>Email
                                Address</small></div>
                    </li>
                    <li class="list-group-item">
                        <div class="list-icon"><i class="bi bi-telegram"></i></div>
                        <div class="list-details"><span>{{$user->telegram}}</span> <small>Telegram</small></div>
                    </li>
                </ul>
                <div class="row text-center mt-4">

                    <div class="col p-2">
                        <h4 class="mb-1 line-height-5">
                            <span data-purecounter-start="0" data-purecounter-end="{{$userView}}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        </h4>
                        <small class="mb-0 font-weight-bold">Просмотры профиля</small>
                    </div>
                    <div class="col p-2"><h4 class="mb-1 line-height-5">
                            <span data-purecounter-start="0" data-purecounter-end="{{$foundReviews}}"
                                  data-purecounter-duration="1" class="purecounter"></span></h4>
                        <small class="mb-0 font-weight-bold">Комментариев</small></div>
                    <div class="col p-2"><h4 class="mb-1 line-height-5">{{floatval($user->average_rating)}}</h4> <small
                            class="mb-0 font-weight-bold">Рейтинг</small></div>
                </div>
            </div>
{{--            <div class="card-footer text-center"><a href="javascript:void()"--}}
{{--                                                    class="btn-social btn-facebook waves-effect waves-light m-1"><i--}}
{{--                        class="fa fa-facebook"></i></a> <a href="javascript:void()"--}}
{{--                                                           class="btn-social btn-google-plus waves-effect waves-light m-1"><i--}}
{{--                        class="fa fa-google-plus"></i></a> <a href="javascript:void()"--}}
{{--                                                              class="list-inline-item btn-social btn-behance waves-effect waves-light"><i--}}
{{--                        class="fa fa-behance"></i></a> <a href="javascript:void()"--}}
{{--                                                          class="list-inline-item btn-social btn-dribbble waves-effect waves-light"><i--}}
{{--                        class="fa fa-dribbble"></i></a></div>--}}
        </div>
    </div>
</div>
