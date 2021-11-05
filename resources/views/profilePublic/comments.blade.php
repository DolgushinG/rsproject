@if(count($reviews) != 0 )
<div class="col-lg-12 mb-4">
    {!! $reviews->links() !!}
</div>
@foreach ($reviews as $review)
<div class="reviews-members pt-4 pb-4">
    <div class="media">
      <img alt="Generic placeholder image" src="https://eu.ui-avatars.com/api/?name={{$review->name_guest}}&background=a73737&color=050202&font-size=0.33&size=150" class="mr-3 rounded-pill">
        <div class="container media-body">
            <div class="reviews-members-header">
                <div class="col-sm-12">
                    @for($i = 5; $i >= 1; $i--)
                    @if($i === $review->rating)
                    <form action="">
                    <input class="stars star-{{$i}}" value="{{$i}}" id="star-{{$review->id}}" type="radio" name="star" checked>
                    <label class="stars star-{{$i}}" for="star-{{$review->id}}"></label>
                    @else
                    <input class="stars star-{{$i}}" value="{{$i}}" id="star-{{$review->id}}" type="radio" name="star">
                    <label class="stars star-{{$i}}" for="star-{{$review->id}}"></label>
                    @endif
                   @endfor
                    </form>
                </div>
                <h6 class="mb-1"><a class="text-black" href="#">{{$review->name_guest}}</a></h6>
                <p class="text-gray">{{$review->created_at}}</p>
            </div>
            <div class="reviews-members-body">
                <p>{{$review->review}}</p>
            </div>
        </div>
    </div>
</div>

@endforeach
@else
    <h6 class="mb-3 ml-1 mt-4">Отзывов и оценок нет</h6>
@endif
