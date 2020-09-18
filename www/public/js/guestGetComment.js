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

});