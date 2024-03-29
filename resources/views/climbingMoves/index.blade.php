@extends('layout')
@section('content')
    <style>
        @media screen and (max-width: 767px) {
            #social-links ol, ul {
                padding-left: 4rem!important;
            }
        }
        @media screen and (max-width: 600px) {
            #social-links ol, ul {
                padding-left: 4rem!important;
            }
        }
        @media screen and (max-width: 840px) {
            #social-links ol, ul {
                padding-left: 4rem!important;
            }
        }
        @media screen and (max-width: 320px) {
            #social-links ol, ul {
                padding-left: 4rem!important;
            }
        }
        @media screen and (max-width: 460px) {
            #social-links ol, ul{
                padding-left: 4rem!important;
            }
            #navbar ul{
                padding-left: 0rem!important;
            }
        }
        ol, ul {
            padding-left: 0;
        }
        .movesHide {
            display: none;
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
            <div class="col-md-12 text-center">
                <div class="send-loading-main">Loading</div>
            </div>
            <div id="moves" class="row gy-4 movesHide">
                @include('climbingMoves.moves')
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
                        <label for="url">Url full video</label>
                        <input type="text" id="url" name="url" class="form-control" placeholder="https://example.com/some">
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
    </section>

    <script>
        document.querySelector('.send-loading-main').classList.add('d-block');
        setTimeout(function() {
            document.querySelector('#moves').classList.remove('movesHide');
            document.querySelector('.send-loading-main').classList.remove('d-block');
        }, 2000);
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '.pagination a', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                getMoves(page)
            });

            function getMoves(page)
            {
                $.ajax({
                    url: '/climbing-moves/moves?page='+page,
                    method:"GET",
                    data:{page:page},
                    success:function(data)
                    {
                        document.querySelector('.send-loading-main').classList.add('d-block');
                        setTimeout(function() {
                            document.querySelector('.send-loading-main').classList.remove('d-block');
                        }, 2000);
                        $('#moves').html(data);
                    }
                });
            }
        });
        function getMoves(page)
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            document.querySelector('.send-loading-main').classList.add('d-block');
            setTimeout(function() {
                document.querySelector('.send-loading-main').classList.remove('d-block');
            }, 2000);

            $.ajax({
                url: '/climbing-moves/moves?page='+page,
                method:"GET",
                success:function(data)
                {
                    $('#moves').html(data);
                }
            });
        }
        $('#process-file-button').on('click', function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var page = document.querySelector('.page-item.active').innerText;
            e.preventDefault();
            // you can't pass Jquery form it has to be javascript form object
            let files = new FormData();
            let url = $('#url').val()
            files.append('url', url);
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
                    getMoves(page)
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
