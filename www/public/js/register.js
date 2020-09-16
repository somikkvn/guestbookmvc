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
            confirm_password: $("#confirm_password").val(),
            err_email: $("#err_email").val(),
            err_username: $("#err_username").val(),
        }
        console.log(request);
        // console.log(request.username);

        let validated = validation(request);

            $.ajax({
                url: '/register',
                type: "POST",
                data: (request),
                dataType: "json",
                success: function (response) {
                    if ((response)) {
                        console.log(response);
                        let responseData = /*JSON.parse*/(response);

                         if(responseData.error[0] != undefined){
                             console.log(responseData.error[0])
                             $('#err4').append('Email is already registered');
                         }
                        if(responseData.error[1] != undefined){
                            console.log(responseData.error[1])
                            $('#err1a').append('Username is already registered');
                        }

                        if (validated) {
                        window.location.href = "/login";
                        }
                        else {
                            $('#err').show();
                        }
                    }
                }
            })

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
        // if (request.err_email !== ""){
        //     data.push('Email is already registered');
        // }
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
                if (value == 'Username is already registered') {
                    $('#err1a').append(value);
                }
                if (value == "Password must be min six characters") {
                    $('#err2').append(value);
                }
                if (value == "Password mismatch") {
                    $('#err3').append(value);
                }
                // if (value == "Email is already registered") {
                //     $('#err4').append(value);
                // }
                // if (value == "Username is already registered") {
                //     $('#err_email').append(value);
                // }
                // if (value == "Email is already registered") {
                //     $('#err_username').append(value);
                // }
            });
            return false;
        }
        return true;
    }
});