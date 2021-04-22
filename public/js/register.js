$(document).ready(function () {
    const button1 = document.querySelector('.next').style.background = 'gray';
    const button2 = document.querySelector('.next2').style.background = 'gray';
    const button3 = document.querySelector('.next3').style.background = 'gray';
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



// const fieldcommentName = document.querySelector('#name')
const fieldcommentPassword = document.querySelector('#password')
const fieldcommentConfPassword = document.querySelector('#password-confirm')
const buttoncomment = document.querySelector('.next')
// fieldcommentName.addEventListener('keyup', validate_form)
// fieldcommentPassword.addEventListener('keyup', validate_form)
// buttoncomment.style.background = 'gray';

let input = document.querySelector("#name");
let input2 = document.querySelector("#password");
let input3 = document.querySelector("#password-confirm");
let button = document.querySelector(".next");
function checkPassword(str)
{
// at least one number, one lowercase and one uppercase letter
// at least six characters that are letters, numbers or the underscore
var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{6,}$/;
return re.test(str);
}
const checkLengthcomment = function (evt) {
    if (fieldcommentConfPassword.value.length > 2) {
        if(input2.value != input3.value){
            $("#messageError").removeClass('hide_error');
            $("#messageError").addClass('show_error');
            return;
        }
        if(!checkPassword(input2.value)){
            return;
        }
        $("#messageError").removeClass('show_error');
        $("#messageError").addClass('hide_error');
        
        button.removeAttribute('disabled')
        button.style.background = '#4154f1';
    } else {
        button.setAttribute('disabled', 'disabled');
        button.style.background = 'gray';
    }
}
const checkLengthPassword = function (evt) {
    if(!checkPassword(input2.value)){
        $("#messageError2").removeClass('hide_error');
        $("#messageError2").addClass('show_error');
    } else {
        $("#messageError2").removeClass('show_error');
        $("#messageError2").addClass('hide_error');
    }
}

input.addEventListener("change", stateHandle);
input2.addEventListener("change", stateHandle);
function stateHandle() {
    fieldcommentPassword.addEventListener('keyup', checkLengthPassword)
  if (document.querySelector("#name").value != "" && document.querySelector("#password").value != "" && document.querySelector("#email").value != "") {
    fieldcommentConfPassword.addEventListener('keyup', checkLengthcomment)
  } else {
    button.disabled = true;
    button.style.background = 'gray'; 
  }
}


var validate_email = function (email) {
    var pattern = /^([a-zA-A0-9_.-])+@([a-zA-Z0-9_.-])+([a-zA-Z])+/;
    var is_email_valid = false;
    if (email.match(pattern) != null) {
        is_email_valid = true;
    }
    return is_email_valid;
}

$(document).on("keyup", ".email_id", function (event) {
    var keypressed = event.which;
    var input_val = $(this).val();
    var is_success = true;
    
    if (keypressed == 9) {
        is_success = validate_email(input_val);
        if (!is_success) {
            $(this).focus();
        }
    }
});

// $(document).on("focusout", ".email_id", function () {
//     var input_val = $(this).val();
//     var is_success = validate_email(input_val);
//     if (!is_success) {
//         $(".email_id").focus();
//     }
// });

let input4 = document.querySelector("#grade");
const buttonstep2 = document.querySelector('.next2');
const checkLengthcomment2 = function (evt) {
    if (input4.value.length < 0) {
        buttonstep2.setAttribute('disabled', 'disabled');
        buttonstep2.style.background = 'gray';
    } 
}
input4.addEventListener("change", stateHandle2);
function stateHandle2() {
  if (document.querySelector("#educational_requirements").value != "" && 
                    document.querySelector("#exp_level").value != "" && 
                    document.querySelector("#salary_route").value != "" && 
                    document.querySelector("#salary_hour").value != "") {
                        buttonstep2.removeAttribute('disabled')
                        buttonstep2.style.background = '#4154f1';
  } else {
    buttonstep2.disabled = true;
    buttonstep2.style.background = 'gray'; 
  }
}

$(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });



// step3 
let input5 = document.querySelector("#contact");
const buttonstep3 = document.querySelector('.next3');
input5.addEventListener("keyup", stateHandle3);
function stateHandle3() {
  if (document.querySelector("#contact").value.length > 0) {
        buttonstep3.removeAttribute('disabled');
        buttonstep3.style.background = '#4154f1';
  } else {
    buttonstep3.disabled = true;
    buttonstep3.style.background = 'gray'; 
  }
}


