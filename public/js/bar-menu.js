// Открываем содержимое бокового меню.
$('#bar-menu').click(function() {

    // Показываем меню.
    $('#bar-main').fadeIn(500);

    // При выходе курсора из области меню скрываем его.
    $('#bar-main').mouseleave(function() {

        $('#bar-main').fadeOut(300);

    });

    // Скрываем меню по клику не в области открытого меню.
    $(document).mouseup(function(element) {

        var div = $("#bar-main");

        if (!div.is(element.target) && div.has(element.target).length === 0 && div.css('display') === 'block') {

            div.fadeOut(300);

        }

    });

    // Скрываем меню при клике на крестик.
    $('#close-menu').click(function() {

        $('#bar-main').fadeOut(300);

    });

});