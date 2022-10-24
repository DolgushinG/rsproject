$(document).ready(function () {
    const step1 = document.querySelector('#step1');
    step1.style.background = 'gray'
    step1.toggleAttribute("disabled", true);
    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;

    setProgressBar(current);


    $(".next").click(function () {
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            $('body, html').animate({scrollTop: 0}, 0.001);
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function (now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 500
            });

            setProgressBar(++current);
    });

    $(".previous").click(function () {

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({
            opacity: 0
        }, {
            step: function (now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({
                    'opacity': opacity
                });
            },
            duration: 500
        });
        setProgressBar(--current);
    });

    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
    }
});

let input_name = document.querySelector("#name");
let input_email = document.querySelector("#email");
const step1 = document.querySelector('#step1')
input_name.addEventListener("keyup", state_handle_name);
input_email.addEventListener("keyup", state_handle_email);
const check_length_name = function (evt) {
    if(input_name.value.length < 2){
        show_alert('#messageError2')
        step1.toggleAttribute("disabled", true);
        step1.style.background = 'gray';
    } else {
        hide_alert('#messageError2')
        step1.toggleAttribute("disabled", false);
        step1.style.background = '#4154f1';
    }
}
const check_length_email = function (evt) {
    console.log('input_email.value.length', input_email.value.length > 6)
    console.log('validateEmail', validateEmail(input_email.value))
    console.log('input_name.value', input_name.value.length > 2)
    if(input_email.value.length > 6 && validateEmail(input_email.value)){
        if(input_name.value.length > 2) {
            step1.toggleAttribute("disabled", false);
            step1.style.background = '#4154f1';
        }
        hide_alert('#messageError')
    } else {

        step1.toggleAttribute("disabled", true);
        step1.style.background = 'gray';
    }
}
input_name.addEventListener('keydown', function(event) {
    const key = event.key;
    if (key === "Backspace" || key === "Delete") {
        check_length_name()
    }
});
input_email.addEventListener('keydown', function(event) {
    const key = event.key;
    if (key === "Backspace" || key === "Delete") {
        if(input_email.value.length > 6 && validateEmail(input_email.value) && input_name.value.length > 2){
            hide_alert('#messageError')
            step1.toggleAttribute("disabled", false);
            step1.style.background = '#4154f1';
        } else {
            console.log('input_email.value.length', input_email.value.length)
            console.log('validateEmail', validateEmail(input_email.value))
            if(input_email.value.length > 6 && !validateEmail(input_email.value)){
                console.log('show')
                show_alert('#messageError')
            }
            step1.toggleAttribute("disabled", true);
            step1.style.background = 'gray';
        }
    }
});
function show_alert(selector){
    const msg_error2 = $(selector);
    msg_error2.removeClass('hide_error');
    msg_error2.addClass('show_error');
    return false
}
function hide_alert(selector){
    const msg_error = $(selector)
    msg_error.removeClass('show_error');
    msg_error.addClass('hide_error');
    return true
}
function state_handle_name() {
    input_name.addEventListener('keyup', check_length_name)
    console.log('input_name.value',input_name.value)
    if (input_name.value) {
        input_name.addEventListener('keyup', check_length_name)
    } else {
        step1.toggleAttribute("disabled", true);
        step1.style.background = 'gray';
    }
}
function state_handle_email() {
    input_email.addEventListener('keyup', check_length_email)
    if (input_email.value) {
        input_email.addEventListener('keyup', check_length_email)
    } else {
        step1.toggleAttribute("disabled", true);
        step1.style.background = 'gray';
    }
}
function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}


const input_password = document.querySelector('#password')
const input_confirm_password = document.querySelector('#password-confirm')
const step2 = document.querySelector('#step2')
const check_length_pass = function (evt) {
    if (input_confirm_password.value.length > 4) {
        if(input_password.value !== input_confirm_password.value){
           show_alert('#message-error-conf-pass')
        } else {
            hide_alert('#message-error-conf-pass')
            step2.toggleAttribute("disabled", false);
            step2.style.background = '#4154f1';
        }
    } else {
        step2.toggleAttribute("disabled", true);
        step2.style.background = 'gray';
    }
}
const checkLengthPassword = function (evt) {
    if(input_password.value.length < 0){
        show_alert('#message-error-pass')
        step2.toggleAttribute("disabled", true);
        step2.style.background = 'gray';
    } else {
        hide_alert('#message-error-pass')
    }
}

