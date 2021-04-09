$(document).ready(function() {
    $.ajaxSetup({
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    $(document).on('click','#submitrating', function(e) {
        $('#rating').addClass('invisible')
        setTimeout(function(){
            $('.alert-success').addClass('invisible');
          } , 3000);
          setTimeout(function(){
            $('#rating').removeClass('invisible')
            $('#rating').addClass('visible')
          } , 3000);
     var data = $("#rating").serialize();
     let userId = $('#userId').val();
     console.log(userId);
     e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'rating',
            data: data,
            success: function(data) {
                getProfileReviewAndRate(userId);
                $("#rating")[0].reset();
                var messages = $('.messages');
                var successHtml = '<div class="alert alert-success">'+
                '<button type="button" class="btn-close btn-close-black" aria-label="Close" data-dismiss="alert"></button>'+
                '<strong><i class="glyphicon glyphicon-ok-sign push-5-r"></</strong> '+ data.message +
                '</div>';
                $(messages).html(successHtml);
            },
            error: function(data) {
            }
        });
    });
});
function getProfileReviewAndRate(userId){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'GET',
            url: '/getrating',
            data: {
                userId: userId,
            },
            success: function(data) {
                $('#allReview').html(data);
                
            },
        });
}