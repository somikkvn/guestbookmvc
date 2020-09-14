$(document).ready(function () {
    $('li').mouseenter(function () {
        $(this).toggleClass('alert')
    });
    $('li').mouseleave(function () {
        $(this).toggleClass('alert')
    });

    $('#send').bind("click", function (event) {
        event.preventDefault();
        let request = {
            username: $("#username").val(),
            password: $("#password").val(),
            email: $("#email").val(),
            first_name: $("#first_name").val(),
            last_name: $("#last_name").val(),
            confirm_password: $("#confirm_password").val()
        }

        let validated = validation(request);
        if (validated) {
            $.ajax({
                url: '/register',
                type: "POST",
                data: (request),
                dataType: "html",
                success: function (request) {
                    if ((request)) {
                        // $('#send').prepend().load( '/login' );
                        window.location.href = "/login";
                        //  console.log('cool');
                    } else {
                        $('#err').show();
                        // $('.error_message').text('111')
                    }
                }

            });
        } else {
            $('#err').show();
            // $('.error_message').text('111')
        }
    });


    function validation(request) {
        // console.log('validation()')
        let data = [];
        if (request.username.length > 30) {
            data.push('Username does not fit');
        }
        if (request.password.length < 6) {
            data.push('Password must be min six characters');
        }
        if (request.password !== request.confirm_password) {
            data.push('Password mismatch');
        }

        // if (data.length) {
        //     data.forEach((text) => {
        //         $('.error_message').append('<p>' + text + '</p>');
        //     });

        if (data.length) {
            $.each(data, function (index, value) {
                // $('#err'+index).append(value);
                if (value == 'Username does not fit') {
                    $('#err1').append(value);
                }
                if (value == "Password must be min six characters") {
                    $('#err2').append(value);
                }
                if (value == "Password mismatch") {
                    $('#err3').append(value);
                }

            });

            return false;
        }

        return true;
    }

});