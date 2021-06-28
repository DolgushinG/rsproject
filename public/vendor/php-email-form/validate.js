/**
* PHP Email Form Validation - v3.0
* URL: https://bootstrapmade.com/php-email-form/
* Author: BootstrapMade.com
*/
(function () {
  "use strict";

  let forms = document.querySelectorAll('.php-email-form');

  forms.forEach( function(e) {
    e.addEventListener('submit', function(event) {
        event.preventDefault();
            var option = document.getElementsByClassName('star');
            if (!(option[0].checked || option[1].checked || option[2].checked || option[3].checked || option[4].checked)) {
                displayError(this, 'Проголосуйте звездочками это обязательно для заполнения');
                return;
            }
      let thisForm = this;
      let action = thisForm.getAttribute('action');
      let recaptcha = thisForm.getAttribute('data-recaptcha-site-key');
      if( ! action ) {
        displayError(thisForm, 'The form action property is not set!')
        return;
      }
      thisForm.querySelector('.loading').classList.add('d-block');
      thisForm.querySelector('.error-message').classList.remove('d-block');
      thisForm.querySelector('.sent-message').classList.remove('d-block');

      let formData = new FormData( thisForm );

      if ( recaptcha ) {
        if(typeof grecaptcha !== "undefined" ) {
          grecaptcha.ready(function() {
            try {
              grecaptcha.execute(recaptcha, {action: 'php_email_form_submit'})
              .then(token => {
                formData.set('recaptcha-response', token);
                php_email_form_submit(thisForm, action, formData);
              })
            } catch(error) {
              displayError(thisForm, error)
            }
          });
        } else {
          displayError(thisForm, 'The reCaptcha javascript API url is not loaded!')
        }
      } else {
        php_email_form_submit(thisForm, action, formData);
      }
    });
  });

  function php_email_form_submit(thisForm, action, formData) {
      let userId = $('#userId').val();

    fetch(action, {
      method: 'POST',
      body: formData,
      headers: {'X-Requested-With': 'XMLHttpRequest'}
    })
    .then(response => {
      if( response.ok ) {
          thisForm.querySelector('.loading').classList.remove('d-block');
          thisForm.querySelector('.sent-message').classList.add('d-block');
          thisForm.reset();
          if(userId !== undefined){
              getProfileReviewAndRate(userId);
          }
      } else {
          if(userId !== undefined){
              if(response.statusText === 'You already did review') {
                  let msg = 'Вы уже сделали отзыв';
                  throw new Error(msg);
              }

          }
        throw new Error(`${response.status} ${response.statusText} ${response.url}`);
      }
    })
    .catch((error) => {
      displayError(thisForm, error);
    });
  }

  function displayError(thisForm, error) {
    thisForm.querySelector('.loading').classList.remove('d-block');
    thisForm.querySelector('.error-message').innerHTML = error;
    thisForm.querySelector('.error-message').classList.add('d-block');
  }

})();
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
