$(document).ready(function() {

    $('.sm-buttons').hover(function() {
        $(this).find("span:last-child").show(15);
    }, function() {
        $(this).find("span:last-child").hide(15);
    });

});