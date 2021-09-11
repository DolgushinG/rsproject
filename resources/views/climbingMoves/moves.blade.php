@if($moves)
    @foreach($moves as $move)
        <div class="col-lg-2 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
             data-aos-delay="400">
            <div class="member">
                <div class="member-video">
                    <video id="video{{$move->id}}" width="200" height="240" controls="true" loop playsinline>
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

