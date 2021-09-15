@if($holds)
<div class="col-xl-8 d-flex content">
    <div class="row align-self-center gy-4">
        @foreach($holds as $hold)
            <div class="col-md-6 icon-box" data-aos="fade-up">
                <i class="ri-line-chart-line"></i>
                <div>
                    <h4><a href="{{$hold->url}}">{{$hold->name}}</a></h4>
                    <p>Тип</p><p>{{$hold->type}}</p>
                    <p>Материал</p><p>{{$hold->materials}}</p>
                    <p>Производство</p><p>{{$hold->headquarters}}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif
