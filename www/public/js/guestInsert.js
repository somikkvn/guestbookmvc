$('#comment_from').on('submit',function(){//используйте id лучше
    e.pereventDefault();//блокируем действия по умолчанию, чтобы не перезагружать страницу
    let request = {
        username: $("#username").val(),
        password: $("#password").val(),//записываем сюда данные которые хотим передать
    }
    console.log(request);
    $.ajax({
        url:'file.php',
        data:request,//наши данные которые передадим
        method:'POST',//метод
        dataType:'text/plain',
    }).done(function(request){//допустим сервер будет возвращять JSON {isError="true",message="Всё записалось"}
        //описываем действия по получению ответа сервера
        if(request.isError==true){
            //коммент записался
            page.render(request);//отрисовываем наш комент с переданными ранее данными
        }
    }).fail(function(err){
        //обрабатываем ошибку ajax

    });
});