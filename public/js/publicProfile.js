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
