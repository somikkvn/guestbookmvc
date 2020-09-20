$(document).on('click', 'button', function (event){
        event.preventDefault();
        let id = $(this).attr('id');
        let request3 = {
            author: $("#author"+id).val(),
            text: $("#text"+id).val(),
            parent_id: $("#parent_id"+id).val(),
        }
         console.log(request3);

        $.ajax({
            url: '/guest',
            type: "POST",
            data: (request3),
            dataType: "html",
            success: function (response3) {
               // console.log(response3);
                $('#comment'+id).append(response3);
                $("#author"+id).val('');
                $("#text"+id).val('');

            }
        })

    });

