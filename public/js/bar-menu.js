// Открываем содержимое бокового меню.
$('#bar-menu').click(function() {

    // Показываем меню.
    $('#bar-main').fadeIn(500);

    // При выходе курсора из области меню скрываем его.
    $('#bar-main').mouseleave(function() {

        $('#bar-main').fadeOut(300);

    });

});