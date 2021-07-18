$(document).ready(function() {
    $.ajaxSetup({
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    $(document).on('click','.searchUser', function(e) {
     var data = $("#searchForm").serialize();
     Cookies.remove('searchEvent', '1');
        Cookies.remove('eventTable', '1');
     e.preventDefault();
        $.ajax({
            type: 'GET',
            url: 'getresultsearch',
            data: data,
            success: function(data) {
                $('#resultList').html(data);
            },
            error: function(data) {
                console.log("error");
            }
        });
    });
    $(document).on('click','.searchEvent', function(e) {

        Cookies.set('searchEvent', '1');
        var btnEvent = $("#searchEvent").val();
        var data = $("#searchForm").serialize();
        data += '&search_event='+btnEvent;
        e.preventDefault();
        $.ajax({
            type: 'GET',
            url: 'getresultsearch',
            data: data,
            success: function(data) {
                $('#resultList').html(data);
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
    $(document).on('click','#cityTable', function(e) {
        e.preventDefault();
        let city_name = $(this).val();
        Cookies.remove('searchEvent', '1');
        Cookies.remove('eventTable', '1');
        $.ajax({
            type: 'GET',
            url: 'getresultsearch',
            data: {
                city_name:city_name,
            },
            success: function(data) {
                $('#resultList').html(data);
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
    $(document).on('click','#eventTable', function(e) {
        e.preventDefault();

        let event_city = $(this).val();
        let search_event = '1';
        Cookies.set('eventTable', '1');
        $.ajax({
            type: 'GET',
            url: 'getresultsearch',
            data: {
                event_city:event_city,
                search_event: search_event
            },
            success: function(data) {
                $('#resultList').html(data);
            },
            error: function(data) {
                console.log("error");
            }
        });
    });
});


$(document).ready(function(){
    $.ajaxSetup({
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    $(document).on('click', '[role=\'navigation\'] a', function(event){

       event.preventDefault();
       var page = $(this).attr('href').split('page=')[1];
       let city_name = $('#city_search').val();
       if(Cookies.get("eventTable") === '1'|| Cookies.get("searchEvent") === '1') {
           getEvent(page, city_name, '1')
       } else {
           getUsers(page, city_name);
       }

    });

    function getEvent(page, city_name, search_event)
    {
        var _token = $("input[name=_token]").val();
        $.ajax({
            url: '/getresultsearch?page=' + page,
            method:"GET",
            data:{_token:_token, page:page, city_name:city_name, search_event: search_event},
            success:function(data)
            {
                $('#resultList').html(data);
            }
        });
    }
    function getUsers(page, city_name)
    {
        var _token = $("input[name=_token]").val();
     $.ajax({
         url: '/getresultsearch?page=' + page,
         method:"GET",
         data:{_token:_token, page:page, city_name:city_name},
         success:function(data)
         {
          $('#resultList').html(data);
         }
       });
    }

   });
$(document).ready(function(){
	$("#search").on("click", function (event) {
		//отменяем стандартную обработку нажатия по ссылке
		event.preventDefault();
		//забираем идентификатор бока с атрибута href
		var id  = $(this).attr('href'),
		//узнаем высоту от начала страницы до блока на который ссылается якорь
			top = $(id).offset().top;
		//анимируем переход на расстояние - top за 1500 мс
		$('body,html').animate({scrollTop: top}, 50);
	});
});
$("button").click(function() {
    $('html,body').animate({
        scrollTop: $("#resultList").offset().top},
        'slow');
});
