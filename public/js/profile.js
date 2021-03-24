$('#general').addClass('active');
$(document).on('click', '#general', function () {
    deactivateAllTabs();
    $('#general').addClass('active');
    getProfile('General');
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
    $('#general, #info, #socialLinks, #connections, #notifications').removeClass('active');
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
$('#upload').on('click', function() {
        var file_data = $('#sortpicture').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        alert(form_data);
        $.ajax({
            url: 'editChagesGeneral',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(php_script_response){
                alert(php_script_response);
            }
         });
    });
    
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    $(document).on('click','#saveChangesNotifications', function(e) {
     var data = $("#notificationsForm").serialize();
     e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'editChagesNotifications',
            data: data,
            success: function(data) {
                $('#tabContent').html(data);
            },
            error: function(data) {
                console.log("error");
            }
        });
    });
});
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    $(document).on('click','#saveChangesInfo', function(e) {
     var data = $("#infoForm").serialize();
     e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'editChagesInfo',
            data: data,
            success: function(data) {
                $('#tabContent').html(data);
            },
            error: function(data) {
                console.log("error");
            }
        });
    });
});
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    $(document).on('click','#saveChangesSocialLinks', function(e) {
     var data = $("#socialLinksForm").serialize();
     e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'editChagesSocialLinks',
            data: data,
            success: function(data) {
                $('#tabContent').html(data);
            },
            error: function(data) {
                console.log("error");
            }
        });
    });
});

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
