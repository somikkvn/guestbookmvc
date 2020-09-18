$(document).ready(function () {
    $('li').mouseenter(function () {
        $(this).toggleClass('alert')
    });
    $('li').mouseleave(function () {
        $(this).toggleClass('alert')
    });

    $('#send').bind("click", function (event) {
        event.preventDefault();
        $('#err1').empty();
        $('#err1a').empty();
        $('#err2').empty();
        $('#err3').empty();
        $('#err4').empty();
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

                        console.log(response);

                        //let responseData = /*JSON.parse*/(response);
                                 $('#err4').append(response['email']);
                                $('#err1a').append(response['username']);
                                console.log(response['email']);
                    if ( response['email'] === "" && response['username'] === "" && (validated))
                        {
                        window.location.replace('/login');
                        // window.location.href = "/login";
                        }
                        else {
                            $('#err').show();
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

            });
            return false;
        }
        return true;
    }
});