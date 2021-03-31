$(document).ready(function() {
    $.ajaxSetup({
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    $(document).on('click','.searchUser', function(e) {
     var data = $("#searchForm").serialize();
     e.preventDefault();
        $.ajax({
            type: 'POST',
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

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    $(document).on('click', '[role=\'navigation\'] a', function(event){
       
       event.preventDefault(); 
       var page = $(this).attr('href').split('page=')[1];
       
       getUsers(page);
       
    });
   
    function getUsers(page)
    {
     var _token = $("input[name=_token]").val();
     $.ajax({
         url: '/getresultsearch?page=' + page,
         method:"POST",
         data:{_token:_token, page:page},
         success:function(data)
         {
          $('#resultList').html(data);
         }
       });
    }
   
   });

$(document).ready(function(){
	$("#search").on("click", function (event) {
        console.log('searchClick');
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

