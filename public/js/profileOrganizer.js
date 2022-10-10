$('#general_organizer').addClass('active');
$(document).on('click', '#general_organizer', function () {
    deactivateAllTabs();
    $('#general_organizer').addClass('active');
    getProfile('GeneralOrganizer');
});
$(document).on('click', '#create_event', function () {
    deactivateAllTabs();
    $('#create_event').addClass('active');
    getProfile('CreateEvent');
});
$(document).on('click', '#previews_event', function () {
    deactivateAllTabs();
    $('#previews_event').addClass('active');
    getProfile('PreviewsEvent');
});
$(document).on('click', '#current_event', function () {
    deactivateAllTabs();
    $('#current_event').addClass('active');
    getProfile('CurrentEvent');
});
function deactivateAllTabs() {
    $('#general_organizer, #create_event, #previews_event, #current_event').removeClass('active');
}
function getProfile(tab) {
    console.log(tab);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: '/organizer/profile/getProfile' + tab,
        success: function (data) {
            $('#tabContent').html(data);
        },
    });
}
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', '#saveChangesGeneralOrganizer', function (e) {
        setTimeout(function () {
            $('.alert-success').addClass('invisible');
            $('.alert-danger').addClass('invisible');
        }, 3000);
        var email = $('#email').val();
        var name = $('#name').val();
        var city = $('#city').val();
        var form_data = new FormData();
        form_data.append('name', name);
        form_data.append('email', email);
        form_data.append('city', city);
        let tab = 'GeneralOrganizer';
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/organizer/profile/editChangesGeneralOrganizer',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                getProfile(tab);
                var messages = $('.messages');
                var successHtml = '<div class="alert alert-success" style="border-radius: 15px">' +
                    '<i class="bi bi-check2"></i>' +
                    '<strong><i class="glyphicon glyphicon-ok-sign push-5-r"></strong> ' + data.message +
                    '</div>';
                $(messages).html(successHtml);
            },
            error: function (data) {
                var errors = data.responseJSON.message;
                var errorsHtml= '';
                $.each( errors, function( key, value ) {
                    errorsHtml += '<div class="alert alert-danger" style="border-radius: 15px">'+
                        '<i class="bi bi-exclamation-circle"></i> &ensp; '+
                        '<strong><i class="glyphicon glyphicon-ok-sign push-5-r"></strong> '+ value +
                        '</div>';
                });
                $('.messages').html(errorsHtml);
            }
        });
    });
});

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', '#saveChangesCreateEvent', function (e) {
        setTimeout(function () {
            $('.alert-success').addClass('invisible');
            $('.alert-danger').addClass('invisible');
        }, 3000);
        var data = $("#createEventForm").serialize();
        e.preventDefault();
        let tab = 'CreateEvent';
        $.ajax({
            type: 'POST',
            url: '/organizer/profile/editChangesCreateEvent',
            data: data,
            success: function (data) {
                getProfile(tab);
                var messages = $('.messages');
                var successHtml = '<div class="alert alert-success" style="border-radius: 15px">' +
                    '<button type="button" class="btn-close btn-close-black" aria-label="Close" data-dismiss="alert"></button>' +
                    '<strong><i class="glyphicon glyphicon-ok-sign push-5-r"></strong> ' + data.message +
                    '</div>';
                $(messages).html(successHtml);
            },
            error: function (data) {
                console.log("error");
            }
        });
    });
});
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', '#saveChangesCurrentEvent', function (e) {
        setTimeout(function () {
            $('.alert-success').addClass('invisible');
            $('.alert-danger').addClass('invisible');
        }, 3000);
        var data = $("#CurrentEventForm").serialize();
        e.preventDefault();
        let tab = 'CurrentEvent';
        $.ajax({
            type: 'POST',
            url: '/organizer/profile/editChangesCurrentEvent',
            data: data,
            success: function (data) {
                getProfile(tab);
                var messages = $('.messages');
                var successHtml = '<div class="alert alert-success" style="border-radius: 15px">' +
                    '<button type="button" class="btn-close btn-close-black" aria-label="Close" data-dismiss="alert"></button>' +
                    '<strong><i class="glyphicon glyphicon-ok-sign push-5-r"></strong> ' + data.message +
                    '</div>';
                $(messages).html(successHtml);
            },
            error: function (data) {
                var errors = data.responseJSON.message;
                var errorsHtml= '';
                $.each( errors, function( key, value ) {
                    errorsHtml += '<div class="alert alert-danger" style="border-radius: 15px">'+
                        '<button type="button" class="btn-close btn-close-black" aria-label="Close" data-dismiss="alert"></button>'+
                        '<strong><i class="glyphicon glyphicon-ok-sign push-5-r"></strong> '+ value +
                        '</div>';
                });
                $('.messages').html(errorsHtml);
            }
        });
    });
});
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', '#saveChangesPreviewsEvent', function (e) {
        setTimeout(function () {
            $('.alert-success').addClass('invisible');
            $('.alert-danger').addClass('invisible');
        }, 3000);
        var data = $("#PreviewsEventForm").serialize();
        e.preventDefault();
        let tab = 'PreviewsEvent';
        $.ajax({
            type: 'POST',
            url: '/organizer/profile/editChangesPreviewsEvent',
            data: data,
            success: function (data) {
                getProfile(tab);
                var messages = $('.messages');
                var successHtml = '<div class="alert alert-success" style="border-radius: 15px">' +
                    '<button type="button" class="btn-close btn-close-black" aria-label="Close" data-dismiss="alert"></button>' +
                    '<strong><i class="glyphicon glyphicon-ok-sign push-5-r"></strong> ' + data.message +
                    '</div>';
                $(messages).html(successHtml);
            },
            error: function (data) {
                var errors = data.responseJSON.message;
                var errorsHtml= '';
                $.each( errors, function( key, value ) {
                    errorsHtml += '<div class="alert alert-danger" style="border-radius: 15px">'+
                        '<button type="button" class="btn-close btn-close-black" aria-label="Close" data-dismiss="alert"></button>'+
                        '<strong><i class="glyphicon glyphicon-ok-sign push-5-r"></strong> '+ value +
                        '</div>';
                });
                $('.messages').html(errorsHtml);
            }
        });
    });
});

