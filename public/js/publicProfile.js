// $(document).ready(function() {
//     let userId = $('#userId').val();
//     getProfileReviewAndRate(userId);
//     $.ajaxSetup({
//         headers: {
//                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                 }
//             });
//     $(document).on('click','#submitrating', function(e) {
//         $('.loading-public-profile').addClass('d-block');
//         // $('#rating').removeClass('visible')
//         $('#submitrating').addClass('invisible');
//         // setTimeout(function(){
//         //     $('.alert-success').addClass('invisible');
//         //     $('.alert-danger').addClass('invisible');
//         //   } , 3000);
//
//      var data = $("#rating").serialize();
//      let userId = $('#userId').val();
//      e.preventDefault();
//         $.ajax({
//             type: 'POST',
//             url: '/profile/rating',
//             data: data,
//             success: function(data) {
//                 setTimeout(function(){
//                     $('.loading-public-profile').removeClass('d-block');
//                     $('.loading-public-profile-sent-message').addClass('d-block');
//                 } , 2000);
//                 // $('.loading-public-profile').removeClass('d-block');
//                 getProfileReviewAndRate(userId);
//                 $("#rating")[0].reset();
//                 // var messages = $('.messages');
//                 // var successHtml = '<div class="alert alert-success">'+
//                 // '<button type="button" class="btn-close btn-close-black" aria-label="Close" data-dismiss="alert"></button>'+
//                 // '<i class="glyphicon glyphicon-ok-sign push-5-r"> '+ data.message +
//                 // '</div>';
//                 $(messages).html(successHtml);
//             },
//             error: function(data) {
//                 setTimeout(function(){
//                     $('.loading-public-profile').removeClass('d-block');
//                     $('.loading-public-profile-error').addClass('d-block');
//                 } , 2000);
//                 var errors = data.responseJSON.message;
//                 var errorsHtml= '';
//                 $.each( errors, function( key, value ) {
//                     errorsHtml +=  value;
//                 });
//                 $('.loading-public-profile-error').html(errorsHtml);
//             }
//         });
//     });
// });
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
// $(function () {
//
//     $(document).on('click','#email', function(e) {
// var option = document.getElementsByClassName('star');
//
// if (!(option[0].checked || option[1].checked || option[2].checked || option[3].checked || option[4].checked)) {
//     console.log("Please Select Your Gender");
// }
// })
// });
