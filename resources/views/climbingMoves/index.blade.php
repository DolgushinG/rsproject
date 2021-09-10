@extends('layout')
@section('content')
    <style>
        .send-loading{
            display: none;
            background: #fff;
            text-align: center;
            padding: 15px;
            margin-bottom: 24px;
        }

        .send-loading:before{
            content: "";
            display: inline-block;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            margin: 0 10px -6px 0;
            border: 3px solid #18d26e;
            border-top-color: #eee;
            -webkit-animation: animate-loading 1s linear infinite;
            animation: animate-loading 1s linear infinite;
        }
        .sent-file-message{
            display: none;
            color: #fff;
            background: #18d26e;
            text-align: center;
            padding: 15px;
            margin-bottom: 24px;
            font-weight: 600;
        }
        .send-error-message {
            display: none;
            color: #fff;
            background: #ed3c0d;
            text-align: left;
            padding: 15px;
            margin-bottom: 24px;
            font-weight: 600;
        }
        Gifffer({
        playButtonStyles: {
        'width': '60px',
        'height': '60px',
        'border-radius': '30px',
        'background': 'rgba(0, 0, 0, 0.3)',
        'position': 'absolute',
        'top': '50%',
        'left': '50%',
        'margin': '-30px 0 0 -30px'
        },
        playButtonIconStyles: {
        'width': '0',
        'height': '0',
        'border-top': '14px solid transparent',
        'border-bottom': '14px solid transparent',
        'border-left': '14px solid rgba(0, 0, 0, 0.5)',
        'position': 'absolute',
        'left': '26px',
        'top': '16px'
        }
        });
    </style>
    <section id="team" class="team">

        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>База скалолазных движений для роутсеттеров</p>
            </header>
            <div id="moves" class="row gy-4">
            </div>
            </div>
        </div>
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
    </section>

    <script>

        getMoves()
        function getMoves()
        {$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
            $.ajax({
                url: '/moves',
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
    </script>
@endsection
