getProfile('General');
$(document).on('click', '#general', function () {
    getProfile('General');
});
$(document).on('click', '#changePassword', function () {
    getProfile('ChangePassword');
});
$(document).on('click', '#info', function () {
    getProfile('Info');
});
$(document).on('click', '#socialLinks', function () {
    getProfile('SocialLinks');
});
$(document).on('click', '#connections', function () {
    getProfile('Connections');
});
$(document).on('click', '#notifications', function () {
    getProfile('Notifications');
});

function getProfile($tabcontent){
        $tab = $tabcontent;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
           $.ajax({
               type: 'GET',
               url: 'getProfile'+$tab,
               success: function(data) {
                   $('#tabContent').html(data);
               },
           });
}

// if(Cookies.get("_hidemode") === "Enabled"){
//     let id = $('.comment').val();
//     $('#commentField_'+id).slideUp();
//     $('#commentField_'+id).addClass('hide_comments');
//     document.querySelector("#showHideContent").innerHTML = 'Посмотреть комментарии';
//     document.querySelector("#showHideContent").dataset.secondname = 'Скрыть комментарии';
// } else if (Cookies.get("_showmode") === "Enabled") {
//     let id = $('.comment').val();
//     $('#commentField_'+id).addClass('show_comments');
//     getComments(id);

//     $('#commentField_'+id).slideDown();
//     document.querySelector("#showHideContent").innerHTML = 'Скрыть комментарии';
//     document.querySelector("#showHideContent").dataset.secondname = 'Посмотреть комментарии';
// } else {
//     let id = $('.comment').val();
//     Cookies.set('_hidemode', 'Enabled');
//     document.querySelector("#showHideContent").innerHTML = 'Посмотреть комментарии';
//     document.querySelector("#showHideContent").dataset.secondname = 'Скрыть комментарии';
//     $('#commentField_'+id).addClass('hide_comments');
// }

// //comment
// const checkLengthcomment = function(evt) {
//     if (fieldcomment.value.length > 1) {
//         buttoncomment.removeAttribute('disabled')
//     } else {
//         buttoncomment.setAttribute('disabled','disabled');
//     }
//   }
//   const fieldcomment = document.querySelector('#commenttext')
//   const buttoncomment = document.querySelector('.submitComment')
//   fieldcomment.addEventListener('keyup', checkLengthcomment)
