<div class="tab-pane active show" id="tab-reviews">
    <table class="table table-hover table-striped">
        <tbody>
        @foreach($reviews as $review)
            <tr>
                <td><span class="float-right font-weight-bold">{{$review->created_at}}</span>
                    <h4>{{$review->name_guest}}</h4> {{$review->review}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


