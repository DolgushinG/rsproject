<div class="cookie-policy__card theme i-bem cookie-policy__card_js_inited">
    <div class="cookie-policy__text">
      <div class="text">Мы сохраняем файлы cookie<br>(всё <a class="text text_view_link" href="{{route('privacyconf')}}" target="_blank">по правилам конфиденциальности</a>)
      </div>
     </div>
    <div class="cookie-policy__ok-btn i-bem cookie-policy__ok-btn_js_inited">
      <div id="cookie_agree" style="color: white" class="text text_view_link text_size_m">OK</div>
      </div>
</div>
<script>
    if(Cookies.get("cookie_agreement") === "true"){
        $('.cookie-policy__card').attr('style', 'display:none');
    } else {
        Cookies.set('cookie_agreement', 'false');
    }
    $('#cookie_agree').click(function(){
                Cookies.set('cookie_agreement', 'true');
                $('.cookie-policy__card').attr('style', 'display:none');
        });

</script>
