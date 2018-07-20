$(document).ready(function() {

    // Показываем текст кнопки при наведении и если ширина экрана больше 800.
    $('.sm-buttons').hover(function() {

        if ($(window).width() >= '800') {

            $(this).find("span:last-child").show(15);

        }

    }, function() {

        $(this).find("span:last-child").hide(15);

    });

});