input_password.addEventListener("keyup", stateHandle);
function stateHandle() {
    input_password.addEventListener('keyup', checkLengthPassword)
  if (input_password.value) {
      input_confirm_password.addEventListener('keyup', check_length_pass)
  } else {
      step2.toggleAttribute("disabled", true);
      step2.style.background = 'gray';
  }
}
input_password.addEventListener('keydown', function(event) {
    const key = event.key;
    if (key === "Backspace" || key === "Delete") {
        check_length_pass()
    }
});
input_confirm_password.addEventListener('keydown', function(event) {
    const key = event.key;
    if (key === "Backspace" || key === "Delete") {
        if(input_password.value === input_confirm_password.value){
            hide_alert('#message-error-conf-pass')
            step2.toggleAttribute("disabled", false);
            step2.style.background = '#4154f1';
        } else {
            show_alert('#message-error-conf-pass')
            step2.toggleAttribute("disabled", true);
            step2.style.background = 'gray';
        }
    }
});
// let input4 = document.querySelector("#grade");
// const buttonstep2 = document.querySelector('.next2');
// const checkLengthcomment2 = function (evt) {
//     if (input4.value.length < 0) {
//         buttonstep2.setAttribute('disabled', 'disabled');
//         buttonstep2.style.background = 'gray';
//     }
// }
// input4.addEventListener("change", stateHandle2);
// function stateHandle2() {
//       var textinputs = document.querySelectorAll('input[type=checkbox]');
//       var empty = [].filter.call( textinputs, function( el ) {
//           return !el.checked
//       });
//       if (textinputs.length == empty.length) {
//           $("#messageError3").removeClass('hide_error');
//           $("#messageError3").addClass('show_error');
//       } else {
//           $("#messageError3").removeClass('show_error');
//           $("#messageError3").addClass('hide_error');
//           buttonstep2.removeAttribute('disabled')
//           buttonstep2.style.background = '#4154f1';
//       }
// }
$(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });



// // step3
// let input5 = document.querySelectorAll("#contact");
// const buttonstep3 = document.querySelector('.next3');
// input5.addEventListener("change", stateHandle3);
// function stateHandle3() {
//   if (document.querySelector("#contact").value.length > 0 || document.querySelector("#telegram").value.length > 0 || document.querySelector("#instagram").value.length > 0) {
//         buttonstep3.removeAttribute('disabled');
//         buttonstep3.style.background = '#4154f1';
//   } else {
//     buttonstep3.disabled = true;
//     buttonstep3.style.background = 'gray';S
//   }
// }
// $('input[type="checkbox"]').on('change', function() {
//     var textinputs = document.querySelectorAll('input[type=checkbox]');
//     var empty = [].filter.call( textinputs, function( el ) {
//         return !el.checked
//     });
//
//     if (textinputs.length == empty.length) {
//         $("#messageError3").removeClass('hide_error');
//         $("#messageError3").addClass('show_error');
//         buttonstep2.setAttribute('disabled', 'disabled');
//         buttonstep2.style.background = 'gray';
//     } else {
//         $("#messageError3").removeClass('show_error');
//         $("#messageError3").addClass('hide_error');
//         buttonstep2.removeAttribute('disabled')
//         buttonstep2.style.background = '#4154f1';
//     }
// });
$('textarea').on('input', function (){
    $(this).outerHeight(38).outerHeight(this.scrollHeight);
});
var rangeSlider = function(){
    var slider = $('.range-slider'),
        range = $('.range-slider__range'),
        value = $('.range-slider__value');

    slider.each(function(){

        value.each(function(){
            var value = $(this).prev().attr('value');
            $(this).html(value);
        });

        range.on('input', function(){
            $(this).next(value).html(this.value);
        });
    });
};

rangeSlider();

