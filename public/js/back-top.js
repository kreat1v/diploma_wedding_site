$(function() {

    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('#back-top').fadeIn(100);
        } else {
            $('#back-top').fadeOut(100);
        }
    });

    $('#back-top').click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
    });

});