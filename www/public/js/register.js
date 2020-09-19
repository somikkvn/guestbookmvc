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
        }
        console.log(request);
        // console.log(request.username);

        // let validated = validation(request);

            $.ajax({
                url: '/register',
                type: "POST",
                data: (request),
                dataType: "json",
                success: function (response) {
                        console.log(response);
                                $('#err1').append(response['error_username']);
                                $('#err1a').append(response['username']);
                                $('#err2').append(response['error_password']);
                                $('#err3').append(response['error_passwords']);
                                $('#err4').append(response['email']);

                                // console.log(response['email']);
                    if ( response['error_username'] === "" && response['username'] === "" && response['error_password'] === "" && response['error_passwords'] === "" && response['email'] === "")
                        {
                            window.location.href = "/login";
                        }
                }
            })
    });
});