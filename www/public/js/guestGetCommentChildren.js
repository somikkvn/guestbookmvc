$(document).ready(function () {
      $('#comment_from3').bind("click", function (event) {
        event.preventDefault();

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