getProfile('General');
$('#general').addClass('active');
$(document).on('click', '#general', function () {
    deactivateAllTabs();
    $('#general').addClass('active');
    getProfile('General');
});
$(document).on('click', '#changePassword', function () {
    deactivateAllTabs();
    $('#changePassword').addClass('active');
    getProfile('ChangePassword');
});
$(document).on('click', '#info', function () {
    deactivateAllTabs();
    $('#info').addClass('active');
    getProfile('Info');
});
$(document).on('click', '#socialLinks', function () {
    deactivateAllTabs();
    $('#socialLinks').addClass('active');
    getProfile('SocialLinks');
});
$(document).on('click', '#connections', function () {
    deactivateAllTabs();
    $('#connections').addClass('active');
    getProfile('Connections');
});
$(document).on('click', '#notifications', function () {
    deactivateAllTabs();
    $('#notifications').addClass('active');
    getProfile('Notifications');
});
function deactivateAllTabs(){
    $('#general, #changePassword, #info, #socialLinks, #connections, #notifications').removeClass('active');
 }
function getProfile(tab){
    console.log(tab);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
           $.ajax({
               type: 'GET',
               url: 'getProfile'+tab,
               success: function(data) {
                   $('#tabContent').html(data);
               },
           });
}
// $(document).ready(function() {
//     $.ajaxSetup({
//         headers: {
//                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                 }
//             });
//     $(document).on('click','#saveChangesPassword', function(e) {
//      let data = $("#changesForm").serialize();
//      console.log(data);
//      e.preventDefault();
//         $.ajax({
//             type: 'POST',
//             url: 'editChagesPassword',
//             data: data,
//             success: function(data) {
//                 $('#tabContent').html(data);
//             },
//             error: function(data) {
//                 console.log("error");
//             }
//         });
//     });
// });
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
