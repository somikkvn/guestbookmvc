$(document).ready(function () {
    $('#comment_from').on("click", function (event) {
        event.preventDefault();

        let request3 = {
            author: $("#author").val(),
            text: $("#text").val(),
            parent_id: $("#parent_id").val(),
        }
        console.log(request3);
        // if ( request3['author'] === "" && request3['text'] === "")
        // {
        //    alert('Заполните все поля!');
        //
        // }
        $.ajax({
            url: '/guestbook',
            type: "POST",
            data: (request3),
            dataType: "json",
            success: function (response3) {

                console.log(response3);

            }
        })

    });
});
