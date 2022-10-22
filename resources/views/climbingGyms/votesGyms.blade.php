@foreach ($likesDislikesGyms as $gym)
    <li class="search_city list-group-item d-flex justify-content-between align-items-center table-hover" >
        {{$gym->name}}<span class="badge badge-primary badge-pill" title="Количество лайков"
                            data-toggle="tooltip"
                            data-placement="bottom">{{$gym->sum_likes}}</span>
    </li>
@endforeach
