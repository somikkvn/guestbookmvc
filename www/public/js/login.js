$(document).ready(function () {
    $('#send2').bind("click", function (event) {
        event.preventDefault();
        let request2 = {
            password: $("#password").val(),
            email: $("#email").val()
        }
        let validated2 = validation2(request2);
        if (validated2) {
            $.ajax({
                url: '/login',
                type: "POST",
                data: (request2),
                dataType: "html",
                success: function (request2) {
                    if ((request2)) {
                        window.location.href = "/guestbook";
                    } else {
                        $('#err').show();
                    }
                    console.log(request2)
                }
            });
        } else {
            $('#err').show();
        }
    });

    function validation2(request2) {
        // console.log('validation2()')
        let data = [];
        if (request2.password.length < 6) {
            data.push('Password must be min six characters');
        }

        // if (data.length) {
        //     data.forEach((text) => {
        //         $('.error_message').append('<p>' + text + '</p>');
        //     });

        if (data.length) {
            $.each(data, function (index, value) {
                // $('#err'+index).append(value);
                if (value == "Password must be min six characters") {
                    $('#err2').append(value);
                }
            });

            return false;
        }

        return true;
    }
});