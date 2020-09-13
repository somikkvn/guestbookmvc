$(document).ready(function (){
    $('li').mouseenter (function (){
        $(this).toggleClass('alert')
    });
    $('li').mouseleave (function (){
        $(this).toggleClass('alert')
    });
     //$(document).on('click', '#submit', function (){
        $('#submit').bind("click", function (event) {
            event.preventDefault();
            $.ajax ({
                url: $(this).attr('action'),
                type: "POST",
                data: ({username: $("#username").val(), password: $("#password").val(), email: $("#email").val(), first_name: $("#first_name").val(), last_name: $("#last_name").val(), confirm_password: $("#confirm_password").val()}),
                dataType: "html",
                success: function (data) {
                    // window.location.href = "/login";
                    // window.open('/login');
                },
                error : function(error) {
                    window.location.href = "/register";
                }
            });
        });
    $('#submit2').bind("click", function (event) {
        event.preventDefault();
        $.ajax ({
            url: $(this).attr('action'),
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
