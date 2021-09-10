@if($moves)
    <script type="text/javascript" src="{{ asset('js/gifffer.js') }}"></script>
    @foreach($moves as $move)
        <div class="col-lg-2 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
             data-aos-delay="400">
            <div class="member">
                <div class="member-video">
                    <video id="video{{$move->id}}" width="200" height="240" controls loop>
                        <source src="{{asset('storage'.$move->path)}}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
{{--                    <div class="social">--}}
{{--                        <a href="{{$move->url}}"><i class="bi bi-instagram"></i></a>--}}
{{--                    </div>--}}

                </div>
            </div>
        </div>
        <script>
            $(document).on('click', '#video', function (e) {
                var video = $('#video').get(0);  // This line has been updated.
                if (video.paused === false) {
                    video.pause();
                } else {
                    video.play();
                }
                return false;
            });
        </script>
    @endforeach
@endif
