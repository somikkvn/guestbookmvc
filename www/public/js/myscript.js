$(document).ready(function (){
    $('li').mouseenter (function (){
        $(this).toggleClass('alert')
    });
    $('li').mouseleave (function (){
        $(this).toggleClass('alert')
    });
});