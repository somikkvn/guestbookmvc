$(document).ready(function (){
    $('li').mouseenter (function (){
        $(this).toggleClass('alert')
    });
    $('li').mouseleave (function (){
        $(this).toggleClass('alert')
    });
     //$(document).on('click', '#submit', function (){
        $('#send').bind("click", function (event) {
            event.preventDefault();
            $.ajax ({
                url: '/register',
                type: "POST",
                data: ({username: $("#username").val(), password: $("#password").val(), email: $("#email").val(), first_name: $("#first_name").val(), last_name: $("#last_name").val(), confirm_password: $("#confirm_password").val()}),
                dataType: "html",
                success: function (data) {

                    if ((data)){
                       // window.location.href = "/login";
                       //  console.log('cool');
                    }
                    else {
                        window.location.href = "/register";
                    }
                }

            });
        });
    $('#send2').bind("click", function (event) {
        event.preventDefault();
        $.ajax ({
            url: '/login',
            type: "POST",
            data: ({email: $("#email").val(), password: $("#password").val()}),
            dataType: "html",
            success: function (data) {
                // console.log ('Hi');
                window.location.href = "/guestbook";
            },
            error : function(error) {
                window.location.href = "/login";
            }
        });
    });
});
