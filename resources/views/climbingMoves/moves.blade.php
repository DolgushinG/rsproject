@if($moves)
    @foreach($moves as $move)
        <div class="col-lg-2 col-md-6 d-flex align-items-stretch climbing_moves">
            <div class="member">
                <div class="member-video">
                    <video id="video{{$move->id}}" preload="metadata" muted width="200" height="240" controls loop playsinline>
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
    <div class="container">
        {{$moves->links('pagination::bootstrap-4')}}
    </div>
@endif

<script>
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        $(window).scroll(function(e)
        {
            var offsetRange = $(window).height() / 3,
                offsetTop = $(window).scrollTop() + offsetRange + $("#header").outerHeight(true),
                offsetBottom = offsetTop + offsetRange;

            $("video").each(function () {
                var y1 = $(this).offset().top;
                var y2 = offsetTop;
                if (y1 + $(this).outerHeight(true) < y2 || y1 > offsetBottom) {
                    this.pause();
                } else {
                    this.play();
                }
            });
        });
    }
</script>