var $modal = $('#modal');
var image = document.getElementById('image');
var cropper;
$("body").on("change", ".image", function (e) {
    var files = e.target.files;
    var done = function (url) {
        image.src = url;
        $modal.modal('show');
    };
    var reader;
    var file;
    var url;
    if (files && files.length > 0) {
        file = files[0];

        if (URL) {
            done(URL.createObjectURL(file));
        } else if (FileReader) {
            reader = new FileReader();
            reader.onload = function (e) {
                done(reader.result);
            };
            reader.readAsDataURL(file);
        }
    }
});
$modal.on('shown.bs.modal', function () {
    cropper = new Cropper(image, {
    autoCrop: true,
    autoCropArea: 1,
    aspectRatio: 500 / 660,
    minCropBoxWidth: 500,
    minCropBoxHeight: 660,
    viewMode: 2,
    preview: '.preview'
    });
}).on('hidden.bs.modal', function () {
    cropper.destroy();
    cropper = null;
});
$("#crop").click(function () {
    canvas = cropper.getCroppedCanvas({
        width: 500,
        height: 600,
    });
    canvas.toBlob(function (blob) {
        url = URL.createObjectURL(blob);
        var reader = new FileReader();
        reader.readAsDataURL(blob);
        reader.onloadend = function () {
            var base64data = reader.result;
            var tab = 'General';
            setTimeout(function () {
                $('.alert-success').addClass('invisible');
                $('.alert-danger').addClass('invisible');
            }, 3000);
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "cropimageupload",
                data: { '_token': $('meta[name="_token"]').attr('content'), 'image': base64data },
                success: function (data) {
                    $modal.modal('hide');
                    getProfile(tab);
                    var messages = $('.messages');
                    var successHtml = '<div class="alert alert-success" style="border-radius: 15px">' +
                    '<button type="button" class="btn-close btn-close-black" aria-label="Close" data-dismiss="alert"></button>' +
                    '<strong><i class="glyphicon glyphicon-ok-sign push-5-r"></strong> ' + data.message +
                    '</div>';
                    $(messages).html(successHtml);
                },
                error: function (data) {
                    $modal.modal('hide');
                    var messages = $('.messages');
                    var successHtml = '<div class="alert alert-danger" style="border-radius: 15px">'+
                    '<button type="button" class="btn-close btn-close-black" aria-label="Close" data-dismiss="alert"></button>'+
                    '<strong><i class="glyphicon glyphicon-ok-sign push-5-r"></strong> '+ data.responseJSON.message +
                    '</div>';
                    $(messages).html(successHtml);
                }
            });
        }
    });
})
$(document).ready(function () {
    $(document).on('click', '#modalclose', function (e) {
    $modal.modal('hide');
})
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
$(function () {
    $('[data-toggle="tooltip"]').tooltip({
        animation: false,
        delay: {"show": 100, "hide": 100}
    })
})
