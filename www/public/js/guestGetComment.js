$(document).ready(function () {
    $('#comment_from2').bind("click", function (e) {
        e.preventDefault();

        let request4 = {
            author: $("#author2").val(),
            text: $("#text2").val(),
            parent_id: $("#parent_id2").val(),
        }
        console.log(request4);
        // if ( request3['author'] === "" && request3['text'] === "")
        // {
        //    alert('Заполните все поля!');
        //
        // }
        $.ajax({
            url: '/guestbook',
            type: "POST",
            data: (request4),
            dataType: "json",
            success: function (response4) {

                console.log(response4);

            }
        })

    });

    $('#comment_from3').bind("click", function (ev) {
        ev.preventDefault();

        let request5 = {
            author: $("#author3").val(),
            text: $("#text3").val(),
            parent_id: $("#parent_id3").val(),
        }
        console.log(request5);
        $.ajax({
            url: '/guestbook',
            type: "POST",
            data: (request5),
            dataType: "json",
            success: function (response5) {

                console.log(response5);
            }
        })
    });

});