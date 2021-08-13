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
