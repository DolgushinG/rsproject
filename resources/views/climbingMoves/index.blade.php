@extends('layout')
@section('content')
    <style>
        @media screen and (max-width: 767px) {
            ol, ul {
                padding-left: 4rem!important;
            }
        }
        @media screen and (max-width: 600px) {
            ol, ul {
                padding-left: 4rem!important;
            }
        }
        @media screen and (max-width: 840px) {
            ol, ul {
                padding-left: 4rem!important;
            }
        }
        @media screen and (max-width: 320px) {
            ol, ul {
                padding-left: 4rem!important;
            }
        }
        @media screen and (max-width: 460px) {
            ol, ul {
                padding-left: 4rem!important;
            }
        }
        ol, ul {
            padding-left: 0;
        }
    </style>
    <section id="team" class="team">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>База скалолазных движений для роутсеттеров</p>
            </header>
            <div class="social-btn-sp">
               {!! $shareButtons !!}
            </div>
            <div class="row gy-4">
                @if($moves)
                    @foreach($moves as $move)
                        <div class="col-lg-2 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                             data-aos-delay="400">
                            <div class="member">
                                <div class="member-video">
                                    <video id="video{{$move->id}}" width="200" height="240" controls loop>
                                        <source src="{{asset('storage'.$move->path)}}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                    <div class="social">
                                        <a href="{{$move->url}}"><i class="bi bi-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="member-info">
                    <span title="Likes" id="likeMove{{$move->id}}" data-type="like" data-move="{{$move->id}}"
                          class="btn btn-primary btn-sm" style="color:#FFFFFF" onclick="like(this)">
                          Нравится <i class="like-count{{$move->id}} badge badge-primary badge-pill" style="background-color: #236efd; margin-left: 2em">{{ $move->likesMoves() }}</i>
                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        @isset(Auth::user()->id )
            @if(Auth::user()->id === 30)
        <div class="container">
            <form id="send" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <div class="row gy-4">
                    <div class="col-md-12">
                        <label for="file">Прикрепите ваше движение в формате gif до 1.2 mb</label>
                        <input type="file" id="file" class="form-control" name="file"
                               placeholder="Прикрепите ваше движение в формате gif до 1.2 mb">
                        <div class="col-md-12 text-center">
                            <div class="send-loading">Loading</div>
                            <div class="send-error-message"></div>
                            <div class="sent-file-message">Ваше сообщение было отправлено</div>
                            <button class="btn btn-outline-primary mt-2" id='process-file-button'>Отправить</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
                @endif
        @endisset
        <div class="container">
            {{$moves->links('pagination::bootstrap-4')}}
        </div>
    </section>

    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '[role=\'navigation\'] a', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                getMoves(page)
            });

            function getMoves(page)
            {
                var _token = $("input[name=_token]").val();
                $.ajax({
                    url: '/climbing-moves?page=' + page,
                    method:"GET",
                    data:{_token:_token, page:page},
                    success:function(data)
                    {
                        $('#moves').html(data);
                    }
                });
            }
        });
        $('#process-file-button').on('click', function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            // you can't pass Jquery form it has to be javascript form object
            var files = new FormData();

            files.append('move', $('#file')[0].files[0]);
            document.querySelector('.send-loading').classList.add('d-block');
            document.querySelector('.send-error-message').classList.remove('d-block');
            document.querySelector('.sent-file-message').classList.remove('d-block');
            $.ajax({
                type: 'POST',
                url: '/send-move',
                data: files,
                cache : false,
                processData: false,
                contentType: false,
                success: function(response) {
                    document.querySelector('.send-loading').classList.remove('d-block');
                    document.querySelector('.sent-file-message').classList.add('d-block');
                    document.querySelector('#send').reset();
                    getMoves()
                },
                error: function(response) {
                    document.querySelector('.send-loading').classList.remove('d-block');
                    document.querySelector('.send-error-message').innerHTML = response;
                    document.querySelector('.send-error-message').classList.add('d-block');
                }
            });
        });

        function like(e) {
            let _type = e.getAttribute('data-type')
            let _move = e.getAttribute('data-move');
            let vm = $(e);
            let token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "/climbing-moves/likeDisLikeMove",
                type: "post",
                dataType: 'json',
                data: {
                    move: _move,
                    type: _type,
                    _token: token,
                },

                beforeSend: function () {
                    vm.addClass('disabled');
                },
                success: function (res) {
                    if (res.bool) {
                        vm.removeClass('disabled').addClass('active');
                        vm.removeAttr('id');
                        var _prevCount = $("." + _type + "-count" + _move).text();
                        _prevCount++;
                        $("." + _type + "-count" + _move).text(_prevCount);
                    }
                    if (!res.bool) {
                        vm.removeClass('disabled').addClass('active');
                        vm.removeAttr('id');
                        var _prevCount = $("." + _type + "-count" + _move).text();
                        _prevCount--;
                        $("." + _type + "-count" + _move).text(_prevCount);
                    }
                }
            });

        }
    </script>
@endsection
