{{-- @if (count($comments) === 0)
                        <div class="site-section">
                            <div class="container">
                                <div class="bg-dark p-5 rounded mt-3">
                                    <p class="lead">Комментариев пока нет</p>
                                </div>
                            </div>
                        </div>
@else --}}
@foreach ($users as $user)
<div id="content" class="container">
    <div class="row">
        <h1>
            {{$user->name}}
        </h1>
    </div>
</div>

    {{-- <div id="content" class="container bootstrap snippets bootdey">
        <div class="row" style="margin-top:3rem; margin-right: -30px;
    margin-left: -28px;!important">
            <div class="col-md-12" data-aos="fade" data-aos-delay="200">
                <div class="blog-comment">

                    <ul class="comments">
                        <li class="clearfix">
                            @foreach ($users as $user)
                                @if ($comment->email_user === $user->email)
                                    @if ($user->avatar === 'users/default.png')
                                        <img src="https://eu.ui-avatars.com/api/?name={{ $user->name }}&background=a73737&color=050202&font-size=0.33&size=50"
                                            class="avatar" alt="avatar">
                                    @else
                                        <img src="{{ asset('storage/'.$user->avatar) }}"
                                            class="avatar img-fluid rounded-circle mr-1" width="40" alt="avatar">
                                    @endif
                                @endif
                            @endforeach

                            <div class="post-comments bg-dark">
                                <p class="meta">{{ $comment->created_at }} <a class="textincomment">
                                        {{ $comment->name_user }} : {{ $comment->email_user }}</a> <i
                                        class="pull-right"></a></i></p>

                                <p class="text-white">
                                    {{ $comment->message }}
                                </p>
                                @auth
                                    @if ($comment->email_user === Auth::user()->email)
                                        <a class="textcomment" href="{{ route('editComments', [$post_id, $comment->id]) }}"
                                            role="button">Редактировать комментарий</a>
                                </div>
                                <div class="container">
                                    <button type="button" value="{{ $post_id }}" data-comment="{{ $comment->id }}"
                                        class="btn btn-edit-comments del_comment btn-primary">Удалить комментарий</button>
                                </div>
    @endif
@endauth
</li>
</ul>
</div>
</div>
</div>
</div> --}}
@endforeach
{{-- @endif --}}