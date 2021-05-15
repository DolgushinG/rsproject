$(document).ready(function() {
    let userId = $('#userId').val();
    getProfileReviewAndRate(userId);
    $.ajaxSetup({
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    $(document).on('click','#submitrating', function(e) {
        $('#rating').removeClass('visible')
        $('#rating').addClass('invisible')
        setTimeout(function(){
            $('.alert-success').addClass('invisible');
            $('.alert-danger').addClass('invisible');
          } , 3000);
        setTimeout(function(){
            $('#rating').removeClass('invisible')
            $('#rating').addClass('visible')
          } , 3000);
     var data = $("#rating").serialize();
     let userId = $('#userId').val();
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
                '<i class="glyphicon glyphicon-ok-sign push-5-r"> '+ data.message +
                '</div>';
                $(messages).html(successHtml);
            },
            error: function(data) {
                var errors = data.responseJSON.message;
                var errorsHtml= '';
                $.each( errors, function( key, value ) {
                    errorsHtml += '<div class="alert alert-danger">'+
                        '<button type="button" class="btn-close btn-close-black" aria-label="Close" data-dismiss="alert"></button>'+
                        '<strong><i class="glyphicon glyphicon-ok-sign push-5-r"></strong> '+ value +
                        '</div>';
                });
                $('.messages').html(errorsHtml);
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
            error: function(data) {
            }
        });
}

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    $(document).on('click', '[role=\'navigation\'] a', function(event){

       event.preventDefault();
       var page = $(this).attr('href').split('page=')[1];
       let userId = $('#userId').val();
       getProfileReviewAndRate(page, userId);
    });

    function getProfileReviewAndRate(page, userId)
    {
        var _token = $("input[name=_token]").val();
     $.ajax({
         url: '/getrating?page=' + page,
         method:"GET",
         data:{_token:_token, page:page, userId:userId},
         success:function(data)
         {
            $('#allReview').html(data);
         }
       });
    }
   });
$(function () {
    $('[data-toggle="tooltip"]').tooltip({
        animation: false,
        delay: {"show": 100, "hide": 100}
    })
})
